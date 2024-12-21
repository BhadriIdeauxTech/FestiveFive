
<header>
    <div class="container-fluid">
            <!-- Navbar lap-->
            <nav class=" py-2">
                <div class="container d-flex justify-content-between align-items-center px-0">
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('website_asset/image/logo/mybs5lpn 1.svg') }}" alt="Logo" width="200px" height="55px"></a>
                  

                    <div class="  d-sm-block">
                        <ul class="list-inline mb-0 d-flex justify-content-between align-items-center">
                        <li class="fs-navsocial-contact">
                                <a href="tel:+919367129340" class="btn">
                                    <i class="fa-solid fa-phone"></i>&nbsp;&nbsp;+91 9367129340
                                </a>
                            </li>
                            <li class="list-inline-item me-3 fs-navsocial-icons"  >
                                <a class="nav-link" href="https://www.instagram.com/festivefivengl" title="" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ url('website_asset/image/logo/skill-icons_instagram.svg') }}" alt="Instagram" class="" width="25px" height="25px">
                                </a>
                            </li>
                            <li class="list-inline-item me-3 fs-navsocial-icons ">
                                <a class="nav-link" title="" href="https://www.facebook.com/people/Festive-Five-Gifting-Solutions/100089611633562/?locale=ar_AR" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ url('website_asset/image/logo/entypo-social_facebook.svg') }}" alt="" class=""  width="25px" height="25px">
                                </a>
                            </li>
                            <li class="list-inline-item me-3  fs-navsocial-icons">
                                <a class="nav-link" title="" href="https://www.linkedin.com/in/mohamed-faisal-b3b11b18/?originalSubdomain=in" target="_blank" rel="noopener noreferrer">
                                    <img src="{{ url('website_asset/image/logo/skill-icons_linkedin.svg') }}" alt="LinkedIn" class=""  width="25px" height="25px">
                                </a>
                            </li>

                        </ul>
                    </div>
                <!-- </div> -->
            </nav>
        </div>
        <!-------------------------- mobile ------------------------------------->
      <nav class="navbar navbar-expand-lg fs-navcolor2">
    <div class="container ">
        <!-- Brand or Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse fs-navbarmenus" id="navbarText">
            <!-- Navbar Links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('catalogs') ? 'active' : '' }}" href="{{ url('catalogs') }}">Catalogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ route('website.contact') }}">Contact Us</a>
                </li>
            </ul>

            <!-- Responsive Search Bar -->
            <!-- <form id="search-form" class="d-flex me-3">
                <input type="text" id="search-box" class="form-control me-2" placeholder="Search...">
             <button class="btn btn-outline-secondary" type="submit">Search</button>
            </form> -->
            <form id="search-form"  >
    <div class="input-group">
        <input type="text" id="search-box" class="form-control rounded-pill border-secondary px-3" placeholder="Search..." aria-label="Search"> <i class="bi bi-search"></i>
        <span class="input-group-text bg-white border-0 rounded-pill position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%);">
        <i class="fa-solid fa-magnifying-glass"></i>
        </span>
    </div>
</form>

            <!-- Enquiry Cart Button -->
            <!-- <span class="navbar-text fs-navchart">
                <a href="{{ url('/request_quote') }}" class="btn btn-primary">ENQUIRY CART</a>
            </span> -->
        </div>
    </div>
</nav>

        <!-- Navbar End-->
    </header>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@push('script-addon')
<script>
    // Function to perform live search
    function liveSearch() {
        let input = document.getElementById('search-box').value.toLowerCase();
        let resultsContainer = document.getElementById('search-results');
        resultsContainer.innerHTML = ''; // Clear previous results

        if (input.length === 0) {
            resultsContainer.style.display = 'none'; // Hide results if input is empty
            return;
        }
        const baseUrl = "{{ url('product_image') }}";

        // AJAX request to fetch product names
        $.ajax({
            url: "{{ route('search') }}",
            method: 'GET',
            data: {
                query: input
            },
            success: function(response) {
                if (response.length > 0) {
                    response.forEach(function(product) {
                        let resultItem = document.createElement('div');
                        resultItem.classList.add('search-result-item');
                        let link = document.createElement('a'); // Create <a> element
                        link.href = "{{ route('website.single-product', ['prod_id' => ':id']) }}".replace(':id', product.slug_product_name);

                        let image = document.createElement('img'); // Create <img> element for product image
                        image.src = baseUrl + '/' + product.product_image; // Set src attribute for product image using Blade syntax
                        let text = document.createElement('span');
                        text.textContent = product.product_name;
                        link.appendChild(image);
                        link.appendChild(text);
                        resultItem.appendChild(link); // Append link to result item
                        resultItem.addEventListener('click', function() {
                            document.getElementById('search-box').value = product.product_name;
                            resultsContainer.style.display = 'none'; // Hide results when an item is clicked
                        });
                        resultsContainer.appendChild(resultItem);
                    });
                    resultsContainer.style.display = 'block'; // Show results if matches found
                } else {
                    // No matches found
                    resultsContainer.innerHTML = '<div class="search-result-item">No results found</div>'; // Display "No results found" message
                    resultsContainer.style.display = 'block'; // Show results container
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Handle error
            }
        });
    }



    // Event listener for input change
    document.getElementById('search-box').addEventListener('input', function() {
        liveSearch();
        // Show or hide cancel icon based on input value
        let cancelIcon = document.getElementById('cancel-icon');
        if (this.value.trim() !== '') {
            cancelIcon.style.display = 'block';
        } else {
            cancelIcon.style.display = 'none';
        }
    });

    // Event listener for cancel icon click
    document.getElementById('cancel-icon').addEventListener('click', function() {
        // Clear search box and hide cancel icon
        let searchBox = document.getElementById('search-box');
        searchBox.value = '';
        this.style.display = 'none';
        // Clear search results
        document.getElementById('search-results').style.display = 'none';
    });

    // Event listener for form submission
    document.getElementById('search-form').addEventListener('submit', function(event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        // Perform your search logic here
        liveSearch();
    });
</script>
@endpush
