<!-- Sidebar -->
<ul class="navbar-nav  bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar" >

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center m-md-3">
            <img class="img-profile"
                 src="{{asset("storage/".session('url'))}}" width="80vw" height="90vh">

        @if(session('ausuario'))
        <div class="sidebar-brand-text mx-3">{{session('ausuario')}} <sup>{{session('rol')}}</sup></div>
        @endif
        @if(session('eusuario'))
            <div class="sidebar-brand-text mx-3">{{session('eusuario')}} <sup>{{session('rol')}}</sup></div>
        @endif
        @if(session('musuario'))
            <div class="sidebar-brand-text mx-3">{{session('musuario')}} <sup>{{session('rol')}}</sup></div>
        @endif
        @if(session('pusuario'))
            <div class="sidebar-brand-text mx-3">{{session('pusuario')}} <sup>{{session('rol')}}</sup></div>
        @endif
    </a>


    <!-- Divider -->


    <!-- Heading -->
    <div class="sidebar-heading mt-3">
        Interfas&nbsp;{{session('rol')}}
    </div>
    <!-- Divider -->
    <hr class="sidebar-divider mt-2">

@if(session('rol')=='Administrador')
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
           aria-controls="collapsePages">
            <i class="fas fa-fw fa-user-graduate"></i>
            <span>Estudiantes</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Estudiantes:</h6>
                <a class="collapse-item" href="/estudiantes">Registro de estudiantes</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePagesnivel" aria-expanded="true"
           aria-controls="collapsePagesnivel">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Grados</span>
        </a>
        <div id="collapsePagesnivel" class="collapse" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Niveles académicos:</h6>
                <a class="collapse-item" href="/nivels">Registro de niveles</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Grados:</h6>
                <a class="collapse-item" href="/grados">Registro de Grados</a>
                <h6 class="collapse-header">Ciclos escolares:</h6>
                <a class="collapse-item" href="/ciclos">Registro de ciclos</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePagescurso" aria-expanded="true"
           aria-controls="collapsePagescurso">
            <i class="fas fa-fw fa-book"></i>
            <span>Cursos/Materias</span>
        </a>
        <div id="collapsePagescurso" class="collapse" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Cursos/Materias:</h6>
                <a class="collapse-item" href="/cursos">Registro de cursos/materias</a>
                <div class="collapse-divider"></div>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePagesmen" aria-expanded="true"
           aria-controls="collapsePagesmen">
            <i class="fas fa-fw fa-money-check-alt"></i>
            <span>Costos/Mensualidades</span>
        </a>
        <div id="collapsePagesmen" class="collapse" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Mensualidades:</h6>
                <a class="collapse-item" href="/grados">Registro de mensualidades</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Pagos:</h6>
                <a class="collapse-item" href="/cuotas">Registro de pagos</a>
                <h6 class="collapse-header">Reportes:</h6>
                <a class="collapse-item" href="/reportecuotas">Reporte de pagos</a>
            </div>
        </div>
    </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePagescit" aria-expanded="true"
               aria-controls="collapsePagescit">
                <i class="fas fa-fw fa-money-check-alt"></i>
                <span>Citas</span>
            </a>
            <div id="collapsePagescit" class="collapse" aria-labelledby="headingPages"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Citas:</h6>
                    <a class="collapse-item" href="/citas">Registro de citas</a>
                </div>
            </div>
        </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePagesmae" aria-expanded="true"
           aria-controls="collapsePagesmae">
            <i class="fas fa-fw fa-graduation-cap"></i>
            <span>Maestros</span>
        </a>
        <div id="collapsePagesmae" class="collapse" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Maestros:</h6>
                <a class="collapse-item" href="/maestros">Registro de maestro</a>
                <div class="collapse-divider"></div>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePagesanu" aria-expanded="true"
           aria-controls="collapsePagesanu">
            <i class="fas fa-fw fa-bullhorn"></i>
            <span>Administración</span>
        </a>
        <div id="collapsePagesanu" class="collapse" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Anuncios:</h6>
                <a class="collapse-item" href="/anuncios">Registro de anuncios</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Galerias:</h6>
                <a class="collapse-item" href="/galerias">Registro de galerias</a>
            </div>
        </div>
    </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePagesventa" aria-expanded="true"
               aria-controls="collapsePagesventa">
                <i class="fas fa-fw fa-store"></i>
                <span>Tienda</span>
            </a>
            <div id="collapsePagesventa" class="collapse" aria-labelledby="headingPages"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Categorias:</h6>
                    <a class="collapse-item" href="/categorias">Registro de categorias</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Productos:</h6>
                    <a class="collapse-item" href="/productos">Registro de productos</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Ventas:</h6>
                    <a class="collapse-item" href="/ventas">Registro de ventas</a>
                    <a class="collapse-item" href="/eventas">Editar ventas</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Entradas:</h6>
                    <a class="collapse-item" href="/entradas">Registro de entradas <br> a almacén</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Repotes:</h6>
                    <a class="collapse-item" href="/reportes">Reporte de Ventas</a>
                    <a class="collapse-item" href="/reportestocks">Reporte de entradas de almacen <br></a>
                    <a class="collapse-item" href="/rstocks">Reporte de stock <br></a>
                </div>
            </div>
        </li>
