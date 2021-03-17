<!-- appDashboard -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="{{ asset('landing/assets/favicon.png') }}"/>

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{ asset('intranet/assets/css/bootstrap.min.css') }} " />
    <link rel="stylesheet" href="{{ asset('intranet/assets/font-awesome/4.5.0/css/font-awesome.min.css') }} " />

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="{{ asset('toast/jquery.toast.min.css') }}">
    @yield('styles')

<!-- text fonts -->
    <link rel="stylesheet" href="{{ asset('intranet/assets/css/fonts.googleapis.com.css') }} " />

    <!-- ace styles -->
    <link rel="stylesheet" href="{{ asset('intranet/assets/css/ace.min.css') }} " class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ asset('intranet/assets/css/ace-part2.min.css') }} " class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('intranet/assets/css/ace-skins.min.css') }} " />
    <link rel="stylesheet" href="{{ asset('intranet/assets/css/ace-rtl.min.css') }} " />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="{{ asset('intranet/assets/css/ace-ie.min.css') }} " />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="{{ asset('intranet/assets/js/ace-extra.min.js') }} "></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="{{ asset('intranet/assets/js/html5shiv.min.js') }} "></script>
    <script src="{{ asset('intranet/assets/js/respond.min.js') }} "></script>
    <![endif]-->
</head>

<body class="no-skin">
<div id="navbar" class="navbar navbar-default ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="{{ url('/') }}" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    Unistore
                </small>
            </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <li class="green dropdown-modal">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
                        <span class="badge badge-success">5</span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-footer">
                            <a href="inbox.html">
                                See all messages
                                <i class="ace-icon fa fa-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="light-blue dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="{{ asset('intranet/assets/images/avatars/user.jpg')}}" alt="Jason's Photo" />
                        <span class="user-info">
                            <small>Bienvenido,</small>
                            {{ Auth::user()->name }}
                        </span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="#">
                                <i class="ace-icon fa fa-cog"></i>
                                Settings
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                                <i class="ace-icon fa fa-power-off"></i>
                                Cerrar sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.navbar-container -->
</div>

<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
    </script>

    <div id="sidebar" class="sidebar responsive ace-save-state">
        <script type="text/javascript">
            try{ace.settings.loadState('sidebar')}catch(e){}
        </script>

        <ul class="nav nav-list">
            <li class="">
                <a href="{{ route('home') }}">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text"> Dashboard </span>
                </a>

                <b class="arrow"></b>
            </li>

            {{-- Administrador --}}
            @can('create_store')
            <li class=" @yield('openModShop') ">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-archive"></i>
                    <span class="menu-text">
                        M. Tiendas
                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">

                    <li class=" @yield('activeListShop') ">
                        <a href="{{ route('shop.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Listar Tiendas
                        </a>

                        <b class="arrow"></b>

                    </li>

                    <li class=" @yield('activeCreateShop') ">
                        <a href="{{ route('shop.create') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Crear Tienda
                        </a>

                        <b class="arrow"></b>
                    </li>
                    @can('restore_store')
                    <li class=" @yield('activeRestoreShop') ">
                        <a href="{{ route('shop.trashed') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Restaurar Tiendas
                        </a>

                        <b class="arrow"></b>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            <li class=" @yield('openModCategory') ">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-cart-plus"></i>
                    <span class="menu-text">
                        M. Categorías
                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">

                    <li class=" @yield('activeListCategory') ">
                        <a href="{{ route('category.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Listar categorías
                        </a>

                        <b class="arrow"></b>

                    </li>

                    <li class=" @yield('activeRestoreCategory') ">
                        <a href="#">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Restaurar Categorías
                        </a>

                        <b class="arrow"></b>
                    </li>

                </ul>
            </li>

            @can('view_payments')
            <li class=" @yield('openModCategory') ">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-credit-card"></i>
                    <span class="menu-text">
                        M. Pagos
                    </span>
                    <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                    <li class=" @yield('activeListCategory') ">
                        <a href="{{ route('payment.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Listar Pagos
                        </a>
                        <b class="arrow"></b>
                    </li>

                </ul>
            </li>
            @endcan
            @can('view_shipping')
            <li class=" @yield('openModMethodShip') ">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-truck"></i> 
                    <span class="menu-text">
                        M. Envios
                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">

                    <li class=" @yield('activeListMethodShip') ">
                        <a href="{{ route('method_ship.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Listar Envios
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li class=" @yield('activeRestoreMethodShip') ">
                        <a href="#">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Restaurar Envios
                        </a>
                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
            @endcan
            @can('create_store')
                <li class=" @yield('openModProduct') ">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-shopping-basket"></i>
                        <span class="menu-text">
                        M. Productos
                    </span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">

                        <li class=" @yield('activeListProduct') ">
                            <a href="{{ route('product.index') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Listar Productos
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class=" @yield('activeCreateProduct') ">
                            <a href="{{ route('product.create') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Crear Producto
                            </a>

                            <b class="arrow"></b>
                        </li>

                    </ul>
                </li>
            @endcan
            @can('access_permission')
            <li class=" @yield('openModAccess') ">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-users"></i>
                    <span class="menu-text">
                        M. Accesos
                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">

                    <li class=" @yield('activeListPermission') ">
                        <a href="{{ route('permission.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Permisos

                        </a>

                        <b class="arrow"></b>

                    </li>

                    <li class=" @yield('activeListRoles') ">
                        <a href="{{ route('role.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Roles
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class=" @yield('activeListUsers') ">
                        <a href="{{ route('user.index') }}">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Usuarios
                        </a>

                        <b class="arrow"></b>
                    </li>

                </ul>
            </li>
            @endcan
            <li class=" @yield('activeMod') ">
                <a href="{{ route('middleware.check') }}">
                    <i class="menu-icon fa fa-file-pdf-o"></i>
                    <span class="menu-text">
                        Nuevo
                    </span>
                </a>
            </li>


        </ul><!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
    </div>

    <div class="main-content">
        <div class="main-content-inner">
            @yield('breadcrumbs')

            <div class="page-content">
                <div class="row">
                    <div id="app" class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        @yield('content')
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

    <div class="footer">
        <div class="footer-inner">
            <div class="footer-content">
                <span class="bigger-120">
                    <span class="blue bolder">Unistore</span>
                    Application &copy; 2021
                </span>

                &nbsp; &nbsp;
                <span class="action-buttons">
                    <a href="#">
                        <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                    </a>

                    <a href="#">
                        <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
                    </a>

                    <a href="#">
                        <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
                    </a>
                </span>
            </div>
        </div>
    </div>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="{{ asset('intranet/assets/js/jquery-2.1.4.min.js') }}"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="{{ asset('intranet/assets/js/jquery-1.11.3.min.js')}}"></script>
<![endif]-->

<script src="{{ asset('intranet/assets/js/bootstrap.min.js')}}"></script>

<!-- page specific plugin scripts -->


<!-- ace scripts -->
<script src="{{ asset('intranet/assets/js/ace-elements.min.js')}}"></script>
<script src="{{ asset('intranet/assets/js/ace.min.js')}}"></script>
<script src="{{ asset('toast/jquery.toast.min.js') }}"></script>

<!-- inline scripts related to this page -->



@yield('scripts')

</body>
</html>