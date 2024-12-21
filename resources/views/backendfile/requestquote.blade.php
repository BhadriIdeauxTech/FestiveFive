@extends('layouts.adminapp')
@section('title', 'Request a Quote')
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
            <h3 class="section-header">
                <!-- Enquiry -->
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}" style="color: black;font-weight:bold;text-decoration:none;">Dashboard</a></div>
                    <div class="breadcrumb-item">Request a Quote</div>
                </div>
            </h3>
            <div class="row">

                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Quote List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>Quotation List ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Company Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Message</th>
                                            <th>Products</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quotationLists as $quotationList)
                                        <tr>
                                            <td>{{ $quotationList->id }}</td>
                                            <td>{{ $quotationList->first_name }}</td>
                                            <td>{{ $quotationList->last_name }}</td>
                                            <td>{{ $quotationList->company_name }}</td>
                                            <td>{{ $quotationList->phone }}</td>
                                            <td>{{ $quotationList->email }}</td>
                                            <td>{{ $quotationList->message }}</td>
                                            <td>
                                                <!-- <ul>
                        @foreach ($quotationList->quotationProducts as $product)
                            <li>
                                <strong>Product Name:</strong> {{ $product->product_name }},
                                <strong>Product Image:</strong> <img src="{{ $product->product_image }}" alt="Product Image">
                                
                            </li>
                        @endforeach
                    </ul> -->

                                                <button type="button" class="btn btn-submit" data-toggle="modal" data-target="#exampleModalCenter{{$product->id}}">
                                                    View Products
                                                </button>
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
</div>
</section>
<!-- Modal -->
@foreach ($quotationLists as $quotationList)
@foreach ($quotationList->quotationProducts as $product)
<div class="modal fade" id="exampleModalCenter{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th colspan="2" class="">Product</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($quotationList->quotationProducts as $product)
                        <tr>
                            <td>{{ $product->product_name }}</td>
                            <td>
                                <img src="{{ $product->product_image }}" alt="Product Image"  height="100" width="100">
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                      
                  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endforeach
@endsection