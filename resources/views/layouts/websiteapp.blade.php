<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>festivefive</title>

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <!-- Favicons -->
    <link href="{{ url('logo/favicon.png') }}" rel="icon">
    <link href="{{ url('logo/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Font Awesome Free -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->

    <link rel="stylesheet" href="{{ url('website_asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('website_asset/css/main-style.css') }}">
    <link rel="stylesheet" href="{{ url('website_asset/css/swiper.css') }}">
    <style>
        /* Icon when the collapsible content is shown */
    </style>
      @stack('add-style')
</head>

<body>
    <!------------------------------------------- header ------------------------------------->

    @include('websitepages.header')

    <!--------------------------------------- main content ------------------------------------------------->
    <main>
        @section('website-main-content')
        @show
        <div id="whatsapp">
            <a href="https://api.whatsapp.com/send?phone=9367129340" target="_blank" rel="noopener noreferrer"><i
                    class="fa-brands fa-whatsapp"></i>&nbsp; How can we help you?</a>
        </div>
    </main>

    <!----------------------------------- footer ------------------------------------------->
    @include('websitepages.footer')



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>


    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>



    <script src="{{ url('website_asset/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('website_asset/js/main-js.js') }}"></script>
    <script src="{{ url('website_asset/js/swiper.js') }}"></script>

    <script>
        function toggleCollapse(targetId) {
            // Get the target collapsible element
            var targetCollapse = document.getElementById(targetId);

            // Check if the target collapsible element is currently open
            var isOpen = targetCollapse.classList.contains('show');

            // Close all collapsible elements
            var collapsibleElements = document.querySelectorAll('.collapse.show');
            collapsibleElements.forEach(function(element) {
                var collapse = new bootstrap.Collapse(element);
                collapse.hide();
            });

            // If the target collapsible element was closed, open it
            if (!isOpen) {
                var collapse = new bootstrap.Collapse(targetCollapse);
                collapse.show();
            }
        }
    </script>


    <!-- JavaScript to toggle visibility and simulate loading -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Select all ENQUIRY CART buttons, browse links, and spinners
            const enquiryCartButtons = document.querySelectorAll('.home-cart-button');
            const browseLinks = document.querySelectorAll('.home-browse-tag');
            const spinners = document.querySelectorAll('.spinner');

            // Check if the number of elements in each NodeList matches
            // if (enquiryCartButtons.length === browseLinks.length && enquiryCartButtons.length === spinners.length) {
            // Iterate over each ENQUIRY CART button
            enquiryCartButtons.forEach((button, index) => {
                // Adding event listener to each ENQUIRY CART button
                button.addEventListener('click', function(event) {
                    // Prevent form submission
                    event.preventDefault();

                    // Show spinner, hide button, and hide browse link
                    spinners[index].style.display = 'inline-block';
                    button.style.display = 'none';
                    browseLinks[index].style.display = 'none';

                    // Simulate form submission for demonstration purpose
                    setTimeout(function() {
                        // Hide spinner, show browse link, hide button
                        spinners[index].style.display = 'none';
                        browseLinks[index].style.display = 'block';
                        // Here, we hide the button again after the form submission
                        button.style.display = 'none';
                    }, 1000); // Simulated delay of 2 seconds (adjust as needed)
                });
            });
            // } else {
            //     console.error("Number of enquiry cart buttons, browse links, and spinners do not match.");
            // }
        });
    </script>

  @stack('script-addon')


</body>

</html>
