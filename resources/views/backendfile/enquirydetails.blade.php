@extends('layouts.adminapp')
@section('title', 'ENQUIRY DETAILS')
@section('contentdashboard')
<div class="main-content">
    <section class="section">
        <!-- <div class="section-header" style="background-color: transparent;border:none;"> -->
        <!-- <h1>Banner Section</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Banner</div>
                </div> -->
        <!-- </div> -->

        <div class="section-body">
            <h3 class="section-header" >
                <!-- Enquiry -->
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}" style="color: black;font-weight:bold;text-decoration:none;">Dashboard</a></div>
                    <div class="breadcrumb-item">Enquiry</div>
                </div>
            </h3>
            <div class="row">

                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Enquiry List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Message</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < 0; $i++) 
                                        @endfor
                                        @foreach($getenquirys as $getenquiryss) <tr>
                                            <td>
                                                {{++$i}}
                                            </td>
                                            <td>
                                                {{$getenquiryss->firstname}} {{$getenquiryss->lastname}}
                                                <!-- <div class="table-links">
                                                    <p> {{$getenquiryss->message}}</p>
                                                </div> -->
                                            </td>
                                            <td>
                                                {{$getenquiryss->email}}
                                            </td>
                                            <td>
                                         <textarea name="" id="" readonly style="border: none; margin: 0; padding: 0; user-select: none; -moz-user-select: none; -webkit-user-select: none; -ms-user-select: none;"> {{$getenquiryss->message}}</textarea>      
                                            </td>
                                            <td>
                                                {{$getenquiryss->date}}
                                            </td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection