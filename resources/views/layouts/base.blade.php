
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
<body id="page-top" >

<!-- Page Wrapper -->
<div id="wrapper">

@include('layouts.navbar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column" style="background-image:url({{asset("/img/fondo.png")}})">
        <!-- Main Content -->
        <div id="content" >
        @include('layouts.navbar2')
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Contenido -->
                @yield('content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
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

    window.addEventListener('alertcalificar',event =>{
        toastr.success(event.detail.message)
        var obj=document.getElementById('cerrarcalificar');
        obj.click();
    })

    window.addEventListener('alert2',event =>{
        toastr.info(event.detail.message)
        var obj=document.getElementById('cerrar');
        obj.click();
    })

    window.addEventListener('alertze',event =>{
        toastr.info(event.detail.message)
        var obj=document.getElementById('cerrarze');
        obj.click();
    })

    window.addEventListener('alert3',event =>{
        toastr.error(event.detail.message)
    })
    window.addEventListener('alert4',event =>{
        toastr.error(event.detail.message)
    })

    window.addEventListener('alerteditpadre',event =>{
        toastr.info(event.detail.message)
        var obj=document.getElementById('cerrarpadre');
        obj.click();
    })

    window.addEventListener('alerteditasignar',event =>{
        toastr.info(event.detail.message)
        var obj=document.getElementById('cerrarasignar');
        obj.click();
    })

    window.addEventListener('alertasignar',event =>{
        toastr.success(event.detail.message)
        var obj=document.getElementById('cerrarformasignar');
        obj.click();
    })
    window.addEventListener('alerteditasignar2',event =>{
        toastr.success(event.detail.message)
        var obj=document.getElementById('cerrarasignar2');
        obj.click();
    })
    window.addEventListener('alertasignar2',event =>{
        toastr.success(event.detail.message)
        var obj=document.getElementById('cerrarformasignar2');
        obj.click();
    })

    // alertas de pedido
    window.addEventListener('alertp',event =>{
        toastr.success(event.detail.message)
        var obj=document.getElementById('cerrardetalle');
        obj.click();
    })

    // alertas de pedido
    window.addEventListener('alertpp',event =>{
        toastr.success(event.detail.message)
        var obj=document.getElementById('addproducto');
        obj.click();
    })
    window.addEventListener('alertpu',event =>{
        toastr.success(event.detail.message)
        var obj=document.getElementById('cerrareditproducto');
        obj.click();
    })

    window.addEventListener('alertpedido',event =>{
        toastr.success(event.detail.message)
        var obj=document.getElementById('cerrarpedido');
        obj.click();
    })

    window.addEventListener('alerteliminar',event =>{
        toastr.error(event.detail.message)
        var obj=document.getElementById('verpedido');
        obj.click();
    })

    window.addEventListener('alerteliminar2',event =>{
        toastr.error(event.detail.message)
        var obj=document.getElementById('cerrar');
        obj.click();
    })

    window.addEventListener('alertpago',event =>{
        toastr.success(event.detail.message)
        var obj=document.getElementById('pagocerrar');
        obj.click();
    })

    //
</script>

<!-- redireccionar login -->
@if(session('rol')=='')

    <script>
        var pathname = window.location.pathname;
        if(pathname!='/login'){
            toastr.error("Error de credenciales")
            window.location.replace("/login");
        }
    </script>
@endif

</body>

</html>

