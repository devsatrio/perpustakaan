<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">

    <title>PERPUSTAKAAN</title>

    <meta name="description"
        content="AppUI Frontend is a Responsive Bootstrap Site Template created by pixelcave and added as a bonus in AppUI Admin Template package">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    @yield('token')
    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{asset('assets_user/img/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('assets_user/img/icon57.png')}}" sizes="57x57">
    <link rel="apple-touch-icon" href="{{asset('assets_user/img/icon72.png')}}" sizes="72x72">
    <link rel="apple-touch-icon" href="{{asset('assets_user/img/icon76.png')}}" sizes="76x76">
    <link rel="apple-touch-icon" href="{{asset('assets_user/img/icon114.png')}}" sizes="114x114">
    <link rel="apple-touch-icon" href="{{asset('assets_user/img/icon120.png')}}" sizes="120x120">
    <link rel="apple-touch-icon" href="{{asset('assets_user/img/icon144.png')}}" sizes="144x144">
    <link rel="apple-touch-icon" href="{{asset('assets_user/img/icon152.png')}}" sizes="152x152">
    <link rel="apple-touch-icon" href="{{asset('assets_user/img/icon180.png')}}" sizes="180x180">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Bootstrap is included in its original form, unaltered -->
    <link rel="stylesheet" href="{{asset('assets_user/css/bootstrap.min.css')}}">

    <!-- Related styles of various icon packs and plugins -->
    <link rel="stylesheet" href="{{asset('assets_user/css/plugins.css')}}">

    <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
    <link rel="stylesheet" href="{{asset('assets_user/css/main.css')}}">

    <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
    <link rel="stylesheet" href="{{asset('assets_user/css/themes.css')}}">
    <!-- END Stylesheets -->

    <!-- Modernizr (browser feature detection library) -->
    <script src="{{asset('assets_user/js/vendor/modernizr-3.3.1.min.js')}}"></script>
</head>

<body>
    <div id="page-container" class="boxed">
        <section class="site-section site-section-top site-section-light themed-background-dark">
    <div class="container">
        <h1 class="text-center animation-fadeInQuickInv"><strong>{{ucwords($data->judul)}}</strong></h1>
    </div>
</section>
<section class="site-content site-section border-bottom">
    <div class="container">
        <div class="row">
            @if(Auth::guard('anggota')->check())
            <div class="col-md-8 col-md-offset-2">
                <article class="site-block">
                    <iframe width="100%" height="800px" src="{{ asset('/ViewerJS/#../fileebook/'.$data->ebook) }}">
                </article>
            </div>
            @else
            <div class="col-md-8 col-md-offset-2 text-center">
                <h1 class="text-danger"><b>Maaf, Anda Harus Login</b></h1>
            </div>
            @endif
        </div>
    </div>
    <br>
</section>
        
    </div>
    <a href="#" id="to-top"><i class="fa fa-arrow-up"></i></a>
    <script src="{{asset('assets_user/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <script src="{{asset('assets_user/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets_user/js/plugins.js')}}"></script>
    <script src="{{asset('assets_user/js/app.js')}}"></script>
</body>

</html>
<!DOCTYPE html>