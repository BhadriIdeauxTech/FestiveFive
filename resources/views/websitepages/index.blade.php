@extends('layouts.websiteapp')
@section('website-main-content')

<!----------------------------------- carousel -------------------------------------------->
<!-- <div class="container-fluid"> -->


<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ url('website_asset/image/catalogs/banner.jpg') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ url('website_asset/image/catalogs/banner2.jpg') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{ url('website_asset/image/catalogs/Banner3.jpg') }}" class="d-block w-100" alt="...">
        </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>



<div class="row g-3 ">
    <div class="col-md-3 col-6  ">
    <img src="{{ url('website_asset/image/rounder/keychain.jpg') }}" alt="" class="img-fluid" height="40px">
    </div>

    <div class="col-md-3 col-6">
    <img src="{{ url('website_asset/image/rounder/wallet.jpg') }}"alt="" class="img-fluid" height="40px">
    </div>

    <div class="col-md-3 col-6">
    <img src="{{ url('website_asset/image/rounder/flaskss.jpg') }}"  alt="" class="img-fluid" height="40px">
    </div>

    <div class="col-md-3 col-6">
    <img src="{{ url('website_asset/image/rounder/bags.jpg') }}"  alt="" class="img-fluid" height="40px">
    </div>
</div>


 

 


                                    <!-- <img src="{{ url('website_asset/image/rounder/pen.jpg') }}" alt=""> -->









<h1 class="home-title">"Making every celebration memorable with the perfect gifts, curated just for you."</h1>
<br />
<!-- rounded swiper -->
<!-- Swiper -->
<div class="container py-3">
    <h2 class="text-center">Gifiting Categories</h2>

    <div class="row">
        <div class="col-12">
            <div class="swiper round-image">
                <div class="swiper-wrapper">
                    <!-- @if($category_view)
                        @foreach($category_view as $category)
                        <div class="swiper-slide d-flex justify-content-center align-items-center">
                            <div class="rounder-image-home">
                                <a href="{{ url('products',$category->slug_category_name) }}">
                                    <img src="{{ url('category_image',$category->category_image) }}" alt="">
                                    <h6>{{ $category->category_name }}</h6>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    @endif -->
                    <!-- <div class="swiper-slide d-flex justify-content-center align-items-center">
                        <div class="rounder-image-home">
                            <a href="{{ url('products') }}">
                                <img src="{{ url('website_asset/image/rounder/r2.png') }}" alt="">
                                <h6>Natural Perfume</h6>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide d-flex justify-content-center align-items-center">
                        <div class="rounder-image-home">
                            <a href="{{ url('products') }}">
                                <img src="{{ url('website_asset/image/rounder/r3.png') }}" alt="">
                                <h6>Natural Perfume</h6>
                            </a>
                        </div>
                    </div> -->

                    <div class="swiper-slide d-flex justify-content-center align-items-center">
                        <div class="rounder-image-home">
                            <!-- <a href="{{ url('products') }}"> -->
                            <a href="#">
                                <img src="{{ url('website_asset/image/rounder/teddy.png') }}" alt="">
                                <h6>Teddy</h6>
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide d-flex justify-content-center align-items-center">
                        <div class="rounder-image-home">
                            <!-- <a href="{{ url('products') }}"> -->
                            <a href="#">
                                <img src="{{ url('website_asset/image/rounder/flasks.jpg') }}" alt="">
                                <h6>Flask</h6>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide d-flex justify-content-center align-items-center">
                        <div class="rounder-image-home">
                            <!-- <a href="{{ url('products') }}"> -->
                            <a href="#">
                                <img src="{{ url('website_asset/image/rounder/bags.jpg') }}" alt="">
                                <h6>Handbag</h6>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide d-flex justify-content-center align-items-center">
                        <div class="rounder-image-home">
                            <!-- <a href="{{ url('products') }}"> -->
                            <a href="#">
                                <img src="{{ url('website_asset/image/rounder/keychain.jpg') }}" alt="">
                                <h6>Key Chain</h6>
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide d-flex justify-content-center align-items-center">
                        <div class="rounder-image-home">
                            <!-- <a href="{{ url('products') }}"> -->
                            <a href="#">
                                <img src="{{ url('website_asset/image/rounder/pen.jpg') }}" alt="">
                                <h6>Pen</h6>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-prev">
                    <i class="fas fa-chevron-left"></i> <!-- Replace with your preferred icon -->
                </div>
                <div class="swiper-button-next">
                    <i class="fas fa-chevron-right"></i> <!-- Replace with your preferred icon -->
                </div>

            </div>
        </div>
    </div>
</div>
<section class="newArrival">


    <div class="container pt-3 ">
        <h2 class="text-center"> New Arrivals</h2>

        <div class="row">
            <div class="col-12">
                <div class="swiper round-image">
                    <div class="swiper-wrapper">


                        <div class="swiper-slide d-flex justify-content-center align-items-center">
                            <div class="newArrivalCard">
                                <!-- <a href="{{ url('products') }}"> -->
                                <a href="#">
                                    <img src="{{ url('website_asset/image/rounder/keychain.jpg') }}" alt="">


                                </a>
                                <button class="newArrivalCardBtn">Enquiry Cart</button>
                            </div>
                        </div>
                        <div class="swiper-slide d-flex justify-content-center align-items-center">
                            <div class="newArrivalCard">
                                <!-- <a href="{{ url('products') }}"> -->
                                <a href="#">
                                    <img src="{{ url('website_asset/image/rounder/keychain.jpg') }}" alt="">



                                </a>
                                <button class="newArrivalCardBtn">Enquiry Cart</button>
                            </div>
                        </div>
                        <div class="swiper-slide d-flex justify-content-center align-items-center">
                            <div class="newArrivalCard">
                                <!-- <a href="{{ url('products') }}"> -->
                                <a href="#">

                                    <img src="{{ url('website_asset/image/rounder/wallet.jpg') }}" alt="">



                                </a>
                                <button class="newArrivalCardBtn">Enquiry Cart</button>
                            </div>
                        </div>
                        <div class="swiper-slide d-flex justify-content-center align-items-center">
                            <div class="newArrivalCard">
                                <!-- <a href="{{ url('products') }}"> -->
                                <a href="#">

                                    <img src="{{ url('website_asset/image/rounder/flaskss.jpg') }}" alt="">



                                </a>
                                <button class="newArrivalCardBtn">Enquiry Cart</button>
                            </div>
                        </div>
                        <div class="swiper-slide d-flex justify-content-center align-items-center">
                            <div class="newArrivalCard">
                                <!-- <a href="{{ url('products') }}"> -->
                                <a href="#">

                                    <img src="{{ url('website_asset/image/rounder/bags.jpg') }}" alt="">



                                </a>
                                <button class="newArrivalCardBtn">Enquiry Cart</button>
                            </div>
                        </div>
                        <div class="swiper-slide d-flex justify-content-center align-items-center">
                            <div class="newArrivalCard">
                                <!-- <a href="{{ url('products') }}"> -->
                                <a href="#">

                                    <img src="{{ url('website_asset/image/rounder/pen.jpg') }}" alt="">



                                </a>
                                <button class="newArrivalCardBtn">Enquiry Cart</button>
                            </div>
                        </div>



                    </div>
                    <div class="swiper-button-prev">
                        <i class="fas fa-chevron-left"></i> <!-- Replace with your preferred icon -->
                    </div>
                    <div class="swiper-button-next">
                        <i class="fas fa-chevron-right"></i> <!-- Replace with your preferred icon -->
                    </div>

                </div>
            </div>
        </div>
       
    </div>

</section>

<div class="container"><div class="row">
    <div class="col-12">    <div class="bgWhite">
    <p class="my-4 px-5 text-center "><b>Whether it’s about gaining the trust of the new client, motivating the
            employees, or simply showing your appreciation for them,
            Corporate gifts is the best answer to all.</b></p>

    </div></div>
</div></div>



