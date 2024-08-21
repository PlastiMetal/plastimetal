<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PlastiMetal | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/laravel/SisVtaPlastiMetalLV10/public/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="/laravel/SisVtaPlastiMetalLV10/public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet"
        href="/laravel/SisVtaPlastiMetalLV10/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/laravel/SisVtaPlastiMetalLV10/public/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/laravel/SisVtaPlastiMetalLV10/public/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/laravel/SisVtaPlastiMetalLV10/public/dist/css/bootstrap-select.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="/laravel/SisVtaPlastiMetalLV10/public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/laravel/SisVtaPlastiMetalLV10/public/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/laravel/SisVtaPlastiMetalLV10/public/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="/laravel/SisVtaPlastiMetalLV10/resources/css/styles.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/PlastiMetalLogo.png" alt="PlastiMetal" height="60"
                width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a href="https://www.facebook.com/profile.php?id=61551605955420&mibextid=ZbWKwL" class="nav-link"
                        target="_blank">
                        <i class="fab fa-whatsapp" style="color: #2ac74c; font-size: 24px;"></i>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="https://www.facebook.com/profile.php?id=61551605955420&mibextid=ZbWKwL" class="nav-link"
                        target="_blank">
                        <i class="fab fa-facebook" style="color: #3b5998; font-size: 24px;"></i>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="https://www.facebook.com/profile.php?id=61551605955420&mibextid=ZbWKwL" class="nav-link"
                        target="_blank">
                        <i class="fab fa-instagram" style="color: #e73e0a; font-size: 24px;"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="https://www.facebook.com/profile.php?id=61551605955420&mibextid=ZbWKwL" class="nav-link"
                        target="_blank">
                        <i class="fab fa-tiktok" style="color: #000000; font-size: 24px;"></i>
                    </a>
                </li>

                <li class="nav-item">

                    <a href="{{ route('logout') }}" class="btn btn-primary"
                        onclick="event.preventDefault(); if(confirm('¿Estás seguro de que quieres cerrar sesión?')) { document.getElementById('logout-form').submit(); }">
                        Cerrar Sesión
                    </a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link">
                <span class="brand-text font-weight-light">Plasti Metal</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">

                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item:hover">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cubes"></i>
                                <p>
                                    Almacen
                                    <i class="fas fa-angle-left" rigth></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('producto.index') }}" class="nav-link">
                                        <i class="fas fa-box"></i>
                                        <p>Productos</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('categoria.index') }}" class="nav-link">
                                        <i class="fas fa-tags"></i>
                                        <p>Categorias</p>
                                    </a>
                                </li>
                            </ul>

                        <li class="nav-item.active">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>
                                    Compras
                                    <i class="fas fa-angle-left" rigth></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('ingresos.index') }}" class="nav-link">
                                        <i class="fas fa-truck-loading"></i>
                                        <p>Ingresos</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('proveedores.index') }}" class="nav-link">
                                        <i class="fas fa-user-tie"></i>
                                        <p>Proveedores</p>
                                    </a>
                                </li>
                            </ul>

                        <li class="nav-item.active">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-receipt"></i>
                                <p>
                                    Ventas
                                    <i class="fas fa-angle-left" rigth></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('clientes.index') }}" class="nav-link">
                                        <i class="fas fa-user"></i>
                                        <p>Clientes</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('ventas.index') }}" class="nav-link">
                                        <i class="fas fa-cash-register"></i>
                                        <p>Ventas</p>
                                    </a>
                                </li>

                            </ul>

                        <li class="nav-item.active">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-shield"></i>
                                <p>
                                    Seguridad
                                    <i class="fas fa-angle-left" rigth></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('usuarios.index') }}" class="nav-link">
                                        <i class="fas fa-users"></i>
                                        <p>Usuarios</p>
                                    </a>
                                </li>
                                <!--<ul class="nav-item">
                                    <a href="{{ route('asignar.index') }}" class="nav-link">
                                        <i class="fas fa-lock"></i>
                                        <p>Asignaciones</p>
                                    </a>
                                </ul>-->
                                <ul class="nav-item">
                                    <a href="{{ route('roles.index') }}" class="nav-link">
                                        <i class="fas fa-lock"></i>
                                        <p>Roles</p>
                                    </a>
                                </ul>

                                <ul class="nav-item">
                                    <a href="{{ route('permisos.index') }}" class="nav-link">
                                        <i class="fas fa-lock"></i>
                                        <p>Permisos</p>
                                    </a>
                                </ul>

                            </ul>

                        <li class="nav-item.active">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-bar"></i>
                                <p>
                                    Reportería
                                    <i class="fas fa-angle-left" rigth></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('reportes.ventas_diarias') }}" class="nav-link">
                                        <i class="fas fa-calendar-day"></i>
                                        <p>Ventas x Día</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('reportes.productos_vendidos') }}" class="nav-link">
                                        <i class="fas fa-tag"></i>
                                        <p>Ventas x Producto</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('reportes.ventas_por_cliente') }}" class="nav-link">
                                        <i class="fas fa-users"></i>
                                        <p>Ventas x Cliente</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('reportes.facturas_por_cliente') }}" class="nav-link">
                                        <i class="fas fa-file-invoice"></i>
                                        <p>Facturas x Cliente</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('reportes.facturas_por_producto') }}" class="nav-link">
                                        <i class="fas fa-file-invoice"></i>
                                        <p>Facturas x Producto</p>
                                    </a>
                                </li>
                            </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('contenido')
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2024-2025 <a
                    href="https://www.facebook.com/profile.php?id=61551605955420&mibextid=ZbWKwL">Plasti
                    Metal</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/laravel/SisVtaPlastiMetalLV10/public/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/laravel/SisVtaPlastiMetalLV10/public/plugins/jquery-ui/jquery-ui.min.js"></script>
    @stack('scripts')
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="/laravel/SisVtaPlastiMetalLV10/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/laravel/SisVtaPlastiMetalLV10/public/dist/js/bootstrap-select.min.js"></script>
    <!-- ChartJS
        -->
    <script src="/laravel/SisVtaPlastiMetalLV10/public/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="/laravel/SisVtaPlastiMetalLV10/public/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="/laravel/SisVtaPlastiMetalLV10/public/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/laravel/SisVtaPlastiMetalLV10/public/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/laravel/SisVtaPlastiMetalLV10/public/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="/laravel/SisVtaPlastiMetalLV10/public/plugins/moment/moment.min.js"></script>
    <script src="/laravel/SisVtaPlastiMetalLV10/public/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script
        src="/laravel/SisVtaPlastiMetalLV10/public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <!-- Summernote -->
    <script src="/laravel/SisVtaPlastiMetalLV10/public/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/laravel/SisVtaPlastiMetalLV10/public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js">
    </script>
    <!-- PLASTIEMETAL -->
    <script src="/laravel/SisVtaPlastiMetalLV10/public/dist/js/adminlte.js"></script>
    <!-- PLASTIMETAL-->
    <!-- <script src="/laravel/SisVtaPlastiMetalLV10/public/dist/js/demo.js"></script>-->
    <!-- PALSTIMETAL -->
    <script src="/laravel/SisVtaPlastiMetalLV10/public/dist/js/pages/dashboard.js"></script>
</body>

</html>
