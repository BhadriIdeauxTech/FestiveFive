@extends('layouts.adminapp')
@section('title', 'Product')
@section('contentdashboard')
<div class="main-content">
    <section class="section">
        <!-- <div class="section-header" style="background-color: transparent;border:none;"> -->
        <!-- <h1>Product Section</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Product</div>
                </div> -->
        <!-- </div> -->

        <div class="section-body">
            <h3 class="section-header">
                <!-- Product Section -->
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}" style="color: black;font-weight:bold;text-decoration:none;">Dashboard</a></div>
                    <div class="breadcrumb-item">Product</div>
                </div>
            </h3>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Product view</h4>
                            <div>
                                <a href="{{ route('adminproduct.create') }}" class="btn btn-primary btn-sm">ADD</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Category</th>
                                            <th>Product Name</th>
                                            <th>Amount</th>
                                            <th>Product Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product_view as $i => $product_views)
                                        <tr>
                                            <td>
                                                {{++$i}}
                                            </td>
                                            <td>{{ $product_views->category_name }}</td>
                                            <td>{{ $product_views->product_name }}</td>
                                            <td>₹ {{ $product_views->amount }}</td>
                                            <td>
                                            <img alt="image" src="{{ url('product_image', $product_views->product_image) }}" width="30" height="30" data-toggle="modal" data-target="#exampleModalCenter{{$product_views->id}}" title="" class="rounded-circle">
                                             
                                            </td>

                                            <td>
                                                <div class="dropdown"> 
                                                    <button style="background-color: transparent; color: black; border: none;" class="btn" type="button" id="dropdownMenuButton{{$i}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$i}}">
                                                        <a class="dropdown-item" href="{{ route('adminproduct.edit', $product_views->id) }}"> Edit </a>
                                                        <form method="POST" action="{{ route('adminproduct.destroy', $product_views->id) }}" onsubmit="return confirm('Are you sure you want to delete this model?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn dropdown-item" style="margin-left:12px;font-size: 12px;">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
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
@foreach ($product_view as $i => $product_views)
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter{{$product_views->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="width: 300px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Image View</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <center>
                <div class="modal-body">
                    <img alt="image" src="{{ url('product_image',$product_views->product_image) }}" width="75" height="auto" title="">
                </div>
            </center>
        </div>
    </div>
</div>
@endforeach
@endsection