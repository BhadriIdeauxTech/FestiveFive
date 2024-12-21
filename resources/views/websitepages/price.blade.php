@extends('layouts.websiteapp')
@section('website-main-content')
<div class="container">
    <a class="btn product-view-mobile" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
        <i class="fa-solid fa-cart-shopping"></i> view product
    </a>
    {{-- ---------------- mobile--------------------- --}}
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            {{-- <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5> --}}
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body product-details1-mobile">
            <h5>Browse by Categories</h5>
            <div class="product-list-mobile">
                @foreach($categoryslist as $category)
                <div><a href="{{ url('products',$category->slug_category_name) }}">{{ ucfirst($category->category_name) }} <span class="list-count">({{ $category->product_count }})</span></a></div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- -------- laptap------------- --}}
    <div class="row product-list-main">
        <div class="col-md-3 product-details1">
            <h5>Browse by Categories</h5>

            @if($categoryslist->isEmpty())
            <p>There is no Category to show.</p>
            @else
            <div class="product-list">

                @foreach($categoryslist as $category)
                <div><a href="{{ url('products',$category->slug_category_name) }}">{{ ucfirst($category->category_name) }} <span class="list-count">({{ $category->product_count }})</span></a></div>
                @endforeach
            </div>
            @endif
        </div>


        <div class="col-md-9 product-details2">
            <div class="product-list-border">
                <div class="row">
                    <!-- <h6 class=""> Result of "{{ $category_name }}"</h6> -->
                </div>
                @if($productslist->isEmpty())
                <p>There is no Product to show.</p>
                @else
                <div class="row row-cols-1 row-cols-md-4 g-4 my-4">
                    @foreach($productslist as $category)
                    <div class="col">
                        <div class="card product-card text-center h-100">
                            <a href="{{ route('website.single-product', ['prod_id' => $category->slug_product_name]) }}">

                                <img src="{{ url('product_image',$category->product_image) }}" class="card-img-top" alt="..." style="width: 100%;height: 100%;">
                                <div class="card-body">
                                    <p>{{$category->product_name}}</p>
                                    <button class="btn home-cart-button" type="button" data-product-name="{{ $category->product_name }}" data-product-image="{{ url('product_image',$category->product_image) }}">
                                        ENQUIRY CART
                                    </button>
                                    <!-- Add a hidden input field to store product data -->
                                    <input type="hidden" class="product-data" value="{{ json_encode(['name' => $category->product_name, 'image' => url('product_image',$category->product_image)]) }}">
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
                </div>

                <div class="pagination">
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <ul class="page-numbers">
                        <!-- Previous Page Button -->
                        <li>
                            <a class="prev page-numbers" href="{{ $productslist->previousPageUrl() }}"><i class="fa-solid fa-chevron-left"></i></a>
                        </li>

                        <!-- Pagination Numbers -->
                        @for ($i = 1; $i <= $productslist->lastPage(); $i++)
                            <li>
                                <a class="page-numbers{{ $productslist->currentPage() == $i ? ' current' : '' }}" href="{{ $productslist->url($i) }}">
                                    <div class="pagination-number{{ $productslist->currentPage() == $i ? ' current' : '' }}">{{ $i }}</div>
                                </a>
                            </li>
                            @endfor

                            <!-- Next Page Button -->
                            <li>
                                <a class="next page-numbers" href="{{ $productslist->nextPageUrl() }}"><i class="fa-solid fa-chevron-right"></i></a>
                            </li>
                    </ul>
                </div>

                @endif


                <br>



            </div>
        </div>
    </div>
    @endsection
    @push('script-addon')
    <script>
        // JavaScript to switch container class on mobile view
        function adjustContainer() {
            var container = document.querySelector('.container');
            if (window.innerWidth < 992) { // Change to container-fluid for viewport width less than 768px
                container.classList.remove('container');
                container.classList.add('container-fluid');
            } else { // Change back to container for larger viewport widths
                container.classList.remove('container-fluid');
                container.classList.add('container');
            }
        }

        // Call adjustContainer on page load and resize
        window.onload = adjustContainer;
        window.onresize = adjustContainer;
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize an array to store selected products
            let selectedProductsArray = [];

            // Add event listener to "ENQUIRY CART" buttons
            const enquiryButtons = document.querySelectorAll('.home-cart-button');
            enquiryButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    // Retrieve product data from the data attributes
                    const productName = button.dataset.productName;
                    const productImage = button.dataset.productImage;

                    // Push product details into the selectedProductsArray
                    selectedProductsArray.push({
                        name: productName,
                        image: productImage
                    });

                    // Store selected products array in local storage
                    localStorage.setItem('selectedProducts', JSON.stringify(selectedProductsArray));

                    // Show the "Product Added to the List" message
                    button.nextElementSibling.style.display = 'block';
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if selectedProducts is not null
            if (typeof selectedProducts !== 'undefined' && selectedProducts !== null) {
                // selectedProducts is not null, so render the form
                document.getElementById('empty-list-message').style.display = 'none';
                document.getElementById('quote-form-container').style.display = 'block';
            } else {
                // selectedProducts is null, so hide the form and show the message
                document.getElementById('empty-list-message').style.display = 'block';
                document.getElementById('quote-form-container').style.display = 'none';
            }
        });
    </script>

    <script>
        function submitForm() {
            document.getElementById('sorting-form').submit();
        }
    </script>
    @endpush
    @push('add-style')
    <style>
        .page-numbers {
            list-style-type: none;
            /* Remove bullets */
            padding: 0;
            margin: 0;
        }

        .page-numbers a {
            color: #777777;
        }

        .page-numbers li {
            display: inline-block;
            /* Display list items in the same row */
            /* margin-right: 5px; Adjust spacing between items as needed */
            width: 33px;
            /* Adjust as needed */
            height: 33px;
            /* Adjust as needed */
            line-height: 33px;
            /* Adjust as needed */
            text-align: center;
            border: 1px solid #ccc;
            /* border-radius: 5px; */
            text-decoration: none;
            /* Remove underline from links */
            color: #777777;
            /* Set color for page numbers */
        }

        .pagination-number {
            display: inline-block;
            width: 33px;
            /* Adjust as needed */
            height: 33px;
            /* Adjust as needed */
            line-height: 33px;
            /* Adjust as needed */
            text-align: center;
            border: 1px solid #ccc;
            /* border-radius: 5px; */
            text-decoration: none;
            /* Remove underline from links */
            color: #777777;
            /* Set color for page numbers */
        }

        .pagination-number.current {
            background-color: #424242;
            /* Set background color for active page */
            color: #fff;
            /* Set text color for active page */
        }
    </style>
    @endpush