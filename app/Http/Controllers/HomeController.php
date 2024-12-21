<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\CustomerEnquiry;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $date = Carbon::now()->setTimezone('Asia/Kolkata')->toDateString();
        $getenquirystoday = CustomerEnquiry::where('date',$date)->get();

        $catalog = Catalog::where('catalog_delete',1)->count();
        $category = Category::where('category_delete',1)->count();
        $product = Product::where('product_delete',1)->count();
        // $model = ProductModel::where('model_delete',1)->count();

        return view('adminHome',compact('getenquirystoday','catalog','category','product'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome()
    {
        return view('managerHome');
    }
}