<section class="shopBudget">


    <div class="container pt-3">
        <h2 class="text-center"> Shop by Budget</h2>

        <div class="row g-3 d-flex justify-content-center">
            <div class="col-lg-3 col-md-4">
                <div class="budgetShopCard budgetShopCard1">
                    <h3>₹200 - ₹500
                    </h3>
                    <button class="budgetExplore">Explore Product</button>
                </div>
            </div>
            <div class="col-lg-3  col-md-4">
                <div class="budgetShopCard budgetShopCard2">
                    <h3>₹200 - ₹500
                    </h3>
                    <button class="budgetExplore">Explore Product</button>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="budgetShopCard budgetShopCard3">
                    <h3>₹200 - ₹500
                    </h3>
                    <button class="budgetExplore">Explore Product</button>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="budgetShopCard budgetShopCard4">
                    <h3>₹200 - ₹500
                    </h3>
                    <button class="budgetExplore">Explore Product</button>
                </div>
            </div>
        </div>
    </div>

    </div>
</section>


<!---------------------------- brand  -------------------------------------->
<div class="container">
    <div class="home-heading py-4">
        <h2 class="text-center"> Client Who Trust Us</h2>
    </div>
    <div class="swiper brand-Swiper">
        <div class="swiper-wrapper">

            <div class="swiper-slide swiper-slide-brand p-3">
                <img src="{{ url('website_asset/image/client/asianPaint.png') }}" alt=""
                    style="width: 60%; height: auto; object-fit: contain;">
            </div>
            <div class="swiper-slide swiper-slide-brand">
                <img src="{{ url('website_asset/image/client/cma_cgm.png') }}" alt=""
                    style="width: 60%; height: auto; object-fit: contain;">
            </div>
            <div class="swiper-slide swiper-slide-brand">
                <img src="{{ url('website_asset/image/client/oppo.png') }}" alt=""
                    style="width: 60%; height: auto; object-fit: contain;">
            </div>
            <div class="swiper-slide swiper-slide-brand">
                <img src="{{ url('website_asset/image/client/valeo.png') }}" alt=""
                    style="width: 60%; height: auto; object-fit: contain;">
            </div>
            <div class="swiper-slide swiper-slide-brand">
                <img src="{{ url('website_asset/image/client/asianPaint.png') }}" alt=""
                    style="width: 60%; height: auto; object-fit: contain;">
            </div>
            <div class="swiper-slide swiper-slide-brand">
                <img src="{{ url('website_asset/image/client/cma_cgm.png') }}" alt=""
                    style="width: 60%; height: auto; object-fit: contain;">
            </div>
            <div class="swiper-slide swiper-slide-brand">
                <img src="{{ url('website_asset/image/client/oppo.png') }}" alt=""
                    style="width: 60%; height: auto; object-fit: contain;">
            </div>
            <div class="swiper-slide swiper-slide-brand">
                <img src="{{ url('website_asset/image/client/valeo.png') }}" alt=""
                    style="width: 60%; height: auto; object-fit: contain;">
            </div>


        </div>
        <div class="swiper-button-next home-next-button-brand"></div>
        <div class="swiper-button-prev home-next-button-brand"></div>

        <div class="swiper-pagination"></div>
    </div>
</div>




<!------------------------------ Growing----------------------------------------------------->
<!-- <div class="container mt-5">
    <div class="home-heading py-4">
        <h4><span class="heading-line">Growing Numbers</span></h4>
    </div>

    <div class="row growth_numbers">
        <div class="col-md-4">
            <i class="fa-solid fa-face-smile"></i>
            <h1 class="grow">
                <span class="count">300</span>+

            </h1>
            <p>Happy Clients</p>
        </div>
        <div class="col-md-4">
            <i class="fa-solid fa-gifts"></i>
            <h1 class="grow">
                <span class="count">1000</span>+
            </h1>
            <p>Gifting Orders</p>
        </div>
        <div class="col-md-4">
            <i class="fa-solid fa-calendar-check"></i>
            <h1 class="grow">
                <span class="count">4</span>+
            </h1>
            <p>Years In Business</p>
        </div>
    </div>
