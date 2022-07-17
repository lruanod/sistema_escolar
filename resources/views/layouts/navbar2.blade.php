
<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                 aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                               placeholder="Search for..." aria-label="Search"
                               aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="/mostraranuncios"  role="button">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter"></span>
            </a>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    @if(session('ausuario'))
                        <div class="sidebar-brand-text mx-3">{{session('ausuario')}}</div>
                    @endif
                    @if(session('eusuario'))
                        <div class="sidebar-brand-text mx-3">{{session('eusuario')}}</div>
                    @endif
                    @if(session('musuario'))
                        <div class="sidebar-brand-text mx-3">{{session('musuario')}} </div>
                    @endif
                    @if(session('pusuario'))
                        <div class="sidebar-brand-text mx-3">{{session('pusuario')}} </div>
                    @endif
                </span>
                <img class="img-profile rounded-circle"
                     src="{{asset("storage/".session('url'))}}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/actualizarpass">
                    <i class="fas fa-save fa-sm fa-fw mr-2 text-gray-400"></i>
                    Actualizar contraseña
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/fotos"  >
                    <i class="fas fa-image fa-sm fa-fw mr-2 text-gray-400"></i>
                    Actualizar foto
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/login" >
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Cerrar sessión
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->
