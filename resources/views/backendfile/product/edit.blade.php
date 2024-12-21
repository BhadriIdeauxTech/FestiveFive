@extends('layouts.adminapp')
@section('title', 'Edit Product')
@section('contentdashboard')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <h3 class="section-header">
                <!-- Edit Product -->
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}" style="color: black;font-weight:bold;text-decoration:none;">Dashboard</a></div>
                    <div class="breadcrumb-item">Edit Product</div>
                </div>
            </h3>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form class="needs-validation" novalidate="" action="{{ route('adminproduct.update', $product->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">Edit Product</h4>
                                <div>
                                    <a href="{{ route('adminproduct.index') }}" class="btn btn-primary btn-sm">Back</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <select class="form-control" required name="category_id">
                                        <option value="" selected disabled>Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please fill in the Category field!
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" class="form-control" required="" name="product_name" placeholder="Product Name" autocomplete="off" value="{{ $product->product_name }}">
                                    <div class="invalid-feedback">
                                        Please fill in the name field!
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Amount</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                ₹
                                            </div>
                                        </div>
                                        <input type="text" class="form-control currency" name="amount" value="{{ $product->amount }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="customFile">Product Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" aria-describedby="fileHelp" name="product_image" onchange="displaySelectedImage(this)">
                                        <label class="custom-file-label" for="customFile" style="cursor: pointer;">Choose file</label>
                                    </div>
                                    <small id="fileHelp" class="form-text text-muted">Please select an image.</small>
                                </div>

                                <div class="selected-image" id="selectedImageContainer" style="margin-top: 10px;">
                                    <img id="selectedImage" style="max-width: 60%; max-height: 150px; display: block;" src="{{ url('product_image', $product->product_image) }}">
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </section>
</div>


@endsection

@push('other-scripts')
<script>
    function displaySelectedImage(input) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById('selectedImage');
                img.src = e.target.result;
                img.style.display = 'block'; // Show the image
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush