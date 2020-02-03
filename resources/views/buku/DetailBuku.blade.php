@extends('layouts_user.master')

@section('token')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<section class="site-section site-section-top site-section-light themed-background-dark">
    <div class="container">
        <h1 class="text-center animation-fadeInQuickInv"><strong>Detail Buku</strong></h1>
    </div>
</section>
<section class="site-content site-section border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-2">
                <article class="site-block">
                    <div class="row push-top-bottom">
                        <div class="col-xs-12 text-center">
                            <a href="{{asset('img/buku/'.$view->gambar)}}" data-toggle="lightbox-image"
                                title="Image 1 Description">
                                <img src="{{asset('img/buku/'.$view->gambar)}}" alt=""
                                    class="img-responsive center-block">
                            </a>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-md-5 col-md-offset-1">
                <article class="site-block">
                    <h3 class="push-top"><strong>{{ucwords($view->judul)}}</strong></h3>
                    <div class="site-block">
                        <ul class="nav nav-tabs push-bit" data-toggle="tabs">
                            <li class="active"><a href="#tabs-deskripsi">Deskripsi</a></li>
                            <li><a href="#tabs-detail">Detail</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-deskripsi">
                                <p>{{$view->deskripsi}}</p>
                            </div>
                            <div class="tab-pane" id="tabs-detail">
                               <table>
                                   <tr>
                                       <td>ISBN</td>
                                       <td>&nbsp;:&nbsp;</td>
                                       <td><b> {{$view->isbn}}</b></td>
                                   </tr>
                                   <tr>
                                       <td>Penerbit</td>
                                       <td>&nbsp;:&nbsp;</td>
                                       <td><b> {{$view->penerbit}}</b></td>
                                   </tr>
                                   <tr>
                                       <td>Tanggal Terbit </td>
                                       <td>&nbsp;:&nbsp;</td>
                                       <td><b> {{$view->tanggal_terbit}}</b></td>
                                   </tr>
                                   <tr>
                                       <td>Jumlah Halaman</td>
                                       <td>&nbsp;:&nbsp;</td>
                                       <td><b> {{$view->halaman}}</b></td>
                                   </tr>
                                   <tr>
                                       <td>Bahasa </td>
                                       <td>&nbsp;:&nbsp;</td>
                                       <td><b> {{$view->bahasa}}</b></td>
                                   </tr>
                               </table>
                            </div>
                        </div>
                    </div>


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
            <div class="col-md-12 text-center">
                <h3>
                    <strong>Baca Lainnya</strong>
                </h3>
            </div>
        </div>
    </div>
</section>
<!-- END Author -->

<!-- Comments -->
<section class="site-content site-section">
    <div class="container">
        <div class="row row-items">
            @foreach($datalain as $row)
            <div class="col-md-3">
                <a href="{{url('/detailbuku/'.$row->link.'/detail')}}" class="post">
                    <div class="post-image">
                        <img src="{{asset('img/buku/'.$row->gambar)}}" alt="" class="img-responsive">
                    </div>
                    <h2 class="h4">
                        <strong>{{ucwords($row->judul)}}</strong>
                    </h2>
                    <p>{{substr($row->deskripsi,0,150)}}</p>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection