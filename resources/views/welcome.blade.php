<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fontawesome-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- SimpleLightbox plugin CSS-->
    <link href="{{ asset('css/simpleLightbox.min.css') }}" rel="stylesheet" type="text/css">
    <!-- estilos-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">
    <!-- toastr.min.css -->
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <!-- Bootstrap core Jquery.min.js-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    @livewireStyles

</head>
<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#page-top">www.colegiocampo&vida.com</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto my-2 my-lg-0">
                <li class="nav-item"><a class="nav-link" href="/login">Ingresar</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">Niveles</a></li>
                <li class="nav-item"><a class="nav-link" href="#portfolio">Galerias</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Agendar cita</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<header class="masthead">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold">Colegio Ecológico Privado Mixto Campo & Vida</h1>
                <hr class="divider" />
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 mb-5">Formamos los ciudadanos del mañana, con una excelente educación, inculcando valores y  fomentando el cuidado del medio ambiente</p>
                <a class="btn btn-primary btn-xl" href="#about">saber más</a>
            </div>
        </div>
    </div>
</header>
<!-- About-->
<section class="page-section" id="about" style="background: #6AA84F">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mt-0">Visión</h2>
                <hr class="divider divider-light" />
                <p class="text-white-75 mb-4">Start Bootstrap has everything you need to get your new website up and running in no time! Choose one of our open source, free to download, and easy to use themes! No strings attached!</p>
                <a class="btn btn-light btn-xl" href="#services">niveles academicos</a>
            </div>
        </div>
    </div>
</section>
<!-- Services-->
<section class="page-section" id="services">
    <div class="container px-4 px-lg-5">
        <h2 class="text-center mt-0">Niveles estudiantiles</h2>
        <hr class="divider" />
        <div class="row gx-4 gx-lg-5">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="fas fa-fw fa-user-graduate fs-1 text-success" ></i></div>
                    <h3 class="h4 mb-2">Preprimaria</h3>
                    <p class="text-muted mb-0">Our themes are updated regularly to keep them bug free!</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="fas fa-fw fa-user-graduate fs-1 text-success"></i></div>
                    <h3 class="h4 mb-2">Primaria</h3>
                    <p class="text-muted mb-0">All dependencies are kept current to keep things fresh.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="fas fa-fw fa-user-graduate fs-1 text-success"></i></div>
                    <h3 class="h4 mb-2">Básico</h3>
                    <p class="text-muted mb-0">You can use this design as is, or you can make changes!</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="mt-5">
                    <div class="mb-2"><i class="fas fa-fw fa-user-graduate fs-1 text-success"></i></div>
                    <h3 class="h4 mb-2">Diversificado</h3>
                    <p class="text-muted mb-0">Is it really open source if it's not made with love?</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Portfolio y cita-->
@yield('content')
<!-- Footer-->
<footer class="bg-light py-5">
    <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2021 - Company Name</div></div>
</footer>
@livewireScripts
<!-- toastr.min.js -->
<script src="{{ asset('js/toastr.min.js') }}"></script>
<!-- Bootstrap core JS-->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<!-- SimpleLightbox plugin JS-->
<script src="{{ asset('js/simpleLightbox.min.js') }}"></script>
<!-- Core theme JS-->
<script src="{{ asset('js/scripts.js') }}"></script>

<script src="{{ asset('js/sb-forms-0.4.1.js') }}"></script>
<script>
    window.addEventListener('alert',event =>{
        toastr.success(event.detail.message)
    })
</script>
</body>
</html>
