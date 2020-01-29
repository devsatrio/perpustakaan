<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">

    <title>Perpustakaan</title>

    <meta name="description"
        content="AppUI is a Web App Bootstrap Admin Template created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    @yield('token')
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('assets/img/icon57.png')}}" sizes="57x57">
    <link rel="apple-touch-icon" href="{{asset('assets/img/icon72.png')}}" sizes="72x72">
    <link rel="apple-touch-icon" href="{{asset('assets/img/icon76.png')}}" sizes="76x76">
    <link rel="apple-touch-icon" href="{{asset('assets/img/icon114.png')}}" sizes="114x114">
    <link rel="apple-touch-icon" href="{{asset('assets/img/icon120.png')}}" sizes="120x120">
    <link rel="apple-touch-icon" href="{{asset('assets/img/icon144.png')}}" sizes="144x144">
    <link rel="apple-touch-icon" href="{{asset('assets/img/icon152.png')}}" sizes="152x152">
    <link rel="apple-touch-icon" href="{{asset('assets/img/icon180.png')}}" sizes="180x180">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/plugins.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/themes.css')}}">
    @yield('css')
    <script src="{{asset('assets/js/vendor/modernizr-3.3.1.min.js')}}"></script>
</head>

<body>
    <div id="page-wrapper" class="page-loading">
        <div class="preloader">
            <div class="inner">
                <!-- Animation spinner for all modern browsers -->
                <div class="preloader-spinner themed-background hidden-lt-ie10"></div>

                <!-- Text for IE9 -->
                <h3 class="text-primary visible-lt-ie10"><strong>Loading..</strong></h3>
            </div>
        </div>

        <div id="page-container" class="header-fixed-top sidebar-visible-lg-full">
            <!-- Alternative Sidebar -->
            <div id="sidebar-alt" tabindex="-1" aria-hidden="true">
                <!-- Toggle Alternative Sidebar Button (visible only in static layout) -->
                <a href="javascript:void(0)" id="sidebar-alt-close" onclick="App.sidebar('toggle-sidebar-alt');"><i
                        class="fa fa-times"></i></a>

                <!-- Wrapper for scrolling functionality -->
                <div id="sidebar-scroll-alt">
                    <!-- Sidebar Content -->
                    <div class="sidebar-content">
                        <!-- Profile -->
                        <div class="sidebar-section">
                            <h2 class="text-light">Profile</h2>
                            <form action="#" method="post" class="form-control-borderless" onsubmit="return false;">
                                <div class="form-group">
                                    <label for="side-profile-name">Name</label>
                                    <input type="text" id="side-profile-name" name="side-profile-name"
                                        class="form-control" value="John Doe">
                                </div>
                                <div class="form-group">
                                    <label for="side-profile-email">Email</label>
                                    <input type="email" id="side-profile-email" name="side-profile-email"
                                        class="form-control" value="john.doe@example.com">
                                </div>
                                <div class="form-group">
                                    <label for="side-profile-password">New Password</label>
                                    <input type="password" id="side-profile-password" name="side-profile-password"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="side-profile-password-confirm">Confirm New Password</label>
                                    <input type="password" id="side-profile-password-confirm"
                                        name="side-profile-password-confirm" class="form-control">
                                </div>
                                <div class="form-group remove-margin">
                                    <button type="submit" class="btn btn-effect-ripple btn-primary"
                                        onclick="App.sidebar('close-sidebar-alt');">Save</button>
                                </div>
                            </form>
                        </div>
                        <!-- END Profile -->

                        <!-- Settings -->
                        <div class="sidebar-section">
                            <h2 class="text-light">Settings</h2>
                            <form action="#" method="post" class="form-horizontal form-control-borderless"
                                onsubmit="return false;">
                                <div class="form-group">
                                    <label class="col-xs-7 control-label-fixed">Notifications</label>
                                    <div class="col-xs-5">
                                        <label class="switch switch-success"><input type="checkbox"
                                                checked><span></span></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-7 control-label-fixed">Public Profile</label>
                                    <div class="col-xs-5">
                                        <label class="switch switch-success"><input type="checkbox"
                                                checked><span></span></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-7 control-label-fixed">Enable API</label>
                                    <div class="col-xs-5">
                                        <label class="switch switch-success"><input
                                                type="checkbox"><span></span></label>
                                    </div>
                                </div>
                                <div class="form-group remove-margin">
                                    <button type="submit" class="btn btn-effect-ripple btn-primary"
                                        onclick="App.sidebar('close-sidebar-alt');">Save</button>
                                </div>
                            </form>
                        </div>
                        <!-- END Settings -->
                    </div>
                    <!-- END Sidebar Content -->
                </div>
                <!-- END Wrapper for scrolling functionality -->
            </div>
            <!-- END Alternative Sidebar -->

            <!-- Main Sidebar -->
            <div id="sidebar">
                <!-- Sidebar Brand -->
                <div id="sidebar-brand" class="themed-background">
                    <a href="{{url('/home')}}" class="sidebar-title">
                        <i class="fa fa-book"></i> <span class="sidebar-nav-mini-hide">Perpustakaan</span>
                    </a>
                </div>
                <!-- END Sidebar Brand -->

                <!-- Wrapper for scrolling functionality -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <div class="sidebar-content">
                        <!-- Sidebar Navigation -->
                        <ul class="sidebar-nav">
                            <li>
                                <a href="{{url('/home')}}"><i class="gi gi-compass sidebar-nav-icon"></i><span
                                        class="sidebar-nav-mini-hide">Dashboard</span></a>
                            </li>
                            <li class="sidebar-separator">
                                <i class="fa fa-ellipsis-h"></i>
                            </li>


                            <li>
                                <a href="{{url('/user')}}"><i class="gi gi-user sidebar-nav-icon"></i><span
                                        class="sidebar-nav-mini-hide">User</span></a>
                            </li>
                            <li>
                                <a href="{{url('/anggota')}}"><i class="gi gi-group sidebar-nav-icon"></i><span
                                        class="sidebar-nav-mini-hide">Anggota</span></a>
                            </li>
                            <!-- <li>
                                    <a href="{{url('/buku')}}"><i class="gi gi-book sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Buku</span></a>
                                </li> -->
                            <li>
                                <a href="#" class="sidebar-nav-menu">
                                <i  class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i
                                        class="fa fa-book sidebar-nav-icon"></i><span
                                        class="sidebar-nav-mini-hide">Buku</span></a>
                                <ul>
                                    <li>
                                        <a href="{{url('/kategori')}}">Kategori Buku</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/ebook')}}">Ebook</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/buku')}}">Buku</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="sidebar-nav-menu"><i
                                        class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i
                                        class="fa fa-tasks sidebar-nav-icon"></i><span
                                        class="sidebar-nav-mini-hide">Peminjaman Buku</span></a>
                                <ul>
                                    <li>
                                        <a href="{{url('/pinjam')}}">Buat Peminjaman</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/daftarpinjam')}}">Daftar Peminjaman</a>
                                    </li>

                                </ul>
                            </li>
                            <li>
                                <a href="#" class="sidebar-nav-menu"><i
                                        class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i
                                        class="fa fa-line-chart sidebar-nav-icon"></i><span
                                        class="sidebar-nav-mini-hide">Statistik</span></a>
                                <ul>
                                    <li>
                                        <a href="{{url('/daftarfavorit')}}">Buku Favorit</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/daftarebookfavorit')}}">Ebook Favorit</a>
                                    </li>
                                    
                                    <li>
                                        <a href="{{url('/peminjamaktif')}}">Peminjam Teraktif</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{url('/denda')}}"><i class="fa fa-bomb sidebar-nav-icon"></i><span
                                        class="sidebar-nav-mini-hide">Denda</span></a>
                            </li>
                            <li>
                                <a href="{{url('/setting')}}"><i class="fa fa-cogs sidebar-nav-icon"></i><span
                                        class="sidebar-nav-mini-hide">Setting</span></a>
                            </li>
                        </ul>
                        <!-- END Sidebar Navigation -->


                    </div>
                    <!-- END Sidebar Content -->
                </div>
                <!-- END Wrapper for scrolling functionality -->

                <!-- Sidebar Extra Info -->
                <div id="sidebar-extra-info" class="sidebar-content sidebar-nav-mini-hide">

                    <div class="text-center">
                        <small>Dibuat Oleh <i class="fa fa-heart text-danger"></i><a href="http://goo.gl/vNS3I"
                                target="_blank"> Hamba Allah</a></small><br>
                        <small><span>12-2018</span> &copy; <a href="{{url('/buku')}}">AppUI 2.7</a></small>
                    </div>
                </div>
                <!-- END Sidebar Extra Info -->
            </div>
            <!-- END Main Sidebar -->

            <!-- Main Container -->
            <div id="main-container">

                <header class="navbar navbar-inverse navbar-fixed-top">
                    <!-- Left Header Navigation -->
                    <ul class="nav navbar-nav-custom">
                        <!-- Main Sidebar Toggle Button -->
                        <li>
                            <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                                <i class="fa fa-ellipsis-v fa-fw animation-fadeInRight" id="sidebar-toggle-mini"></i>
                                <i class="fa fa-bars fa-fw animation-fadeInRight" id="sidebar-toggle-full"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav-custom pull-right">

                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{asset('img/'.Auth::user()->foto)}}" alt="avatar">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-header">
                                    <strong>ADMINISTRATOR</strong>
                                </li>

                                <li>
                                    <a href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off fa-fw pull-right"></i>
                                        Log out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <!-- END User Dropdown -->
                    </ul>
                    <!-- END Right Header Navigation -->
                </header>
                <!-- END Header -->

                <!-- Page content -->
                @yield('content')
                <!-- END Page Content -->
            </div>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->
    </div>
    <!-- END Page Wrapper -->

    <!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
    <script src="{{asset('assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    @yield('js')
</body>

</html>