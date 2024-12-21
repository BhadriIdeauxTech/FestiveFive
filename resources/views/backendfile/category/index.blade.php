@extends('layouts.adminapp')
@section('title', 'Category')
@section('contentdashboard')
<div class="main-content">
    <section class="section">
        <!-- <div class="section-header" style="background-color: transparent;border:none;"> -->
        <!-- <h1>Category Section</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Category</div>
                </div> -->
        <!-- </div> -->

        <div class="section-body">
            <h3 class="section-header" >
                <!-- Category Section -->
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}" style="color: black;font-weight:bold;text-decoration:none;">Dashboard</a></div>
                    <div class="breadcrumb-item">Category</div>
                </div>
            </h3>
            <div class="row">
                <div class="col-12 col-md-4 col-lg-4">

                    <div class="card">
                        <form class="needs-validation" novalidate="" action="{{ route('admincategories.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Category Add</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" class="form-control" required name="category_name" placeholder="Category Name" autocomplete="off">
                                    <div class="invalid-feedback">
                                        Please fill in the name field!
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="customFile">Product Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" aria-describedby="fileHelp" required name="category_image" onchange="displaySelectedImage(this)" style="opacity: 0; width: 0.1px; height: 0.1px; overflow: hidden; position: absolute; z-index: -1;">
                                        <label class="custom-file-label" for="customFile" style="cursor: pointer;">Choose file</label>
                                    </div>
                                    <small id="fileHelp" class="form-text text-muted">Please select an image.</small>
                                </div>

                                <div class="selected-image" id="selectedImageContainer" style="margin-top: 10px;">
                                    <img id="selectedImage" style="max-width: 60%; max-height: 150px; display: none;">
                                </div>


                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-submit">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Category view</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Category Name</th>
                                            <th>Category Image</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($category_view as $i => $category_views)
                                        <tr>
                                            <td>
                                                {{++$i}}
                                            </td>
                                            <td>{{ $category_views->category_name }}</td>
                                            <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{$category_views->id}}">
                                                    View image
                                                </button>
                                                <!-- <img alt="image" src="{{ url('category_image',$category_views->category_image) }}"  width="75" data-toggle="tooltip" title=""> -->
                                            </td>


                                            <td>
                                                <div class="dropdown">
                                                    <button style="background-color: transparent; color: black; border: none;" class="btn" type="button" id="dropdownMenuButton{{$i}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$i}}">
                                                        <a class="dropdown-item" href="{{ route('admincategories.edit', $category_views->id) }}"> Edit </a>
                                                        <!-- <form method="POST" action="{{ route('admincategories.destroy', $category_views->id) }}" onsubmit="return confirm('Are you sure you want to delete this model?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn dropdown-item" style="margin-left:12px;font-size: 12px;">Delete</button>
                                                        </form> -->
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
@foreach ($category_view as $i => $category_views)
<!-- Modal -->
<div  class="modal fade" id="exampleModalCenter{{$category_views->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                    <img alt="image" src="{{ url('category_image',$category_views->category_image) }}" width="75" height="auto" title="">
                </div>
            </center>
        </div>
    </div>
</div>
@endforeach
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