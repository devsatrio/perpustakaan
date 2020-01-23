<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>Demo Perpustakaan</title>

        <meta name="description" content="AppUI is a Web App Bootstrap Admin Template created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="img/favicon.png">
        <link rel="apple-touch-icon" href="img/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="img/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="img/icon76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="img/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="img/icon120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="img/icon144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="img/icon152.png" sizes="152x152">
        <link rel="apple-touch-icon" href="img/icon180.png" sizes="180x180">
   
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

        <link rel="stylesheet" href="{{asset('assets/css/plugins.css')}}">

        <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">

        <link rel="stylesheet" href="{{asset('assets/css/themes.css')}}">
       
        <script src="{{asset('assets/js/vendor/modernizr-3.3.1.min.js')}}"></script>
    </head>
    <body>
        <!-- Full Background -->
        <!-- For best results use an image with a resolution of 1280x1280 pixels (prefer a blurred image for smaller file size) -->
        <img src="{{asset('assets/img/placeholders/layout/login2_full_bg.jpg')}}" alt="Full Background" class="full-bg animation-pulseSlow">
        <!-- END Full Background -->

        <!-- Login Container -->
        <div id="login-container">
            <!-- Login Header -->
            <h1 class="h2 text-light text-center push-top-bottom animation-pullDown">
                <i class="fa fa-book text-light-op"></i> <strong>Perpustakaan</strong>
            </h1>
            <!-- END Login Header -->

            <!-- Login Block -->
            <div class="block animation-fadeInQuick">
                <!-- Login Title -->
                <div class="block-title">
                    <h2>Harap Login</h2>
                </div>
                <!-- END Login Title -->

                <!-- Login Form -->
                <form method="POST" id="form-login" class="form-horizontal" action="{{ route('login') }}">
                        @csrf
                
                    <div class="form-group">
                        <label for="login-email" class="col-xs-12">Username</label>
                        <div class="col-xs-12">
                            <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="login-password" class="col-xs-12">Password</label>
                        <div class="col-xs-12">
                             <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-8">
                            <!-- <label class="csscheckbox csscheckbox-primary">
                               <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><span></span> Ingat Saya?
                            </label> -->
                        </div>
                        <div class="col-xs-4 text-right">
                            <button type="submit" class="btn btn-effect-ripple btn-sm btn-success">Log In</button>
                        </div>
                    </div>
                </form>
                <!-- END Login Form -->

                <!-- Social Login -->
                <hr>
                
            </div>
            <!-- END Login Block -->

            <!-- Footer -->
            <footer class="text-muted text-center animation-pullUp">
                <small><span>12-2018</span> &copy; <a href="http://goo.gl/RcsdAh" target="_blank">Perpustakaan 1.0</a></small>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Login Container -->

        <!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
        <script src="{{asset('assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins.js')}}"></script>
        <script src="{{asset('assets/js/app.j')}}s"></script>

        <!-- Load and execute javascript code used only in this page -->
        <script src="{{asset('assets/js/pages/readyLogin.js')}}"></script>
        <script>$(function(){ ReadyLogin.init(); });</script>
    </body>
</html>

               
