@extends('layouts.websiteapp')
@section('website-main-content')
<div class="container">
    <div class="heading">
        <h4><span class="heading-line">Get in touch</span></h4>
    </div>
</div>

<div class="container  contact-info-touch">
    <div class="row">
        <div class="col-md-4">
            <div class="text-center  contact-info">
                {{-- <i class="fa-solid fa-square-phone"></i> --}}
                <img src="{{ url('/website_asset/image/logo/ci1.svg') }}" alt="">
                <h4>Phone</h4>
                <p><a href="tel:+919367129340" style="color:#000">+91 93671 29340</a><br><a href="tel:+918925199615" style="color:#000">+91 89251 99615</a></p>

            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center contact-info">
                {{-- <i class="fa-solid fa-envelope"></i> --}}
                <img src="{{ url('website_asset/image/logo/ci3.svg') }}" alt="">
                <h4>Email</h4>
                <p><a href="mailto:festivefivegifting@gmail.com" style="color:#000">festivefivegifting@gmail.com</a></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="text-center contact-info">
                {{-- <i class="fa-solid fa-location-dot"></i> --}}
                <img src="{{ url('website_asset/image/logo/ci2.svg/') }}" alt="">
                <h4>Address</h4>
                <p>Festive Five Gifting Solutions<br/>80 A, Ground Floor, SMS Bulding,<br /> MS Road, Vadasery,<br /> Nagercoil - 629001</p>
            </div>
        </div>
    </div>
</div>
<form action="{{ url('contact-detail') }}" method="post" enctype="multipart/form-data">
    @csrf
    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-12 col-md-6 contact-form">
                            <label for="" class="form-label">First Name <span>*</span></label>
                            <input type="text" class="form-control" id="" autocomplete="off" required name="firstname">
                            <!-- <div id="" class="form-text">First Name</div> -->
                        </div>                        
                        <div class="col-12 col-md-6 contact-form">
                            <label for="" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="" autocomplete="off" required name="lastname">
                            <!-- <div id="" class="form-text">Last Name</div> -->
                        </div>
                        <div class="col-12 col-md-6 contact-form">
                            <label for="" class="form-label">Phone <span>*</span></label>
                            <input type="phone" class="form-control" id="" autocomplete="off" required name="phone">
                        </div>
                        <div class="col-12 col-md-6 contact-form">
                            <label for="" class="form-label">Email <span>*</span></label>
                            <input type="email" class="form-control" id="" autocomplete="off" required name="email">
                        </div>
                    </div>
                    <br>
                    <div class="col-12 contact-form">
                        <label for="" class="form-label">Message <span>*</span></label>
                        <textarea name="message" rows="5" class="form-control"></textarea>
                    </div>
                    <br>
                    <div class="col-12 contact-form">
                        <button type="submit" class="btn">SEND</button>
                    </div>


                </div>
                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7898.231347646789!2d77.43161505805566!3d8.19110128382615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b04f1472c388745%3A0x5bc15b8bf5e85139!2sFestive%20Five%20Gifting%20Solutions!5e0!3m2!1sen!2sin!4v1714468208981!5m2!1sen!2sin" width="100%" height="372" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
</form>

@endsection