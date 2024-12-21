@extends('layouts.websiteapp')
@section('website-main-content')
<div class="container py-5">
@if(isset($catalog_view) && count($catalog_view) > 0)
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($catalog_view as $catalog_views)
        <div class="col">
            <div class="card h-100 catalogs-card1 text-center">
                <img src="{{ url('catalog_image',$catalog_views->catalog_image) }}" class="card-img-top" alt="..." style="width: 100%;height: 250px;object-fit: contain;">
                <div class="card-body">

                    <p class="card-text">{{$catalog_views->catalog_name}}</p>
                    <a href="{{ url('catalog_pdfs', $catalog_views->catalog_pdf) }}" class="btn" download>Download Now</a>
                </div>
            </div>
        </div>
        @endforeach
        <!-- <div class="col">
            <div class="card h-100 catalogs-card1 text-center">
                <img src="{{ url('website_asset/image/catalogs/Rectangle 20.png') }}" class="card-img-top" alt="...">

                <div class="card-body">

                    <p class="card-text">Card Holder
                    </p>
                    <a href="#" class="btn ">Download Now</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 catalogs-card1 text-center">
                <img src="{{ url('website_asset/image/catalogs/Rectangle 20.png') }}" class="card-img-top" alt="...">

                <div class="card-body">

                    <p class="card-text">Card Holder
                    </p>
                    <a href="#" class="btn ">Download Now</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 catalogs-card1 text-center">
                <img src="{{ url('website_asset/image/catalogs/Rectangle 20.png') }}" class="card-img-top" alt="...">

                <div class="card-body">

                    <p class="card-text">Card Holder
                    </p>
                    <a href="#" class="btn ">Download Now</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 catalogs-card1 text-center">
                <img src="{{ url('website_asset/image/catalogs/Rectangle 20.png') }}" class="card-img-top" alt="...">

                <div class="card-body">

                    <p class="card-text">Card Holder
                    </p>
                    <a href="#" class="btn ">Download Now</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 catalogs-card1 text-center">
                <img src="{{ url('website_asset/image/catalogs/Rectangle 20.png') }}" class="card-img-top" alt="...">

                <div class="card-body">

                    <p class="card-text">Card Holder
                    </p>
                    <a href="#" class="btn ">Download Now</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 catalogs-card1 text-center">
                <img src="{{ url('website_asset/image/catalogs/Rectangle 20.png') }}" class="card-img-top" alt="...">

                <div class="card-body">

                    <p class="card-text">Card Holder
                    </p>
                    <a href="#" class="btn ">Download Now</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 catalogs-card1 text-center">
                <img src="{{ url('website_asset/image/catalogs/Rectangle 20.png') }}" class="card-img-top" alt="...">

                <div class="card-body">

                    <p class="card-text">Card Holder
                    </p>
                    <a href="#" class="btn ">Download Now</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 catalogs-card1 text-center">
                <img src="{{ url('website_asset/image/catalogs/Rectangle 20.png') }}" class="card-img-top" alt="...">

                <div class="card-body">

                    <p class="card-text">Card Holder
                    </p>
                    <a href="#" class="btn ">Download Now</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 catalogs-card1 text-center">
                <img src="{{ url('website_asset/image/catalogs/Rectangle 20.png') }}" class="card-img-top" alt="...">

                <div class="card-body">

                    <p class="card-text">Card Holder
                    </p>
                    <a href="#" class="btn ">Download Now</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 catalogs-card1 text-center">
                <img src="{{ url('website_asset/image/catalogs/Rectangle 20.png') }}" class="card-img-top" alt="...">

                <div class="card-body">

                    <p class="card-text">Card Holder
                    </p>
                    <a href="#" class="btn ">Download Now</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 catalogs-card1 text-center">
                <img src="{{ url('website_asset/image/catalogs/Rectangle 20.png') }}" class="card-img-top" alt="...">

                <div class="card-body">

                    <p class="card-text">Card Holder
                    </p>
                    <a href="#" class="btn ">Download Now</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 catalogs-card1 text-center">
                <img src="{{ url('website_asset/image/catalogs/Rectangle 20.png') }}" class="card-img-top" alt="...">

                <div class="card-body">

                    <p class="card-text">Card Holder
                    </p>
                    <a href="#" class="btn ">Download Now</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 catalogs-card1 text-center">
                <img src="{{ url('website_asset/image/catalogs/Rectangle 20.png') }}" class="card-img-top" alt="...">

                <div class="card-body">

                    <p class="card-text">Card Holder
                    </p>
                    <a href="#" class="btn ">Download Now</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 catalogs-card1 text-center">
                <img src="{{ url('website_asset/image/catalogs/Rectangle 20.png') }}" class="card-img-top" alt="...">

                <div class="card-body">

                    <p class="card-text">Card Holder
                    </p>
                    <a href="#" class="btn ">Download Now</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 catalogs-card1 text-center">
                <img src="{{ url('website_asset/image/catalogs/Rectangle 20.png') }}" class="card-img-top" alt="...">

                <div class="card-body">

                    <p class="card-text">Card Holder
                    </p>
                    <a href="#" class="btn ">Download Now</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 catalogs-card1 text-center">
                <img src="{{ url('website_asset/image/catalogs/Rectangle 20.png') }}" class="card-img-top" alt="...">

                <div class="card-body">

                    <p class="card-text">Card Holder
                    </p>
                    <a href="#" class="btn ">Download Now</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 catalogs-card1 text-center">
                <img src="{{ url('website_asset/image/catalogs/Rectangle 20.png') }}" class="card-img-top" alt="...">

                <div class="card-body">

                    <p class="card-text">Card Holder
                    </p>
                    <a href="#" class="btn ">Download Now</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 catalogs-card1 text-center">
                <img src="{{ url('website_asset/image/catalogs/Rectangle 20.png') }}" class="card-img-top" alt="...">

                <div class="card-body">

                    <p class="card-text">Card Holder
                    </p>
                    <a href="#" class="btn ">Download Now</a>
                </div>
            </div>
        </div> -->
    </div>
    <center><button type="submit" class="btn catalogs-load-more mt-5 ">Load More</button></center>
    @else
    <p>There is no data to show.</p>
@endif
</div>
@endsection

@push('script-addon')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Selecting the container element and all the columns
        const container = document.querySelector('.row-cols-1');
        const columns = container.querySelectorAll('.col');
        let currentIndex = 8; // Index of the column to start showing from

        // Function to show additional columns
        function showMoreColumns() {
            // Show the next 8 columns
            for (let i = currentIndex; i < currentIndex + 8 && i < columns.length; i++) {
                columns[i].classList.remove('d-none');
            }
            currentIndex += 8;
            // Hide the 'Load More' button if all columns are shown
            if (currentIndex >= columns.length) {
                document.querySelector('.catalogs-load-more').style.display = 'none';
            }
        }

        // Adding event listener to the 'Load More' button
        document.querySelector('.catalogs-load-more').addEventListener('click', function() {
            // Change button text to "Loading..."
            this.textContent = 'Loading...';
            // Show additional columns
            setTimeout(function() {
                showMoreColumns();
                // Restore original button text after a delay
                document.querySelector('.catalogs-load-more').textContent = 'Load More';
            }, 1000); // Adjust delay time as needed
        });

        // Initially hide all columns after the 8th column
        for (let i = 8; i < columns.length; i++) {
            columns[i].classList.add('d-none');
        }
    });
</script>
@endpush