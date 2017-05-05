<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>TiendApp</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" href="{!! asset("plugin/css/bootstrap.min.css") !!}">
    <link rel="stylesheet" href="{!! asset("plugin/css/font-awesome.min.css") !!}">
    <link rel="stylesheet" href="{!! asset("plugin/css/select2.min.css") !!}">
    <link rel="stylesheet" href="{!! asset("plugin/css/AdminLTE.min.css") !!}">
    <link rel="stylesheet" href="{!! asset("plugin/css/_all-skins.min.css") !!}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="{!! asset("plugin/css/ionicons.min.css") !!}">

    <!-- jQuery 2.1.4 -->
    <script src="{!! asset("plugin/js/jquery.min.js") !!}"></script>
    <script src="{!! asset("plugin/js/bootstrap.min.js") !!}"></script>
    <script src="{!! asset("plugin/js/select2.min.js") !!}"></script>
    <script src="{!! asset("plugin/js/icheck.min.js") !!}"></script>

    <!-- AdminLTE App -->
    <script src="{!! asset("plugin/js/app.min.js") !!}"></script>

    <!-- Datatables -->
    <script src="{!! asset("plugin/js/jquery.dataTables.min.js") !!}"></script>
    <script src="{!! asset("plugin/js/dataTables.bootstrap.min.js") !!}"></script>
    <link rel="stylesheet" href="{!! asset("plugin/css/dataTables.bootstrap.min.css") !!}">

    {!! Html::script('js/funciones.js') !!}

    @yield('scripts')
</head>


<body class="skin-blue sidebar-mini">
@if (!Auth::guest())
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="#" class="logo">
                {{--<b>TiendApp</b>--}}
                <img src="{{asset('img-sistema/logo-tiendapp.svg')}}" style="max-height: 92px; padding: 5px 0 5px 0;">
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="{{asset('img-sistema/logoPeque.png')}}"
                                     class="user-image" alt="User Image"/>
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">
                                      @if (Auth::guest())
                                        InfyOm
                                    @else
                                        {{ ucwords(Auth::user()->name)}}
                                    @endif
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="{{asset('logoPeque.png')}}"
                                         class="img-circle" alt="User Image"/>
                                    <p>
                                        @if (Auth::guest())
                                            InfyOm
                                        @else
                                            {{ ucwords(Auth::user()->name)}}
                                        @endif
                                        <small>Member since {!! Auth::user()->created_at->format('M, Y') !!}</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')
                <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Main Footer -->
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © 2016 <a href="#">TiendApp</a>.</strong> All rights reserved.
        </footer>

    </div>
@else
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    InfyOm Generator
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @endif

</body>
<style>
    .navbar-static-top{
        height:50px ;
    }
    .logo{
        height:100px !important;
    }
</style>
</html>