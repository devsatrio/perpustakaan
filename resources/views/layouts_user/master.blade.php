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
    <!-- Page Container -->
    <!-- In the PHP version you can set the following options from inc/config file -->
    <!-- 'boxed' class for a boxed layout -->
    <div id="page-container" class="boxed">
        <!-- Site Header -->
        <header>
            <div class="container">
                <!-- Site Logo -->
                <a href="index.html" class="site-logo">
                    <i class="fa fa-book"></i>&nbsp;&nbsp;PERPUSTAKAAN<strong></strong>
                </a>
                <!-- END Site Logo -->

                <!-- Site Navigation -->
                <nav>
                    <!-- Menu Toggle -->
                    <!-- Toggles menu on small screens -->
                    <a href="javascript:void(0)" class="btn btn-default site-menu-toggle visible-xs visible-sm">Menu</a>
                    <!-- END Menu Toggle -->

                    <!-- Main Menu -->
                    <ul class="site-nav">
                        <?php if($page=='home') {?>
                        <li>
                            <a href="{{url('/')}}" class="active" >Home</a>
                        </li>
                        <?php } else { ?>
                        <li>
                            <a href="{{url('/')}}" >Home</a>
                        </li>    
                        <?php } ?>
                        <!--//=========================================================-->
                        <?php if($page=='buku' or $page=='detail') {?>
                        <li>
                            <a href="{{url('/daftarbuku')}}" class="active" >Buku</a>
                        </li>
                        <?php } else { ?>
                        <li>
                            <a href="{{url('/daftarbuku')}}" >Buku</a> 
                        </li>   
                        <?php } ?>
                        <!--==========================================================-->
                        <?php if($page=='ebook') {?>
                        <li>
                            <a href="{{url('/daftar-ebook')}}" class="active" >E-book</a>
                        </li>
                        <?php } else { ?>
                        <li>
                            <a href="{{url('/daftar-ebook')}}" >E-book</a> 
                        </li>   
                        <?php } ?>
                        <!--==========================================================-->
                        
                        @if(Auth::guard('anggota')->check())
                        <li class="dropdown ">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown"
                                data-delay="0" data-close-others="false">{{ Auth::guard('anggota')->user()->nama}} <b
                                    class=" icon-angle-down"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('logout-anggota') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                            class="icon-key"></i> Log Out</a>
                                    <form id="logout-form" action="{{ url('logout-anggota') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li>
                            <a href="{{url('/login-anggota')}}">Login</a>
                        </li>
                        @endif

                        
                        

                        <!-- <li>
                                <a href="pricing.html">Pricing</a>
                            </li>
                            <li>
                                <a href="contact.html">Contact</a>
                            </li>
                            <li>
                                <a href="ui.html">UI</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="site-nav-sub"><i class="fa fa-angle-down site-nav-arrow"></i>Pages</a>
                                <ul>
                                    <li>
                                        <a href="blog.html">Blog</a>
                                    </li>
                                    <li>
                                        <a href="blog_post.html">Blog Post</a>
                                    </li>
                                    <li>
                                        <a href="portfolio.html">Portfolio</a>
                                    </li>
                                    <li>
                                        <a href="project.html">Project</a>
                                    </li>
                                    <li>
                                        <a href="team.html">Team</a>
                                    </li>
                                    <li>
                                        <a href="faq.html">FAQ</a>
                                    </li>
                                    <li>
                                        <a href="jobs.html">Jobs</a>
                                    </li>
                                    <li>
                                        <a href="search_results.html">Search Results</a>
                                    </li>
                                    <li>
                                        <a href="page_scroller.html">Page Scroller</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="http://demo.pixelcave.com/appui" class="featured">Get Started <i class="fa fa-arrow-right"></i></a>
                            </li> -->
                    </ul>
                    <!-- END Main Menu -->
                </nav>
                <!-- END Site Navigation -->
            </div>
        </header>
        <!-- END Site Header -->
        @yield('content')
        <!-- Intro + Action -->

        <!-- END Intro + Action -->

        <!-- Promo Features -->

        <!-- END Promo Features -->

        <!-- Promo #1 -->

        <!-- END Promo #1 -->

        <!-- Quick Stats -->

        <!-- END Quick Stats -->

        <!-- Promo #2 -->


        <!-- END Promo #2 -->

        <!-- Sign Up Action -->

        <!-- END Sign Up Action -->

        <!-- Promo #3 -->

        <!-- END Promo #3 -->

        <!-- Testimonials -->

        <!-- END Testimonials -->
        <!-- Footer -->
        <footer class="site-footer site-section site-section-light">
            <div class="container">
                <!-- Footer Links -->
                <div class="row">
                    <div class="col-sm-4">
                       <!--  <h4 class="footer-heading">Company</h4>
                        <ul class="footer-nav ul-breath list-unstyled">
                            <li><a href="javascript:void(0)">About Us</a></li>
                            <li><a href="javascript:void(0)">Our Team</a></li>
                            <li><a href="javascript:void(0)">Memberships</a></li>
                            <li><a href="javascript:void(0)">Terms &amp; Conditions</a></li>
                            <li><a href="javascript:void(0)">Privacy Policy</a></li>
                        </ul> -->
                    </div>
                    <div class="col-sm-4">
                       <!--  <h4 class="footer-heading">Need support?</h4>
                        <ul class="footer-nav footer-nav-links list-inline">
                            <li><a href="javascript:void(0)"><i class="fa fa-fw fa-book"></i> Knowledge Base</a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-fw fa-support"></i> FAQ</a></li>
                        </ul> -->
                        <!-- <h4 class="footer-heading">We are social!</h4>
                        <ul class="footer-nav footer-nav-links list-inline">
                            <li><a href="javascript:void(0)" class="social-facebook" data-toggle="tooltip"
                                    title="Like our Facebook page"><i class="fa fa-fw fa-facebook"></i></a></li>
                            <li><a href="javascript:void(0)" class="social-twitter" data-toggle="tooltip"
                                    title="Follow us on Twitter"><i class="fa fa-fw fa-twitter"></i></a></li>
                            <li><a href="javascript:void(0)" class="social-google-plus" data-toggle="tooltip"
                                    title="Like our Google+ page"><i class="fa fa-fw fa-google-plus"></i></a></li>
                            <li><a href="javascript:void(0)" class="social-dribbble" data-toggle="tooltip"
                                    title="Follow us on Dribbble"><i class="fa fa-fw fa-dribbble"></i></a></li>
                            <li><a href="javascript:void(0)" class="social-youtube" data-toggle="tooltip"
                                    title="Subscribe to our Youtube channel"><i
                                        class="fa fa-fw fa-youtube-play"></i></a></li>
                        </ul> -->
                    </div>
                   <!--  <div class="col-sm-4">
                        <h4 class="footer-heading">Newsletter</h4>
                        <form action="index.html" method="post" class="form-inline" onsubmit="return false;">
                            <div class="form-group">
                                <label class="sr-only" for="register-email">Your Email</label>
                                <div class="input-group">
                                    <input type="email" id="register-email" name="register-email" class="form-control"
                                        placeholder="Your Email..">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary">Subscribe</button>
                                    </span>
                                </div>
                            </div>
                        </form>
                        <h4 class="footer-heading"><a href="http://goo.gl/RcsdAh">AppUI - Frontend</a></h4>
                        <em><span id="year-copy"></span></em> &copy; Crafted with <i
                            class="fa fa-heart text-danger"></i> by <a href="http://goo.gl/vNS3I">pixelcave</a>
                    </div> -->
                </div>
                <!-- END Footer Links -->
            </div>
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
    <a href="#" id="to-top"><i class="fa fa-arrow-up"></i></a>

    <!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
    <script src="{{asset('assets_user/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <script src="{{asset('assets_user/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets_user/js/plugins.js')}}"></script>
    <script src="{{asset('assets_user/js/app.js')}}"></script>
</body>

</html>
<!DOCTYPE html>