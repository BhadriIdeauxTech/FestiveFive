<link rel="stylesheet" href="{{ url('assets/modules/bootstrap/css/bootstrap.min.css') }}">
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=MC+Mikola&display=swap"> -->
<link href="https://fonts.googleapis.com/css2?family=Macaron:wght@400&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{ url('assets/modules/fontawesome/css/all.min.css') }}">

<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ url('ssets/modules/jqvmap/dist/jqvmap.min.css') }}a">
<link rel="stylesheet" href="{{ url('assets/modules/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ url('assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ url('assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">

<link rel="stylesheet" href="{{ url('assets/modules/datatables/datatables.min.css') }}">
<link rel="stylesheet"
    href="{{ url('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ url('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
<!-- Template CSS -->
<link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
<link rel="stylesheet" href="{{ url('assets/css/components.css') }}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
</script>


<style>
    /* message failed*/
    .popup-message {
        position: fixed;
        top: 20px;
        right: -400px;
        /* Initially off screen */
        width: 300px;
        padding: 15px;
        background-color: rgb(253, 0, 9);
        color: #fff;
        border-radius: 10px;
        font-size: 16px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        transform: translateY(50%);
        transition: right 0.5s ease-in-out;
        z-index: 9999;
    }

    .popup-message.active {
        right: 20px;
        /* Slide in from the right */
    }

    /* message success*/
    .popup-mess {
        position: fixed;
        top: 20px;
        right: -400px;
        /* Initially off screen */
        width: 300px;
        padding: 15px;
        background-color: rgb(71, 166, 189);
        color: #fff;
        border-radius: 10px;
        font-size: 16px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        transform: translateY(50%);
        transition: right 0.5s ease-in-out;
        z-index: 9999;
    }

    .popup-mess.active {
        right: 20px;
        /* Slide in from the right */
    }

    /* error */
    .error-popup {
        position: fixed;
        top: 20px;
        right: -400px;
        /* Initially off screen */
        width: 300px;
        padding: 15px;
        background-color: rgb(253, 0, 9);
        color: #fff;
        border-radius: 10px;
        font-size: 16px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        transform: translateY(50%);
        transition: right 0.5s ease-in-out;
        z-index: 9999;
    }

    .error-popup.active {
        right: 20px;
        /* Slide in from the right */
    }

   
</style>
