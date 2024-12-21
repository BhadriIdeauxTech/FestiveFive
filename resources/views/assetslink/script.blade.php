<script src="{{ url('assets/modules/jquery.min.js') }}"></script>
<script src="{{ url('assets/modules/popper.js') }}"></script>
<script src="{{ url('assets/modules/tooltip.js') }}"></script>
<script src="{{ url('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ url('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ url('assets/modules/moment.min.js') }}"></script>
<script src="{{ url('assets/js/stisla.js') }}"></script>

<!-- JS Libraies -->
<script src="{{ url('assets/modules/jquery.sparkline.min.js') }}"></script>
<script src="{{ url('assets/modules/chart.min.js') }}"></script>
<script src="{{ url('assets/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
<script src="{{ url('assets/modules/summernote/summernote-bs4.js') }}"></script>
<script src="{{ url('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

<script src="{{ url('assets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ url('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ url('assets/js/page/index.js') }}"></script>
<script src="{{ url('assets/js/page/modules-datatables.js') }}"></script>
<!-- Template JS File -->
<script src="{{ url('assets/js/scripts.js') }}"></script>
<script src="{{ url('assets/js/custom.js') }}"></script>
<script>
    //    message
    document.addEventListener('DOMContentLoaded', function() {
        const popup = document.getElementById('popup-message');

        if (popup) {
            popup.classList.add('active');
            setTimeout(function() {
                popup.classList.remove('active');
            }, 3000); // Adjust the duration (milliseconds) as needed
        }
    });

    // error
    document.addEventListener('DOMContentLoaded', function() {
        const errorPopup = document.getElementById('error-popup');

        if (errorPopup) {
            errorPopup.classList.add('active');
            setTimeout(function() {
                errorPopup.classList.remove('active');
            }, 5000); // Adjust the duration (milliseconds) as needed
        }
    });
</script>
@stack('other-scripts')