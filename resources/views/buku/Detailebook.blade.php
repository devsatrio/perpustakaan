@extends('layouts_user.master')

@section('token')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<section class="site-section site-section-top site-section-light themed-background-dark">
    <div class="container">
        <h1 class="text-center animation-fadeInQuickInv"><strong>Detail E-Book</strong></h1>
    </div>
</section>
<section class="site-content site-section border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-2">
                <article class="site-block">
                    <div class="row push-top-bottom">
                        <div class="col-xs-12 text-center">
                            <a href="{{asset('img/buku/'.$data->gambar)}}" data-toggle="lightbox-image"
                                title="Image 1 Description">
                                <img src="{{asset('img/buku/'.$data->gambar)}}" alt=""
                                    class="img-responsive center-block">
                            </a>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-md-5 col-md-offset-1">
                <article class="site-block">
                    <h3 class="push-top"><strong>{{ucwords($data->judul)}}</strong></h3>
                    <div class="site-block">
                        <ul class="nav nav-tabs push-bit" data-toggle="tabs">
                            <li class="active"><a href="#tabs-deskripsi">Deskripsi</a></li>
                            <li><a href="#tabs-detail">Detail</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-deskripsi">
                                <p>{{$data->deskripsi}}</p>
                            </div>
                            <div class="tab-pane" id="tabs-detail">
                                <table>
                                    <tr>
                                        <td>ISBN</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><b> {{$data->isbn}}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Penerbit</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><b> {{$data->penerbit}}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Terbit </td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><b> {{$data->tanggal_terbit}}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Halaman</td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><b> {{$data->halaman}}</b></td>
                                    </tr>
                                    <tr>
                                        <td>Bahasa </td>
                                        <td>&nbsp;:&nbsp;</td>
                                        <td><b> {{$data->bahasa}}</b></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </article>
                @if(Auth::guard('anggota')->check())
                <a href="{{url('/baca-ebook/'.$data->link)}}" class="btn btn-lg btn-primary">Baca Ebook</a>
                <button type="button" onclick="history.go(-1)" class="btn btn-lg btn-danger">Kembali</button>
                @else
                <div class="alert alert-warning alert-dismissable site-block">
                    <h4><strong>Peringatan</strong></h4>
                    <p>Harap <a href="{{url('/login-anggota')}}" class="alert-link">Login</a> untuk dapat membaca Ebook ini!</p>
                </div>
                @endif
            </div>
        </div>
    </div>
    <br>
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
                <a href="{{url('/detail-ebook/'.$row->link)}}" class="post">
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