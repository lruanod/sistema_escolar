
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fontawesome-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet" type="text/css">
    <!-- toastr.min.css -->
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <!-- Bootstrap core Jquery.min.js-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap core JS-->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    @livewireStyles
</head>

<body class="bg-gradient-success">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">
            @yield('content')
        </div>

    </div>

</div>


@livewireScripts

<!-- toastr.min.js -->
<script src="{{ asset('js/toastr.min.js') }}"></script>
<!-- popper.min.js -->
<script src="{{ asset('js/popper.min.js') }}"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>


<script>
    window.addEventListener('alert',event =>{
        toastr.success(event.detail.message)
    })

    window.addEventListener('alert2',event =>{
        toastr.info(event.detail.message)
        var obj=document.getElementById('cerrar');
        obj.click();
    })

    window.addEventListener('alert3',event =>{
        toastr.error(event.detail.message)
    })
</script>

</body>

</html>

