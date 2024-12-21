@extends('layouts.websiteapp')
@section('website-main-content')
<div class="container">




    <div class="row justify-content-center">
        <!-- Check for success message -->
        @if (Session::has('success'))
        <div id="success-alert" class="alert alert-success" style="display: none;width:60%; float:right;margin:10px;">
            {{ Session::get('success') }}
        </div>
        @endif

        @if (Session::has('error'))
        <div id="error-alert" class="alert alert-danger" style="display: none; width:60%; float:right;margin:10px;">
            {{ Session::get('error') }}
        </div>
        @endif
        <div class="col-md-9 enquiry-table-center">
            <!-- JavaScript will conditionally render the form or the empty list message here -->
        </div>
    </div>
</div>
@endsection
@push('script-addon')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Retrieve selected products from local storage
        const selectedProducts = JSON.parse(localStorage.getItem('selectedProducts'));

        // Get the container element where you want to conditionally render the form
        const formContainer = document.querySelector('.enquiry-table-center');

        // Check if selectedProducts is not null
        if (selectedProducts !== null && selectedProducts.length > 0) {
            // Render the form
            formContainer.innerHTML = `
                <h1>Request A Quote</h1>
                <!-- Form for quotation -->
                <form id="quotation-form" action="{{ route('quotation.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Hidden input field for selected products array -->
                    <input type="hidden" name="selected_products" id="selected_products_input">

                    <!-- Table of selected products -->
                    <table class="table table-bordered enquiry-table my-5">
                        <thead class="table-light">
                            <tr>
                                <th colspan="3" class="">Product</th>
                            </tr>
                        </thead>
                        <tbody id="quote-table-body" class="quote-text">
                            <!-- Existing table rows -->
                        </tbody>
                    </table>

                    <!-- Form fields -->
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                        <div class="col-md-11">
                            <div class="mb-3 quote-form">
                                <label for="" class="form-label">First Name <span>*</span></label>
                                <input type="text" name="first_name" class="form-control" id="" required>
                            </div>
                            <div class="mb-3 quote-form">
                                <label for="" class="form-label">Last Name (optional)</label>
                                <input type="text" name="last_name" class="form-control" id="">
                            </div>
                            <div class="mb-3 quote-form">
                                <label for="" class="form-label">Company Name (optional) </label>
                                <input type="text" name="company_name" class="form-control" id="">
                            </div>
                            <div class="mb-3 quote-form">
                                <label for="" class="form-label">Phone <span>*</span></label>
                                <input type="number" name="phone" class="form-control" id="" required>
                            </div>
                            <div class="mb-3 quote-form">
                                <label for="" class="form-label">Email <span>*</span></label>
                                <input type="email" name="email" class="form-control" id="" required>
                            </div>
                            <div class="quote-form">
                                <label for="" class="form-label">Message (optional)</label>
                                <textarea name="message" class="form-control" id="" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <div class="d-flex justify-content-center quote-form-button">
                        <button type="submit" class="btn">SEND YOUR REQUEST</button>
                    </div>
                </form>
            `;

            // Set the value of the hidden input field with the JSON representation of selectedProducts
            document.getElementById('selected_products_input').value = JSON.stringify(selectedProducts);

            // Get the table body element
            const tableBody = document.getElementById('quote-table-body');

            // Loop through the selected products array
            selectedProducts.forEach(function(selectedProduct, index) {
                // Create a new table row for each product
                const newRow = document.createElement('tr');

                // Set the inner HTML of the new row with the selected product data
                newRow.innerHTML = `
                    <td class="text-center">
                        <img src="${selectedProduct.image}" alt="" class="request-quote-image">
                    </td>
                    <td class="align-middle" style="vertical-align: middle;"><p style="font-size:15px">${selectedProduct.name}</p></td>
                    <td class="text-center align-middle" style="vertical-align: middle;">
                        <button class="btn btn-sm remove-btn" onclick="removeProduct(event, ${index})">
                            <i class="fa-regular fa-circle-xmark"></i>
                        </button>
                    </td>
                `;

                // Append the new row to the table body
                tableBody.appendChild(newRow);
            });
        } else {
            // Render the empty list message
            formContainer.innerHTML = `
                <h1>Request A Quote</h1>
                <div id="empty-list-message">
                    <p>Your list is empty, add products to the list to send a request</p>
                    <a href="{{ url('/') }}" class="btn">Return to shop</a>
                </div>
            `;
        }
    });

    // Function to remove the product from local storage and refresh the page
    function removeProduct(event, index) {
        // Retrieve selected products array from local storage
        let selectedProducts = JSON.parse(localStorage.getItem('selectedProducts'));

        // Remove the product at the specified index
        selectedProducts.splice(index, 1);

        // Update the local storage with the modified array
        localStorage.setItem('selectedProducts', JSON.stringify(selectedProducts));

        // Get the table row containing the remove button
        const row = event.target.closest('tr');

        // Remove the table row from the DOM
        row.remove();

        // Refresh the page
        location.reload();
    }
</script>




<script>
    var successMessage = "{{ Session::get('success') }}";
    var errorMessage = "{{ Session::get('error') }}";

    document.addEventListener('DOMContentLoaded', function() {
        // Log success message
        if (successMessage) {
            console.log("Success message: " + successMessage);
            $('#success-alert').fadeIn('fast');
            // Automatically close the success alert after 5 seconds
            setTimeout(function() {
                $('#success-alert').fadeOut('fast');
            }, 5000);
        }

        // Log error message
        if (errorMessage) {
            console.log("Error message: " + errorMessage);
            $('#error-alert').fadeIn('fast');
            // Automatically close the error alert after 5 seconds
            setTimeout(function() {
                $('#error-alert').fadeOut('fast');
            }, 5000);
        }
    });
</script>
@endpush