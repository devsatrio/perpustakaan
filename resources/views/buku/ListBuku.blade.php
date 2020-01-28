@extends('layouts_user.master')

@section('token')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')

<section class="site-section site-section-top site-section-light themed-background-dark">
    <div class="container">
        <h1 class="text-center animation-fadeInQuickInv"><strong>The best features in one template.</strong></h1>
    </div>
</section>
            <!-- END Intro -->

            <!-- Features #1 -->
<section class="site-content site-section border-bottom">
    <div class="container text-center">
                	
        <div class="row row-items">
         @foreach($list as $row)
            <div class="col-sm-4">
                <a href="javascript:void(0)" data-element-offset="-100">
                    <img src="{{asset('img/buku/'.$row->gambar)}}" style="max-width:100%;max-height:150px;">
                                <!-- <i class="fa fa-fire"></i> -->
                </a>
                <br>
                <br>
                <div class="visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInQuick2Inv" data-element-offset="-100">
                    <h4 class="site-heading feature-heading"><strong>Bootstrap Powered</strong></h4>
                    <p class="feature-text text-muted">Bootstrap is a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development. <strong>AppUI</strong> was built on top, extending it to a large degree.</p>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>
            <!-- END Features #1 -->

            <!-- Quick Stats -->
            <section class="site-content site-section themed-background-dark">
                <div class="container">
                    <!-- Stats Row -->
                    <!-- CountTo (initialized in js/app.js), for more examples you can check out https://github.com/mhuggins/jquery-countTo -->
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="counter site-block">
                                <span data-toggle="countTo" data-to="2120" data-after="+"></span>
                                <small>Sales</small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="counter site-block">
                                <span data-toggle="countTo" data-to="530" data-after="+"></span>
                                <small>Services</small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="counter site-block">
                                <span data-toggle="countTo" data-to="3200" data-after="+"></span>
                                <small>Projects</small>
                            </div>
                        </div>
                    </div>
                    <!-- END Stats Row -->
                </div>
            </section>
            <!-- END Quick Stats -->

            <!-- Sign Up Action -->
            <section class="site-content site-section">
                <div class="container">
                    <h2 class="site-heading text-center">Sign up today and receive <strong>30% discount</strong>!</h2>
                    <div class="site-block text-center">
                        <form action="features.html" method="post" class="form-inline" onsubmit="return false;">
                            <div class="form-group">
                                <label class="sr-only" for="register-username">Username</label>
                                <input type="text" id="register-username" name="register-username" class="form-control input-lg" placeholder="Choose a username..">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="register-password">Password</label>
                                <input type="password" id="register-password" name="register-password" class="form-control input-lg" placeholder="..and a password!">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-success">Get Started!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
@endsection