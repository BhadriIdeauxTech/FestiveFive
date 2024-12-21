@extends('layouts.websiteapp')
@section('website-main-content')
<div class="container-fluid">
    <div class="row p-3">
        <div class="col-md-8 px-0">
            <div class="about-main-bg1">

                <h1>LOOKING FOR UNIQUE GIFTING IDEAS FOR YOUR BRAND THAT CAN LEAD TO TREMENDOUS INCREASE IN
                    AWARENESS, ENGAGEMENT AND EVEN SALES?</h1>

            </div>
        </div>
        <div class="col-md-4 px-0">
            <div class="about-main-bg2">
                <div class="">
                    <img src="{{ url('website_asset/image/logo/mybs5lpn 1.svg') }}" alt="">
                    <h4>is the ANSWER!</h4>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row about-border ">
        <div class="col-md-4 about-images">
            <img src="{{ url('website_asset/image/logo/about-1.png') }}" alt="" class="">
        </div>
        <div class="col-md-8 about-paragraph mb-4">
            <h5 class="">About Us</h5>
            <p class="mb-4">Festive5 was founded in 2015 August. Festive5 is into customization of extremely
                impressive corporate gifting and awards offering exclusive choice to the corporate, colleges and
                their institutes.</p>
            <p class="mb-4">Within a short span since our start as a brand, we have worked with over 350+
                Corporates across industries to offer specific corporate gifting products which are unique,
                innovative and budget bound and executed over 10k+ successful projects</p>
            <p class="mb-4">With a vision to become the most preferred corporate and promotional gifting company
                in India, we offer the latest and most innovative products that will last, and you can choose
                from our wide range, at best prices. Increasing your business exposure and creating customer &
                client loyalty both can now be easily achieved with the wide range we offer.</p>
            <p class="">Trust us to customize these products with your logos on them, making them the
                perfect gift to give to your Brand Ambassadors.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 about-images">
            <img src="{{ url('website_asset/image/logo/about-2.png') }}" alt="" class="">
        </div>
        <div class="col-md-8 about-paragraph">
            <h5 class="">Our Values</h5>
            <p class="mb-4">At Festive5, we realize the importance of ensuring that your customers, clients,
                suppliers, partners & students feel valued and your relationship with them receives due
                recognition & appreciation.</p>
            <p class="mb-4">We Believe in Delivering Values and Earning goodwill out of the projects we carry
                out. Business and the bond with our clients is clear and pure keeping our values strong as well
                as respecting our clients value which makes us THE MOST TRUSTED BRAND amongst Corporates and
                Institutes.</p>

            <p class="">We strongly believe in "Growing Together"</p>

        </div>
    </div>
</div>


<div class="container">
    <div class="text-center about-choose">Why Client Choose Us?</div>

    <div class="row py-5 mt-5 mb-5">
        <div class="col-md-4">
            <div class="text-center  about-info">
                {{-- <i class="fa-solid fa-face-smile"></i> --}}
                <img src="{{ url('website_asset/image/logo/ab2.svg') }}" alt="">

                <h4>We Listen</h4>
                <p>We get to know you, your values, message and your recipients.</p>

            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center about-info">
                {{-- <i class="fa-solid fa-handshake"></i> --}}
                <img src="{{ url('website_asset/image/logo/ab1.svg') }}" alt="">

                <h4>We Create</h4>
                <p>We work collaboratively to design a custom solution perfect for your brand and gifting
                    occasion.</p>

            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center about-info">
                {{-- <i class="fa-solid fa-star"></i> --}}
               <img src="{{ url('website_asset/image/logo/ab3.svg') }}" alt="">
                <h4>We Make it Happen</h4>
                <p>Whether its custom branding or innovative technology, relax, we've done this before.</p>

            </div>
        </div>
    </div>
</div>
@endsection
