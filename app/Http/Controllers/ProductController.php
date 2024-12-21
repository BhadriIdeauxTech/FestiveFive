<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $product_view = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.category_name')
            ->where('products.product_delete', 1)
            ->where('categories.category_delete', 1)
            ->get();
        $category = Category::where('category_delete', 1)->get();

        return view('backendfile.product.index', compact('product_view', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $category = Category::where('category_delete', 1)->get();
        return view('backendfile.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            // Add validation rules for other fields if needed
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $currentDate = now()->format('d-m-Y');

        $products = [];

        $fieldCounter = 1;

        while ($request->has("product_name_$fieldCounter")) {
            $product_name = $request->input("product_name_$fieldCounter");
            $amount = $request->input("amount_$fieldCounter");
            $slug_product_name = Str::slug($product_name);
            $uploadedImage = $request->file("product_image_$fieldCounter");

            $imageName = null;

            if (!empty($uploadedImage)) {
                $imageName = time() . '_' . mt_rand(1000, 9999) . '.' . $uploadedImage->getClientOriginalExtension();
                $uploadedImage->move(public_path('product_image'), $imageName);
            }

            $products[] = [
                'category_id' => $request->input('category_id'),
                'product_name' => $product_name,
                'slug_product_name' => $slug_product_name,
                'amount' => $amount,
                'product_image' => $imageName,
                'date' => $currentDate,
            ];

            $fieldCounter++;
        }

        // Assuming you have a Product model
        Product::insert($products);

        return redirect()->back()->with('success', 'Products saved successfully');
    } catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->back()->withErrors($e->validator)->withInput();
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to save products');
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::where('id', $id)->first();
        $product_view = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.category_name')
            ->where('products.product_delete', 1)
            ->where('categories.category_delete', 1)
            ->get();
        $categories  = Category::where('category_delete', 1)->get();

        return view('backendfile.product.edit', compact('product_view', 'product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'product_name' => 'required',
                'product_image' => 'image|mimes:jpeg,png,jpg', // Updated image validation rules
            ]);

            // If validation fails, return an error response with validation messages
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $currentDate = date('d-m-Y');
            // Find the product by its ID
            $product = Product::findOrFail($id);


            // Update the Category name
            $product->category_id = $request->input('category_id');
            // Update the product name
            $product->product_name = $request->input('product_name');
            $product->slug_product_name = Str::slug($request->input('product_name'));
            $product->amount = $request->input('amount');

            // Check if a new image is uploaded
            if ($request->hasFile('product_image')) {
                $uploadedImage = $request->file('product_image');
                $imageName = time() . '_' . mt_rand(1000, 9999) . '.' . $uploadedImage->getClientOriginalExtension();
                $uploadedImage->move(public_path('product_image'), $imageName);

                // Delete the previous image file
                if ($product->product_image && File::exists(public_path('product_image/' . $product->product_image))) {
                    File::delete(public_path('product_image/' . $product->product_image));
                }

                // Update the product image
                $product->product_image = $imageName;
            }
            $product->date = $currentDate;
            // Save the updated product data
            $product->save();

            // Redirect back with a success message if the data is updated successfully
            return redirect()->back()->with('success', 'Product updated successfully');
        } catch (\Exception $e) {
            // Redirect back with a failure message if an exception occurs
            return redirect()->back()->with('error', 'Failed to update product');
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $model = Product::findOrFail($id);
        $model->product_delete = '0';
        $model->save();

        return redirect()->back()->with('success', 'Product deleted successfully');
    }
}
