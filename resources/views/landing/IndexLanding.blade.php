@extends('layouts_user.master')
    @section('token')
        <meta name="csrf-token" content="{{ csrf_token() }}">
    @endsection
    @section('content')
            <section class="site-section site-section-top site-section-light themed-background-dark-default">
                @foreach($setting as $row)
                <div class="container">
                    <div class="push text-center">
                        <h1 class="animation-fadeInQuick2Inv"><strong>{{ucwords($row->landing_text)}}</strong></h1>
                        <!-- ucwords membesarkan Tulisan Diawal kata -->
                        <h2 class="text-light-op animation-fadeInQuickInv push-bit"><strong>{{ucwords($row->sublanding_text)}}</strong></h2>
                       <!--  <a href="http://goo.gl/RcsdAh" class="btn btn-lg btn-success push-right-left"><strong>Purchase</strong></a>
                        <a href="http://demo.pixelcave.com/appui" class="btn btn-lg btn-info push-right-left"><strong>Live Preview</strong></a> -->
                    </div>
                    <div class="site-promo-img visibility-none" data-toggle="animation-appear" data-animation-class="animation-slideUpQuick" data-element-offset="0" align="center">
                        <img src="{{asset('img/setting/'.$row->gambar)}}" alt="">
                    </div>
                </div>
                @endforeach
            </section>
            <!-- <section class="site-content site-section">
                <div class="container">
                    <div id="testimonials-carousel" class="carousel slide carousel-html" data-ride="carousel" data-interval="4000">
                        <div class="carousel-inner text-center">
                            @foreach($list as $row)
                            <div class="item">
                                <blockquote>
                                    <p><img src="img/placeholders/avatars/avatar13@2x.jpg" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar-2x"></p>
                                    <h3>oi</h3>
                                    <footer><em><strong>Maria Clark</strong>, http://example.com/</em></footer>
                                </blockquote>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section> -->
            <section class="site-content site-section themed-background-light">
                <div class="container">
                   <!--  <h2 class="site-heading text-center text-dark">Sign up today and receive <strong>30% discount</strong>!</h2> -->
                    <div class="site-block text-center">
                        <form action="{{ url('pencarian/cari') }}" method="get">
                            <div class="input-group input-group-lg">

                                <input type="text" id="site-search" name="cari" class="form-control" placeholder="Cari Berdasarkan Judul / Penerbit / Penulis">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <section class="site-content site-section">
                <div class="container">
                    <div class="row row-items">
                        <hr>
                        <h3 align="center" style="background-color:#4a6ae2;color:white;" valign="middel"><br>Daftar Buku Terbaru<br><br></h3>
                        <hr>
                        <br>
                        @foreach($list as $row)
                        <div class="col-md-4">
                            <a href="{{ url('/detailbuku/'.$row->link.'/detail') }}" style="color:grey;" class="post">
                                <div class="post-image">
                                    <img src="{{asset('img/buku/'.$row->gambar)}}" alt="" class="img-responsive">
                                </div>
                                <div class="text-muted pull-right">{{$row->tanggal_terbit}}</div>
                                <h2 class="h4">
                                    <strong>{{ucfirst($row->judul)}}</strong>
                                </h2>
                                <p>{{ substr($row->deskripsi, 0, 200)}}...</p>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <section class="site-content site-section">
                <div class="container">
                    <div class="row row-items">
                        <hr>
                        <h3 align="center" style="background-color:#0fba3f;color:white;" valign="middel"><br>Daftar E-book Terbaru<br><br></h3>
                        <hr>
                        <br>
                        @foreach($list_ebook as $row)
                        <div class="col-md-4">
                            <a href="{{ url('/detail-ebook/'.$row->link) }}" style="color:grey;" class="post">
                                <div class="post-image">
                                    <img src="{{asset('img/buku/'.$row->gambar)}}" alt="" class="img-responsive">
                                </div>
                                <div class="text-muted pull-right">{{$row->tanggal_terbit}}</div>
                                <h2 class="h4">
                                    <strong>{{ucfirst($row->judul)}}</strong>
                                </h2>
                                <p>{{ substr($row->deskripsi, 0, 200)}}...</p>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <section class="site-content site-section">
                 <div class="text-center">
                    {{ $list->links() }}
                </div>
            </section>
            
            <section class="site-content site-section themed-background-dark">
                <div class="container">
                    <!-- Stats Row -->
                    <!-- CountTo (initialized in js/app.js), for more examples you can check out https://github.com/mhuggins/jquery-countTo -->
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="counter site-block">
                                <span data-toggle="countTo" data-to="{{$count}}" data-after=" Buku"></span>
                                <small>Total Buku</small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="counter site-block">
                                <span data-toggle="countTo" data-to="{{$count2}}" data-after=" E-book"></span>
                                <small>Total E-book</small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="counter site-block">
                                <span data-toggle="countTo" data-to="{{$count3}}" data-after=" User"></span>
                                <small>Total User</small>
                            </div>
                        </div>
                    </div>
                    <!-- END Stats Row -->
                </div>
            </section>
            <!-- <section class="site-content site-section themed-background-dark">
                <div class="container">
                    <h2 class="site-heading text-center text-light">Sign up today and receive <strong>30% discount</strong>!</h2>
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
            </section> -->
            <section class="site-section site-content border-bottom overflow-hidden">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 push">
                            <h2 align="center" style="font-family: Agency FB;"><strong>Kategori</strong></h2>
                            <br>
                            @foreach($kategori as $row)
                            <h3 class="site-heading "><a href="{{url('/kategori-buku/'.$row->id)}}" style="color:#434343;"><strong class="fa fa-check-square">&nbsp;&nbsp;{{ucfirst($row->nama)}}</strong></a></h3>
                            <!-- <p class="feature-text text-muted push">Time is of vital importance. <strong>AppUI</strong> will save you hundreds of hours of extra development. Start right away coding your functionality and see your project come to life months sooner.</p> -->
                           <!--  <h2 class="site-heading"><strong>Ready Designed Pages</strong></h2> -->
                            <!-- <p class="feature-text text-muted">15+ ready to use pages. The UI is ready, create the functionality. Dashboard, Login, Register, Social Net, Email Center, Media Box, Invoice, FAQ, Search Results and even more. Check them all out at the live preview.</p> -->
                            @endforeach
                        </div>
                        <div class="col-sm-6 clearfix push">
                            <img src="{{asset('assets_user/img/placeholders/screenshots/9cb1d6cfc4603e8a610c3637b2d1aa1504232270.jpg')}}" alt="" class="img-responsive pull-right visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInLeft" data-element-offset="-200" style="max-width: 450px; margin-right: -130px;">
                        </div>
                    </div>
                </div>
            </section>
            <!-- <section class="site-content site-section themed-background-muted">
                <div class="container">
                    <div id="testimonials-carousel" class="carousel slide carousel-html" data-ride="carousel" data-interval="4000">
                        <div class="carousel-inner text-center">
                            <div class="activate item">
                                <blockquote>
                                    <p><img src="{{asset('assets_user/img/placeholders/avatars/avatar13@2x.jpg')}}" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar-2x"></p>
                                    <h3>A big thanks! Our web app looks great!</h3>
                                    <footer><em><strong>Maria Clark</strong>, http://example.com/</em></footer>
                                </blockquote>
                            </div>
                            <div class="item">
                                <blockquote>
                                    <p><img src="{{asset('assets_user/img/placeholders/avatars/avatar2@2x.jpg')}}" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar-2x"></p>
                                    <h3>It just works!</h3>
                                    <footer><em><strong>Roger Santos</strong>, http://example.com/</em></footer>
                                </blockquote>
                            </div>
                            <div class="item">
                                <blockquote>
                                    <p><img src="{{asset('assets_user/img/placeholders/avatars/avatar1@2x.jpg')}}" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar-2x"></p>
                                    <h3>A great product at a great price!</h3>
                                    <footer><em><strong>Edward Duncan</strong>, http://example.com/</em></footer>
                                </blockquote>
                            </div>
                            <div class="item">
                                <blockquote>
                                    <p><img src="{{asset('assets_user/img/placeholders/avatars/avatar7@2x.jpg')}}" alt="avatar" class="img-circle img-thumbnail img-thumbnail-avatar-2x"></p>
                                    <h3>Awesome purchase, I'm so happy I made it!</h3>
                                    <footer><em><strong>Scott Gray</strong>, http://example.com/</em></footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
    @endsection