@endif
@if(session('rol')=='Maestro')
    <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePagesact" aria-expanded="true"
               aria-controls="collapsePagesact">
                <i class="fas fa-fw fa-bullhorn"></i>
                <span>Actvididades</span>
            </a>
            <div id="collapsePagesact" class="collapse" aria-labelledby="headingPages"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Actividades:</h6>
                    <a class="collapse-item" href="/actividades">Registro de actividades</a>
                    <div class="collapse-divider"></div>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePageszo" aria-expanded="true"
               aria-controls="collapsePageszo">
                <i class="fas fa-fw fa-bullhorn"></i>
                <span>Zona</span>
            </a>
            <div id="collapsePageszo" class="collapse" aria-labelledby="headingPages"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Zona/calificaciones:</h6>
                    <a class="collapse-item" href="/zonas">Estudiantes/zonas</a>
                    <div class="collapse-divider"></div>
                </div>
            </div>
        </li>

@endif
@if(session('rol')=='Estudiante')
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePagesacte" aria-expanded="true"
               aria-controls="collapsePagesacte">
                <i class="fas fa-fw fa-bullhorn"></i>
                <span>Actvididades</span>
            </a>
            <div id="collapsePagesacte" class="collapse" aria-labelledby="headingPages"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Actividades:</h6>
                    <a class="collapse-item" href="/eactividades">Actividades</a>
                    <div class="collapse-divider"></div>
                </div>
            </div>
        </li>

        @if(!empty(session('solvente')))
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePageszoe" aria-expanded="true"
               aria-controls="collapsePageszoe">
                <i class="fas fa-notes-medical fa-bullhorn"></i>
                <span>Zona</span>
            </a>
            <div id="collapsePageszoe" class="collapse" aria-labelledby="headingPages"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Zona/calificaciones:</h6>
                    <a class="collapse-item" href="/zonase">Estudiantes/zonas</a>
                    <div class="collapse-divider"></div>
                </div>
            </div>
        </li>
        @endif
@endif

    @if(session('rol')=='Padre')
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePagesactp" aria-expanded="true"
               aria-controls="collapsePagesactp">
                <i class="fas fa-fw fa-bullhorn"></i>
                <span>Actvididades</span>
            </a>
            <div id="collapsePagesactp" class="collapse" aria-labelledby="headingPages"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Actividades:</h6>
                    <a class="collapse-item" href="/pactividades">Actividades</a>
                    <div class="collapse-divider"></div>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePageszop" aria-expanded="true"
               aria-controls="collapsePageszop">
                <i class="fas fa-notes-medical fa-bullhorn"></i>
                <span>Zona</span>
            </a>
            <div id="collapsePageszop" class="collapse" aria-labelledby="headingPages"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Zona/calificaciones:</h6>
                    <a class="collapse-item" href="/zonasp">Estudiantes/zonas</a>
                    <div class="collapse-divider"></div>
                </div>
            </div>
        </li>
    @endif

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePagesexit" aria-expanded="true"
           aria-controls="collapsePagesexit">
            <i class="fas fa-sign-out-alt fa-bullhorn"></i>
            @if(session('ausuario'))
                <span>Usuario {{session('ausuario')}}</span>
            @endif
            @if(session('eusuario'))
                <span>Usuario {{session('eusuario')}}</span>
            @endif
            @if(session('musuario'))
                <span>Usuario {{session('musuario')}}</span>
            @endif
            @if(session('pusuario'))
                <span>Usuario {{session('pusuario')}}</span>
            @endif

        </a>
        <div id="collapsePagesexit" class="collapse" aria-labelledby="headingPages"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">cerrar sesión:</h6>
                <a class="collapse-item" href="/login">cerrar</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Actualizar contraseña:</h6>
                <a class="collapse-item" href="/actualizarpass">Cambiar contraseña</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Actualizar foto de perfil:</h6>
                <a class="collapse-item" href="/fotos">Cambiar foto</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
