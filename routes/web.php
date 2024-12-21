<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\ModelController;


use App\Http\Controllers\CatalogController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuotaionController;


// website
Route::get('/', [WebsiteController::class, 'index'])->name('website.home');
Route::get('/about', [WebsiteController::class, 'about'])->name('website.about');
Route::get('/catalogs', [WebsiteController::class, 'catalogs'])->name('website.catalogs');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('website.contact');
Route::post('/contact-detail', [WebsiteController::class, 'contactdetail'])->name('website.contactdetail');
Route::get('/products', [WebsiteController::class, 'products'])->name('website.products');
Route::get('/products/{cat_name}', [WebsiteController::class, 'products'])->name('website.product');
Route::post('/products/{cat_name}', [WebsiteController::class, 'products'])->name('website.sort');
Route::get('/single-product/{prod_id}', [WebsiteController::class, 'singleproduct'])->name('website.single-product');
Route::get('/request_quote', [WebsiteController::class, 'requestquote'])->name('website.requestquote');
Route::post('/request-quote-create', [QuotaionController::class, 'store'])->name('quotation.store');
Route::get('/search', [WebsiteController::class, 'search'])->name('search');
Route::get('/product-price', [WebsiteController::class, 'price'])->name('website.price');
Route::get('/shop', [WebsiteController::class, 'productshop'])->name('website.productshop');
Route::post('/shop', [WebsiteController::class, 'productshop'])->name('website.shopsort');

Auth::routes();

//Normal Users Routes List
// Route::middleware(['auth', 'user-access:user'])->group(function () {

//     Route::get('/home', [HomeController::class, 'index'])->name('home');
// });

//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::resource('admincatalog', CatalogController::class);
    Route::resource('admincategories', CategoryController::class);
    Route::resource('adminproduct', ProductController::class);
    Route::get('enquiry', [EnquiryController::class, 'enquirydetails'])->name('enquiry.detail');
    Route::get('request-quote', [QuotaionController::class, 'index'])->name('admin.quote');
});

//Admin Routes List
Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});
