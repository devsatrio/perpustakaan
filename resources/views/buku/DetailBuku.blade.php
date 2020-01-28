@extends('layouts_user.master')

@section('token')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="media-container">
                <section class="site-section site-section-top site-section-light">
                    <div class="container">
                        <h1><strong>The autumn trip that changed my life</strong></h1>
                        <h2 class="text-light-op hidden-xs"><strong>It changed the way I think</strong></h2>
                    </div>
                </section>

                <!-- For best results use an image with a resolution of 1260x280 pixels -->
                <img src="img/placeholders/headers/blog_post.jpg" alt="" class="media-image">
            </div>
            <!-- END Intro -->

            <!-- Post -->
            <section class="site-content site-section border-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <article class="site-block">
                                
                                <h3 class="push-top"><strong>{{$view->judul}}</strong></h3>
                               <!--  <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                                <div class="row push-top-bottom">
                                    <div class="col-xs-6">
                                        <a href="{img/placeholders/photos/photo9.jpg" data-toggle="lightbox-image" title="Image 1 Description">
                                            <img src="{{asset('img/buku/'.$view->gambar)}}" alt="" class="img-responsive center-block">
                                        </a>
                                    </div>
                                    <div class="col-xs-6">
                                        <a href="img/placeholders/photos/photo10.jpg" data-toggle="lightbox-image" title="Image 2 Description">
                                            <img src="img/placeholders/photos/photo10.jpg" alt="" class="img-responsive center-block">
                                        </a>
                                    </div>
                                </div>
                                <p>Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit. Ut egestas tempor est, in cursus enim venenatis eget! Nulla quis ligula ipsum.</p>
                                <h3 class="push-top"><strong>Day 3-6: Exploring</strong></h3>
                                <p>Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <div class="row push-top-bottom">
                                    <div class="col-xs-6">
                                        <a href="img/placeholders/photos/photo13.jpg" data-toggle="lightbox-image" title="Image 3 Description">
                                            <img src="img/placeholders/photos/photo13.jpg" alt="" class="img-responsive center-block">
                                        </a>
                                    </div>
                                    <div class="col-xs-6">
                                        <a href="img/placeholders/photos/photo12.jpg" data-toggle="lightbox-image" title="Image 4 Description">
                                            <img src="img/placeholders/photos/photo12.jpg" alt="" class="img-responsive center-block">
                                        </a>
                                    </div>
                                </div>
                                <p>Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit. Ut egestas tempor est, in cursus enim venenatis eget!</p>
                                <p>In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <h3 class="push-top"><strong>Day 7: The Return</strong></h3>
                                <p>In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </article>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END Post -->

            <!-- Author -->
            <section class="site-content site-section border-bottom themed-background-muted">
                <div class="container">
                    <div class="row row-items">
                        <div class="col-md-2 col-md-offset-2 text-center">
                            <img src="img/placeholders/avatars/avatar2@2x.jpg" alt="" class="img-circle img-thumbnail img-thumbnail-avatar-2x">
                        </div>
                        <div class="col-md-6">
                            <h4>
                                <small class="pull-right"><strong>October 8, 2014</strong></small>
                                <strong>Jonathan Taylor</strong>
                            </h4>
                            <p>In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum.</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END Author -->

            <!-- Comments -->
            <section class="site-content site-section">
                <div class="container">
                    <div class="row row-items">
                        <div class="col-md-8 col-md-offset-2">
                            <!-- All Comments -->
                            <h2 class="site-heading h3"><i class="fa fa-comments"></i> <strong>Comments</strong> (5)</h2>
                            <ul class="media-list site-block">
                                <li class="media">
                                    <a href="javascript:void(0)" class="pull-left">
                                        <img src="img/placeholders/avatars/avatar12.jpg" alt="Avatar" class="img-circle">
                                    </a>
                                    <div class="media-body">
                                        <a href="javascript:void(0)"><strong>Nicoline Andersen</strong></a>
                                        <span class="text-muted"><small><em>35 min ago</em></small></span>
                                        <p>Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus?</p>
                                    </div>
                                </li>
                                <li class="media">
                                    <a href="javascript:void(0)" class="pull-left">
                                        <img src="img/placeholders/avatars/avatar13.jpg" alt="Avatar" class="img-circle">
                                    </a>
                                    <div class="media-body">
                                        <a href="javascript:void(0)"><strong>Josefina Orozco</strong></a>
                                        <span class="text-muted"><small><em>10 hours ago</em></small></span>
                                        <p>Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices.</p>
                                        <ul class="media-list">
                                            <li class="media">
                                                <a href="javascript:void(0)" class="pull-left">
                                                    <img src="img/placeholders/avatars/avatar15.jpg" alt="Avatar" class="img-circle">
                                                </a>
                                                <div class="media-body">
                                                    <a href="javascript:void(0)"><strong>George Romero</strong></a>
                                                    <span class="text-muted"><small><em>10 min ago</em></small></span>
                                                    <p>Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at.</p>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <a href="javascript:void(0)" class="pull-left">
                                                    <img src="img/placeholders/avatars/avatar14.jpg" alt="Avatar" class="img-circle">
                                                </a>
                                                <div class="media-body">
                                                    <a href="javascript:void(0)"><strong>Gerald Sims</strong></a>
                                                    <span class="text-muted"><small><em>1 hour ago</em></small></span>
                                                    <p>Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque?</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="media">
                                    <a href="javascript:void(0)" class="pull-left">
                                        <img src="img/placeholders/avatars/avatar7.jpg" alt="Avatar" class="img-circle">
                                    </a>
                                    <div class="media-body">
                                        <a href="javascript:void(0)"><strong>Donald Pierce</strong></a>
                                        <span class="text-muted"><small><em>1 week ago</em></small></span>
                                        <p>Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at.</p>
                                    </div>
                                </li>
                            </ul>
                            <!-- END All Comments -->

                           
                            <!-- END Add Comment -->
                        </div>
                    </div>
                </div>
            </section>
@endsection