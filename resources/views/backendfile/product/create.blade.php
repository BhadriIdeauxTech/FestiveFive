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
                <div class="col-12 ">

                    <div class="card">
                        <form class="needs-validation" novalidate="" action="{{ route('adminproduct.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Product Add</h4>
                            <div>
                                <a href="{{ route('adminproduct.index') }}" class="btn btn-primary btn-sm">Back</a>
                            </div>
                        </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <select class="form-control" required name="category_id">
                                        <option value="" selected disabled>Select Category</option>
                                        @foreach($category as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Please fill in the Category field!
                                    </div>
                                </div>

                                <div id="dynamic-fields-container">
                                    <!-- Dynamic fields will be added here -->
                                </div>



                                <button type="button" class="btn btn-primary" id="add-field-btn">Add Field</button>



                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-submit">Submit</button>
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
    $(document).ready(function() {
        // Counter to keep track of dynamically added fields
        let fieldCounter = 0;

        // Function to add a new set of fields
        function addNewField() {
            // Increment the counter
            fieldCounter++;

            // HTML for a new set of fields
            const newFieldHTML = `
                <div class="row dynamic-field" id="dynamic-field-${fieldCounter}">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control" required name="product_name_${fieldCounter}" placeholder="Product Name" autocomplete="off">
                            <div class="invalid-feedback">
                                Please fill in the name field!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Amount</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        ₹
                                    </div>
                                </div>
                                <input type="text" class="form-control currency" name="amount_${fieldCounter}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="customFile">Product Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile${fieldCounter}" aria-describedby="fileHelp" required name="product_image_${fieldCounter}" onchange="displaySelectedImage(this, ${fieldCounter})" style="opacity: 0; width: 0.1px; height: 0.1px; overflow: hidden; position: absolute; z-index: -1;">
                                <label class="custom-file-label" for="customFile${fieldCounter}" style="cursor: pointer;">Choose file</label>
                            </div>
                            <small id="fileHelp" class="form-text text-muted">Please select an image.</small>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="selected-image" id="selectedImageContainer-${fieldCounter}" style="margin-top: 10px;">
                            <img id="selectedImage-${fieldCounter}" style="width: 50px; height: 50px; display: none;">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <button type="button" class="btn btn-danger remove-field-btn" data-target="#dynamic-field-${fieldCounter}" ${fieldCounter === 1 ? 'disabled' : ''}>Remove Field</button>
                            ${fieldCounter === 1 ? '<div class="invalid-feedback">The first row cannot be deleted!</div>' : ''}
                        </div>
                    </div>
                </div>
            `;

            // Append the new fields to the container
            $('#dynamic-fields-container').append(newFieldHTML);
        }

        // Event listener for the Add Field button
        $('#add-field-btn').click(function() {
            addNewField();
        });

        // Event delegation for dynamically added Remove Field buttons
        $(document).on('click', '.remove-field-btn', function() {
            const targetId = $(this).data('target');
            if (fieldCounter > 1) {
                $(targetId).remove();
                fieldCounter--;
            }
        });
    });

    function displaySelectedImage(input, fieldCounter) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.getElementById(`selectedImage-${fieldCounter}`);
                img.src = e.target.result;
                img.style.display = 'block'; // Show the image
            }
            reader.readAsDataURL(file);
        }
    }
</script>






@endpush