</div> -->

<!--------------------------------- Testimonials -------------------------------------->
<div class="container my-5">

    <h2 class="text-center">Our Customer Feedback</h2>

    <div class="row">
        <div class="swiper custom-testimonials">
            <div class="swiper-wrapper">
                <?php
// Assuming an array of testimonials
$testimonials = [
    [
        'img_url' => 'website_asset/image/rounder/sandeep.png',
        'name' => 'Sadeep M',
        'stars' => 5,
        'review' => 'Exquisite collection! Unique gifts, friendly staff, and charming ambiance. A treasure trove of joy!" #GiftShopGems 🎁🎉🛍️',
    ],
    [
        'img_url' => 'website_asset/image/rounder/ramSivaKumar.png',
        'name' => 'Ramkumar',
        'stars' => 4,
        'review' => "Forget the frantic last-minute rush, Festive Five Gifting Solutions saved the day!.Trust me, your friends and family will thank you!",
    ],
    [
        'img_url' => 'website_asset/image/rounder/ragavenda.png',
        'name' => 'Ragavendra c',
        'stars' => 5,
        'review' => "Perfect gift for my son's birthday a memorable one thanks festive five gifting solutions and Mr.Baharani and Mr Manikandan.",
    ],
    [
        'img_url' => 'website_asset/image/rounder/sandeep.png',
        'name' => 'Sadeep M',
        'stars' => 5,
        'review' => 'Exquisite collection! Unique gifts, friendly staff, and charming ambiance. A treasure trove of joy!" #GiftShopGems 🎁🎉🛍️',
    ],
    [
        'img_url' => 'website_asset/image/rounder/ramSivaKumar.png',
        'name' => 'Ramkumar',
        'stars' => 4,
        'review' => "Forget the frantic last-minute rush, Festive Five Gifting Solutions saved the day!.Trust me, your friends and family will thank you!",
    ],
    [
        'img_url' => 'website_asset/image/rounder/ragavenda.png',
        'name' => 'Ragavendra c',
        'stars' => 5,
        'review' => "Perfect gift for my son's birthday a memorable one thanks festive five gifting solutions and Mr.Baharani and Mr Manikandan.",
    ],
    
];

foreach ($testimonials as $testimonial) {
    echo '
                    <div class="swiper-slide">
                        <div class="card custom-home-testimony">
                            <div class="row g-0">
                                <div class="col-4 d-flex align-items-center">
                                    <img src="' . $testimonial['img_url'] . '" class="card-img-top custom-card-img img-fluid" alt="' . $testimonial['name'] . '">
                                   </div>
                                        <div class="col-8 d-flex align-items-center">
                                  <p class="card-title custom-card-title">' . $testimonial['name'] . ' <br/>
                                  <i class="fa-solid fa-star"></i>
                                  <i class="fa-solid fa-star"></i>
                                  <i class="fa-solid fa-star"></i>
                                  <i class="fa-solid fa-star"></i>
                                  <i class="fa-solid fa-star"></i>
                                  </p>
                                </div>
                                <div class="col-md-12">
                                    <div class="">

                                        <div class="custom-stars">
                                            ' . str_repeat('<i class="fa-solid fa-star"></i>', $testimonial['stars']) . '
                                        </div>
                                        <p class="card-text my-2 custom-card-text">' . $testimonial['review'] . '</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
}
?>
            </div>
        </div>
    </div>

</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper('.custom-testimonials', {
        slidesPerView: 1,
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        breakpoints: {
            768: {
                slidesPerView: 2
            },
            1024: {
                slidesPerView: 3
            }
        }
    });
</script>


<section class="growingSec">
    <div class="container">
        <div class="row g-4">
            <h2 class="text-center">Growing Numbers</h2>
            <div class="col-md-4">
                <div class="growingCard yellow">
                    <p class="growingCount">300+</p>
                    <p class="growingTitle">Happy Clients</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="growingCard pink">
                    <p class="growingCount">1,000+</p>
                    <p class="growingTitle">Gifting Orders</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="growingCard blue">
                    <p class="growingCount">4+</p>
                    <p class="growingTitle">Years In Business</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!----------------------------- faq ------------------------------------------->
<section class="faqSection">
<div class="container">
    <div class="home-heading py-4">
        <h2 class="text-center">Frequently Asked Question </h2>
    </div>
    <div class="row">
    <div class="col-md-4 order-md-2 d-flex justify-content-center"> <img src="website_asset/image/rounder/Faq.png" class="img-fluid" alt=""></div>
        <div class="col-md-8">
        <div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                Where can I find customized corporate gifts in Festive?
            </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Placeholder content for this accordion, which is intended to
                demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion
                body.</div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Can I order online in festive five?
            </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Placeholder content for this accordion, which is intended to
                demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion
                body. Let's imagine this being filled with some actual content.</div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseThree" aria-expanded="false"
                aria-controls="flush-collapseThree">
                Do you have minimum quantity conditions?
            </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse"
            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Placeholder content for this accordion, which is intended to
                demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion
                body. Nothing more exciting happening here in terms of content, but just filling up the
                space to make it look, at least at first glance, a bit more representative of how this would
                look in a real-world application.</div>
        </div>
    </div>

    <!-- New Accordion Item -->
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                How can I track my order status?
            </button>
        </h2>
        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Placeholder content for this accordion, which is intended to
                demonstrate the <code>.accordion-flush</code> class. This is the fourth item's accordion
                body. Here, you can track the status of your order by visiting the "Order Status" section on
                the website or contacting customer support for more details.</div>
        </div>
    </div>
</div>


        </div>
        </section>
        <br />
        @endsection
        @push('script-addon')

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Initialize an array to store selected products
                let selectedProductsArray = [];

                // Add event listener to "ENQUIRY CART" buttons
                const enquiryButtons = document.querySelectorAll('.home-cart-button');
                enquiryButtons.forEach(function (button) {
                    button.addEventListener('click', function () {
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
            document.addEventListener('DOMContentLoaded', function () {
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

        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script>
            var swiper = new Swiper('.swiper', {
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                slidesPerView: 1, // Default number of slides per view
                spaceBetween: 20, // Default space between slides
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    // When window width is >= 640px
                    600: {
                        slidesPerView: 2, // Show 2 slides on tablets
                        spaceBetween: 20, // Space between slides
                    },
                    // When window width is >= 768px
                    700: {
                        slidesPerView: 3, // Show 3 slides on small desktops
                        spaceBetween: 30, // Space between slides
                    },
                    // When window width is >= 1024px
                    1000: {
                        slidesPerView: 4, // Show 4 slides on larger desktops
                        spaceBetween: 40, // Space between slides
                    },
                },
            });
        </script>



        <script>


            function toggleCollapse(collapseId, button) {
                const collapseElem = document.getElementById(collapseId);
                const icon = button.querySelector('i');

                // Close all other collapses
                const allCollapseElems = document.querySelectorAll('.collapse');
                allCollapseElems.forEach(elem => {
                    if (elem.id !== collapseId && elem.classList.contains('show')) {
                        const relatedButton = document.querySelector(`[aria-controls="${elem.id}"]`);
                        const relatedIcon = relatedButton.querySelector('i');
                        elem.classList.remove('show');
                        relatedIcon.classList.remove('fa-chevron-down');
                        relatedIcon.classList.add('fa-chevron-right');
                    }
                });

                const isOpen = collapseElem.classList.contains('show');

                // Toggle collapse
                if (!isOpen) {
                    icon.classList.remove('fa-chevron-right');
                    icon.classList.add('fa-chevron-down');
                } else {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-right');
                }

                collapseElem.classList.toggle('show');
            }
        </script>






        @endpush
        @push('add-style')
        <style>
            .carousel-content {
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 50%;
                color: white;
                font-size: 37px;
                padding-top: 50px;
                max-width: 50%;
                /* Ensure content only covers the right half */
            }
        </style>

        @endpush