@extends('layouts.websiteapp')
@section('website-main-content')
<div class="container">
    <div class="row my-5">
        <div class="col-md-6 single-product-image">
            <img src="{{ url('product_image',$productslist->product_image) }}" alt="">
        </div>
        <div class="col-md-6 single-product-text">
            <h1>{{$productslist->product_name}}</h1>
            <div class="border-single"></div>
            <h5 class="">category : {{$productslist->category_name}} </h5>
            <button class="btn home-cart-button" type="submit">ENQUIRY CART</button>
            <div class="home-browse-tag" style="display: none;">
                <h6 class="text-start">Product Added to the List</h6>
                <a href="{{ url('request_quote') }}">Browse the List</a>
            </div>
            <div class="spinner"></div>
        </div>
    </div>


    <div class="row row-cols-1 row-cols-md-4 g-4 mb-5">
        @foreach($products as $product)
        <div class="col">
            <div class="card h-100 home-card1 text-center">
                <a href="{{ route('website.single-product', ['prod_id' => $product->slug_product_name]) }}">

                    <img src="{{ url('product_image',$product->product_image) }}" class="card-img-top" alt="..." style="width: 100%;height: 100%;">
                    <div class="card-body">
                        <p>{{$product->product_name}}</p>
                        <button class="btn home-cart-button" type="button" data-product-name="{{ $product->product_name }}" data-product-image="{{ url('product_image',$product->product_image) }}">
                            ENQUIRY CART
                        </button>
                        <!-- Add a hidden input field to store product data -->
                        <input type="hidden" class="product-data" value="{{ json_encode(['name' => $product->product_name, 'image' => url('product_image',$product->product_image)]) }}">
                        <div class="home-browse-tag" style="display: none;">
                            <h6>Product Added to the List</h6>
                            <a href="{{ url('request_quote') }}">Browse the List</a>
                        </div>
                        <div class="spinner"></div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
        <!-- <div class="col">
            <div class="card h-100 home-card1 text-center">
                <a href=""><img src="/../website_asset/image/catalogs/Rectangle 20.png" class="card-img-top" alt="..."></a>
                <div class="card-body">
                    <p>Card Holder </p>
                    <button class="btn home-cart-button" type="submit">ENQUIRY CART</button>
                    <div class="home-browse-tag" style="display: none;">
                        <h6>Product Added to the List</h6>
                        <a href="{{ url('request_quote') }}">Browse the List</a>
                    </div>
                    <div class="spinner"></div>
                </div>
            </div>
        </div> -->
        <!-- <div class="col">
            <div class="card h-100 home-card1 text-center">
                <a href=""><img src="/../website_asset/image/catalogs/Rectangle 20.png" class="card-img-top" alt="..."></a>
                <div class="card-body">
                    <p>Card Holder </p>
                    <button class="btn home-cart-button" type="submit">ENQUIRY CART</button>
                    <div class="home-browse-tag" style="display: none;">
                        <h6>Product Added to the List</h6>
                        <a href="{{ url('request_quote') }}">Browse the List</a>
                    </div>
                    <div class="spinner"></div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 home-card1 text-center">
                <a href=""><img src="/../website_asset/image/catalogs/Rectangle 20.png" class="card-img-top" alt="..."></a>
                <div class="card-body">
                    <p>Card Holder </p>
                    <button class="btn home-cart-button" type="submit">ENQUIRY CART</button>
                    <div class="home-browse-tag" style="display: none;">
                        <h6>Product Added to the List</h6>
                        <a href="{{ url('request_quote') }}">Browse the List</a>
                    </div>
                    <div class="spinner"></div>
                </div>
            </div>
        </div> -->
    </div>
</div>

@endsection