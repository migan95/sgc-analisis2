<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Sistema Inventario - @yield('title')</title>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="{{ asset('css/style-admin-template.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-admin.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>

</head>
<body class="sb-nav-fixed">

@section('header')
    @if (\Illuminate\Support\Facades\Auth::check())
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <button class="btn btn-link btn-sm order-2 order-lg-0" id="sidebarToggle" style="margin-left: 10px" href="#"><i class="fas fa-bars"></i></button>
        <a class="navbar-brand" href="#">Sistema Inventario</a>
            <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            </div>
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }} <i class="fas fa-user fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item"href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                         </a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
    @endif
    <div id="layoutSidenav">
@show

@section('sidebar')
<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!--
                            <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link" href="/">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            -->
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            @if (\Illuminate\Support\Facades\Auth::user()->role === 1 or \Illuminate\Support\Facades\Auth::user()->role === 2)
                            <a class="nav-link" href="{{ route('productos.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-box-open"></i></div>
                                Productos
                            </a>
                            @endif

                            @if (\Illuminate\Support\Facades\Auth::user()->role === 1 or \Illuminate\Support\Facades\Auth::user()->role === 2)
                                <a class="nav-link" href="buscadorProductos">
                                    <div class="sb-nav-link-icon"><i class="fas fa-globe"></i></div>
                                    Buscar Productos
                                </a>
                            @endif

                            @if (\Illuminate\Support\Facades\Auth::user()->role === 1 or \Illuminate\Support\Facades\Auth::user()->role === 2)
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapclientes" aria-expanded="false" aria-controls="collapclientes">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Clientes
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapclientes" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('clientes.index') }}">Ver Clientes</a>
                                    <a class="nav-link" href="{{ route('clientes.create') }}">Crear Clientes</a>
                                </nav>
                            </div>
                            @endif
                            @if (\Illuminate\Support\Facades\Auth::user()->role === 1)
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                                Usuarios
                            </a>
                            @endif

                            @if (\Illuminate\Support\Facades\Auth::user()->role === 1 or \Illuminate\Support\Facades\Auth::user()->role === 2)
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapcategorias" aria-expanded="false" aria-controls="collapcategorias">
                                    <div class="sb-nav-link-icon"><i class="fas fa-layer-group"></i></div>
                                    Categorias
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapcategorias" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{ route('categorias.index') }}">Ver Categorias</a>
                                        <a class="nav-link" href="{{ route('categorias.create') }}">Crear Categoria</a>
                                    </nav>
                                </div>
                            @endif

                            @if (\Illuminate\Support\Facades\Auth::user()->role === 1 or \Illuminate\Support\Facades\Auth::user()->role === 2)
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapmarcas" aria-expanded="false" aria-controls="collapmarcas">
                                    <div class="sb-nav-link-icon"><i class="fas fa-grip-horizontal"></i></div>
                                    Marcas
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapmarcas" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{ route('marcas.index') }}">Ver Marcas</a>
                                        <a class="nav-link" href="{{ route('marcas.create') }}">Crear Marca</a>
                                    </nav>
                                </div>
                            @endif
                    </div>
                    </div>
                </nav>
            </div>

@show

    <div id="layoutSidenav_content">
        <main>
        @yield('content')
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Analisis de Sistemas II - Grupo I - 2020</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/main-functions.js')}}"></script>
    <script src="{{ asset('js/functions-template.js')}}"></script>
</body>
</html>
