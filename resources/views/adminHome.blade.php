@extends('layouts.adminapp')
@section('title','DASHBOARD')
@section('contentdashboard')
<div class="main-content">
    <section class="section">
        <!-- <div class="section-header">
            <h1>Dashboard</h1>
          </div> -->
        <h3 class="section-header" >
            Dashboard
           
        </h3>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{ route('admincatalog.index') }}" style="text-decoration: none;">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-square"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Catalog</h4>
                            </div>
                            <div class="card-body">
                                {{$catalog}}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{ route('admincategories.index') }}" style="text-decoration: none;">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-columns"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Category</h4>
                            </div>
                            <div class="card-body">
                                {{$category}}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <a href="{{ route('adminproduct.index') }}" style="text-decoration: none;">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-th-large"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Product</h4>
                            </div>
                            <div class="card-body">
                                {{$product}}
                            </div>
                        </div>
                    </a>
                </div>

            </div>
            {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{ route('adminmodel.index') }}" style="text-decoration: none;">
                    <div class="card card-statistic-1">

                        <div class="card-icon bg-success">
                            <i class="fas fa-th"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Varieties</h4>
                            </div>
                            <div class="card-body">
                                {{$model}}
                            </div>
                        </div>
                    </div>
                </a>
            </div> --}}
        </div>


        <!-- <div class="row">

            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Customer Enquirys</h4>
                        <div class="card-header-action">
                            <a href="{{ route('enquiry.detail') }}" class="btn btn-primary">View All</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @for ($i = 0; $i < 0; $i++)
                                        @endfor
                                    @foreach($getenquirystoday as $getenquirystodays)
                                    <tr>
                                        <td>
                                            {{++$i}}
                                        </td>
                                        <td>
                                            {{$getenquirystodays->name}}
                                            <div class="table-links">
                                                <p>{{$getenquirystodays->message}}</p>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $getenquirystodays->email}}
                                        </td>
                                        <td>
                                            {{ $getenquirystodays->number}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </section>
</div>
@endsection
