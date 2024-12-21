@extends('layouts.adminapp')
@section('title', 'Catalog')
@section('contentdashboard')
<div class="main-content">
    <section class="section">
        <!-- <div class="section-header" style="background-color: transparent;border:none;"> -->
        <!-- <h1>catalog Section</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">catalog</div>
                </div> -->
        <!-- </div> -->

        <div class="section-body">
            <h3 class="section-header" >
                <!-- Catalog Section -->
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}" style="color: black;font-weight:bold;text-decoration:none;">Dashboard</a></div>
                    <div class="breadcrumb-item">Catalog</div>
                </div>
            </h3>
            <div class="row">
                <div class="col-12 col-md-4 col-lg-4">

                    <div class="card">
                        <form class="needs-validation" novalidate="" action="{{ route('admincatalog.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Catalog Add</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Catalog Name</label>
                                    <input type="text" class="form-control" required="" placeholder="Catalog Name" name="catalog_name" autocomplete="off">
                                    <div class="invalid-feedback">
                                        Please fill in the name field!
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="customFile">Catalog Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" aria-describedby="fileHelp" required name="catalog_image" onchange="displaySelectedImage(this)" style="opacity: 0; width: 0.1px; height: 0.1px; overflow: hidden; position: absolute; z-index: -1;">
                                        <label class="custom-file-label" for="customFile" style="cursor: pointer;">Choose file</label>
                                    </div>
                                    <small id="fileHelp" class="form-text text-muted">Please select an image.</small>
                                </div>

                                <div class="form-group">
                                    <label for="pdfFile">Catalog PDF</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="pdfFile" aria-describedby="pdfFileHelp" required name="catalog_pdf" onchange="displaySelectedPDF(this)" style="opacity: 0; width: 0.1px; height: 0.1px; overflow: hidden; position: absolute; z-index: -1;" accept=".pdf">
                                        <label class="custom-file-label" for="pdfFile" style="cursor: pointer;">Choose PDF</label>
                                    </div>
                                    <small id="pdfFileHelp" class="form-text text-muted">Please select a PDF file.</small>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="selected-image" id="selectedImageContainer" style="margin-top: 10px;">
                                            <img id="selectedImage" style="max-width: 60%; max-height: 150px; display: none;">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="selected-pdf" id="selectedPDFContainer" style="margin-top: 10px;">
                                               <iframe id="pdfIframe" width="100%" height="200px" style="display: none;"></iframe>
                                        </div>
                                    </div>
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
                            <h4>Catalog view</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Catalog Name</th>
                                            <th>Catalog Image</th>
                                            <th>PDF</th> 
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($catalog_view as $i => $catalog_views)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>{{ $catalog_views->catalog_name }}</td>
                                            <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{$catalog_views->id}}">
                                                    View image
                                                </button>
                                                <!-- <img alt="image" src="{{ url('catalog_image',$catalog_views->catalog_image) }}" width="75" data-toggle="tooltip" title=""> -->
                                            </td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ url('catalog_pdfs', $catalog_views->catalog_pdf) }}" target="_blank">View PDF</a>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button style="background-color: transparent; color: black; border: none;" class="btn" type="button" id="dropdownMenuButton{{$i}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$i}}">
                                                        <a class="dropdown-item" href="{{ route('admincatalog.edit', $catalog_views->id) }}"> Edit </a>
                                                        <!-- <form method="POST" action="{{ route('admincatalog.destroy', $catalog_views->id) }}" onsubmit="return confirm('Are you sure you want to delete this model?')">
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
@foreach ($catalog_view as $i => $catalog_views)
<!-- Modal -->
<div  class="modal fade" id="exampleModalCenter{{$catalog_views->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                    <img alt="image" src="{{ url('catalog_image',$catalog_views->catalog_image) }}" width="75" height="auto" title="">
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

<!-- <script>
    function displaySelectedPDF(input) {
        const selectedPDFContainer = document.getElementById('selectedPDFContainer');
        const selectedPDF = document.getElementById('selectedPDF');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                selectedPDF.textContent = input.files[0].name;
                selectedPDF.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            selectedPDF.textContent = '';
            selectedPDF.style.display = 'none';
        }
    }
</script> -->
<script>
    function displaySelectedPDF(input) {
        const selectedPDFContainer = document.getElementById('selectedPDFContainer');
        const pdfIframe = document.getElementById('pdfIframe');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                pdfIframe.src = URL.createObjectURL(input.files[0]);
            };

            reader.readAsDataURL(input.files[0]);

            // Show the iframe when a PDF is selected
            pdfIframe.style.display = 'block';
        } else {
            // Hide the iframe when no file is selected
            pdfIframe.style.display = 'none';
            pdfIframe.src = ''; // Clear the source to prevent displaying the previous PDF
        }
    }
</script>
@endpush