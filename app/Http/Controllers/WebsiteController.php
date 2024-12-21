<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\CustomerEnquiry;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    public function index()
    {
        $ProductsByCategory = DB::table('categories')
            ->join('products', function ($join) {
                $join->on('categories.id', '=', 'products.category_id')
                    ->where('products.product_delete', 1);
            })
            ->select('categories.category_name', 'products.*')
            ->join(DB::raw('(SELECT category_id, MAX(id) AS max_id FROM products GROUP BY category_id) AS latest'), function ($join) {
                $join->on('products.category_id', '=', 'latest.category_id')
                    ->on('products.id', '=', 'latest.max_id');
            })
            ->where('categories.category_delete', 1)->orderBy('id','asc')
            ->get();
        $category_view = Category::where('category_delete', 1)->orderBy('id','desc')->get();
        return view('websitepages.index', compact('ProductsByCategory', 'category_view'));
    }

    public function about()
    {
        return view('websitepages.about');
    }
    public function catalogs()
    {
        $catalog_view = Catalog::where('catalog_delete', 1)->get();
        return view('websitepages.catalogs', compact('catalog_view'));
    }
    public function contact()
    {
        return view('websitepages.contact');
    }
    public function contactdetail(Request $request)
    {
        try {
            $firstname = $request->firstname;
            $lastname = $request->lastname;
            $phone = $request->phone;
            $email = $request->email;            
            $message = $request->message;
            $date = Carbon::now()->setTimezone('Asia/Kolkata')->toDateString();
            $enquiry = CustomerEnquiry::insert(['firstname' => $firstname, 'lastname' => $lastname, 'email' => $email, 'message' => $message, 'date' => $date]);

            return redirect()->back()->with('success', 'Enquiry Send Success');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Enquiry Not Send');
        }
    }
    public function requestquote()
    {
        return view('websitepages.requestquote');
    }
    public function products(Request $request, $cat_name)
    {
        // dd($cat_name);
        $categoryslist = DB::table('categories')
            ->join('products', function ($join) {
                $join->on('categories.id', '=', 'products.category_id')
                    ->where('products.product_delete', 1);
            })
            ->select('categories.category_name', 'categories.slug_category_name', 'categories.id as category_id', 'products.product_name', 'products.product_image', DB::raw('count(products.id) as product_count'))
            ->join(DB::raw('(SELECT category_id, MAX(id) AS max_id FROM products GROUP BY category_id) AS latest'), function ($join) {
                $join->on('products.category_id', '=', 'latest.category_id')
                    ->on('products.id', '=', 'latest.max_id');
            })
            // ->where('categories.slug_category_name', $cat_name)
            ->where('categories.category_delete', 1)
            ->groupBy('categories.id', 'categories.category_name', 'categories.slug_category_name', 'products.product_name', 'products.product_image')
            ->get();


        $categorys = DB::table('categories')
            ->join('products', function ($join) {
                $join->on('categories.id', '=', 'products.category_id')
                    ->where('products.product_delete', 1);
            })
            ->select('categories.category_name', 'categories.slug_category_name', 'categories.id as category_id', 'products.product_name', 'products.product_image', DB::raw('count(products.id) as product_count'))
            ->join(DB::raw('(SELECT category_id, MAX(id) AS max_id FROM products GROUP BY category_id) AS latest'), function ($join) {
                $join->on('products.category_id', '=', 'latest.category_id')
                    ->on('products.id', '=', 'latest.max_id');
            })
            ->where('categories.slug_category_name', $cat_name)
            ->where('categories.category_delete', 1)
            ->groupBy('categories.id', 'categories.category_name', 'categories.slug_category_name', 'products.product_name', 'products.product_image')
            ->get();

        $sortingOption = $request->input('sort');

        // dd($sortingOption);

        if ($sortingOption == null) {
            $productslist =  DB::table('categories')
                ->join('products', function ($join) {
                    $join->on('categories.id', '=', 'products.category_id')
                        ->where('products.product_delete', 1);
                })
                ->select('categories.category_name', 'categories.slug_category_name', 'categories.id as category_id', 'products.slug_product_name', 'products.product_name', 'products.product_image')
                ->where('categories.slug_category_name', $cat_name)
                ->where('categories.category_delete', 1)
                ->paginate(12);
            $selected_sorting_option = 0;
        } else {

            $query = DB::table('categories')
                ->join('products', function ($join) {
                    $join->on('categories.id', '=', 'products.category_id')
                        ->where('products.product_delete', 1);
                })
                ->select('categories.category_name', 'categories.slug_category_name', 'categories.id as category_id', 'products.slug_product_name', 'products.product_name', 'products.product_image')
                ->where('categories.slug_category_name', $cat_name)
                ->where('categories.category_delete', 1);

            // Apply sorting based on the selected option
            switch ($sortingOption) {
                case '1':
                    // Sort by popularity (add your popularity logic here)
                    // $query->orderBy('products.popularity', 'desc');

                    $query->leftJoin('quotationproducts', 'products.product_name', '=', 'quotationproducts.product_name')
                        ->select('products.id', 'products.category_id', 'products.product_name', 'products.slug_product_name', 'products.amount', 'products.product_image', 'products.product_status', 'products.product_delete', 'products.date')
                        ->groupBy('products.id', 'products.category_id', 'products.product_name', 'products.slug_product_name', 'products.amount', 'products.product_image', 'products.product_status', 'products.product_delete', 'products.date')
                        ->orderByRaw('COUNT(quotationproducts.product_name) DESC');
                    break;
                case '2':
                    // Sort by latest (assuming there's a 'created_at' column in products table)
                    $query->orderBy('products.date', 'desc');
                    break;
                case '3':
                    // Sort by price: low to high (assuming there's a 'price' column in products table)
                    $query->orderBy('products.amount', 'asc');
                    break;
                case '4':
                    // Sort by price: high to low
                    $query->orderBy('products.amount', 'desc');
                    break;
                default:
                    // Default sorting
                    // You can add your default sorting logic here
                    break;
            }

            // Paginate the results
            $productslist = $query->paginate(12);

            $selected_sorting_option = $sortingOption;
        }



        $category_name = Category::select('category_name', 'slug_category_name')->where('category_delete', 1)->where('categories.slug_category_name', $cat_name)->first();

        // if ($cat_name == 'All') {
        //     $category_name = (object) [
        //         'category_name' => 'Products',
        //         'slug_category_name' => 'all', // Assuming 'all' is the slug for 'All' category
        //         $selected_sorting_option = 0,
        //     ];
        // }

        return view('websitepages.products', compact('categorys', 'categoryslist', 'category_name', 'productslist', 'selected_sorting_option'));
    }

    public function singleproduct($prod_id)
    {

        $productslist =  DB::table('categories')
            ->join('products', function ($join) {
                $join->on('categories.id', '=', 'products.category_id')
                    ->where('products.product_delete', 1);
            })
            ->select('categories.category_name', 'categories.slug_category_name', 'categories.id as category_id', 'products.product_name', 'products.product_image')
            ->where('products.product_name', $prod_id)
            ->where('categories.category_delete', 1)
            ->where('products.product_delete', 1)
            ->first();

        $prod = substr($prod_id, 0, 3);

        $products = Product::where('slug_product_name', 'like', $prod . '%')->inRandomOrder()->take(3)->get();

        // dd($products);

        return view('websitepages.single-product', compact('productslist', 'products'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Product::where('product_name', 'like', $query . '%')->get();

        return response()->json($results);
    }

    public function price(Request $request)
    {
        // dd($request->price);
        $categoryslist = DB::table('categories')
            ->join('products', function ($join) {
                $join->on('categories.id', '=', 'products.category_id')
                    ->where('products.product_delete', 1);
            })
            ->select('categories.category_name', 'categories.slug_category_name', 'categories.id as category_id', 'products.product_name', 'products.product_image', DB::raw('count(products.id) as product_count'))
            ->join(DB::raw('(SELECT category_id, MAX(id) AS max_id FROM products GROUP BY category_id) AS latest'), function ($join) {
                $join->on('products.category_id', '=', 'latest.category_id')
                    ->on('products.id', '=', 'latest.max_id');
            })
            // ->where('categories.slug_category_name', $cat_name)
            ->where('categories.category_delete', 1)
            ->groupBy('categories.id', 'categories.category_name', 'categories.slug_category_name', 'products.product_name', 'products.product_image')
            ->get();


        $categorys = DB::table('categories')
            ->join('products', function ($join) {
                $join->on('categories.id', '=', 'products.category_id')
                    ->where('products.product_delete', 1);
            })
            ->select('categories.category_name', 'categories.slug_category_name', 'categories.id as category_id', 'products.product_name', 'products.product_image', DB::raw('count(products.id) as product_count'))
            ->join(DB::raw('(SELECT category_id, MAX(id) AS max_id FROM products GROUP BY category_id) AS latest'), function ($join) {
                $join->on('products.category_id', '=', 'latest.category_id')
                    ->on('products.id', '=', 'latest.max_id');
            })
            // ->where('products.slug_category_name', $cat_name)
            ->where('categories.category_delete', 1)
            ->groupBy('categories.id', 'categories.category_name', 'categories.slug_category_name', 'products.product_name', 'products.product_image')
            ->get();



        // dd($sortingOption);
        $price = $request->price;

        $query = DB::table('categories')
        ->join('products', function ($join) {
            $join->on('categories.id', '=', 'products.category_id')
                ->where('products.product_delete', 1);
        })
        ->select('categories.category_name', 'categories.slug_category_name', 'categories.id as category_id', 'products.slug_product_name', 'products.product_name', 'products.product_image')
        ->where('categories.category_delete', 1);
    
    if ($price === '200') {
        $query->whereBetween('products.amount', [0, 200]);
    } elseif ($price === '500') {
        $query->whereBetween('products.amount', [201, 500]);
    } elseif ($price === '1000') {
        $query->whereBetween('products.amount', [501, 1000]);
    } elseif ($price === '1001') {
        $query->where('products.amount', '>', 1000);
    }
    
    $productslist = $query->paginate(12);
    



        // $category_name = Category::select('category_name', 'slug_category_name')->where('category_delete', 1)->where('categories.slug_category_name', $cat_name)->first();

        $category_name = $request->price;

        return view('websitepages.price', compact('categorys', 'categoryslist', 'category_name', 'productslist'));
    }



    public function productshop(Request $request)
    {
        // dd($cat_name);
        $categoryslist = DB::table('categories')
            ->join('products', function ($join) {
                $join->on('categories.id', '=', 'products.category_id')
                    ->where('products.product_delete', 1);
            })
            ->select('categories.category_name', 'categories.slug_category_name', 'categories.id as category_id', 'products.product_name', 'products.product_image', DB::raw('count(products.id) as product_count'))
            ->join(DB::raw('(SELECT category_id, MAX(id) AS max_id FROM products GROUP BY category_id) AS latest'), function ($join) {
                $join->on('products.category_id', '=', 'latest.category_id')
                    ->on('products.id', '=', 'latest.max_id');
            })
            // ->where('categories.slug_category_name', $cat_name)
            ->where('categories.category_delete', 1)
            ->groupBy('categories.id', 'categories.category_name', 'categories.slug_category_name', 'products.product_name', 'products.product_image')
            ->get();


        $categorys = DB::table('categories')
            ->join('products', function ($join) {
                $join->on('categories.id', '=', 'products.category_id')
                    ->where('products.product_delete', 1);
            })
            ->select('categories.category_name', 'categories.slug_category_name', 'categories.id as category_id', 'products.product_name', 'products.product_image', DB::raw('count(products.id) as product_count'))
            ->join(DB::raw('(SELECT category_id, MAX(id) AS max_id FROM products GROUP BY category_id) AS latest'), function ($join) {
                $join->on('products.category_id', '=', 'latest.category_id')
                    ->on('products.id', '=', 'latest.max_id');
            })
            // ->where('categories.slug_category_name', $cat_name)
            ->where('categories.category_delete', 1)
            ->groupBy('categories.id', 'categories.category_name', 'categories.slug_category_name', 'products.product_name', 'products.product_image')
            ->get();

        $sortingOption = $request->input('sort');

        // dd($sortingOption);

        if ($sortingOption == null) {
            $productslist =  DB::table('categories')
                ->join('products', function ($join) {
                    $join->on('categories.id', '=', 'products.category_id')
                        ->where('products.product_delete', 1);
                })
                ->select('categories.category_name', 'categories.slug_category_name', 'categories.id as category_id', 'products.slug_product_name', 'products.product_name', 'products.product_image')
                // ->where('categories.slug_category_name', $cat_name)
                ->where('categories.category_delete', 1)
                ->paginate(12);
            $selected_sorting_option = 0;
        } else {

            $query = DB::table('categories')
                ->join('products', function ($join) {
                    $join->on('categories.id', '=', 'products.category_id')
                        ->where('products.product_delete', 1);
                })
                ->select('categories.category_name', 'categories.slug_category_name', 'categories.id as category_id', 'products.slug_product_name', 'products.product_name', 'products.product_image')
                // ->where('categories.slug_category_name', $cat_name)
                ->where('categories.category_delete', 1);

            // Apply sorting based on the selected option
            switch ($sortingOption) {
                case '1':
                    // Sort by popularity (add your popularity logic here)
                    // $query->orderBy('products.popularity', 'desc');

                    $query->leftJoin('quotationproducts', 'products.product_name', '=', 'quotationproducts.product_name')
                        ->select('products.id', 'products.category_id', 'products.product_name', 'products.slug_product_name', 'products.amount', 'products.product_image', 'products.product_status', 'products.product_delete', 'products.date')
                        ->groupBy('products.id', 'products.category_id', 'products.product_name', 'products.slug_product_name', 'products.amount', 'products.product_image', 'products.product_status', 'products.product_delete', 'products.date')
                        ->orderByRaw('COUNT(quotationproducts.product_name) DESC');
                    break;
                case '2':
                    // Sort by latest (assuming there's a 'created_at' column in products table)
                    $query->orderBy('products.date', 'desc');
                    break;
                case '3':
                    // Sort by price: low to high (assuming there's a 'price' column in products table)
                    $query->orderBy('products.amount', 'asc');
                    break;
                case '4':
                    // Sort by price: high to low
                    $query->orderBy('products.amount', 'desc');
                    break;
                default:
                    // Default sorting
                    // You can add your default sorting logic here
                    break;
            }

            // Paginate the results
            $productslist = $query->paginate(12);

            $selected_sorting_option = $sortingOption;
        }



        $category_name = Category::select('category_name', 'slug_category_name')->where('category_delete', 1)->first();

        // if ($cat_name == 'All') {
        //     $category_name = (object) [
        //         'category_name' => 'Products',
        //         'slug_category_name' => 'all', // Assuming 'all' is the slug for 'All' category
        //         $selected_sorting_option = 0,
        //     ];
        // }

        return view('websitepages.shop', compact('categorys', 'categoryslist', 'category_name', 'productslist', 'selected_sorting_option'));
    }
}
