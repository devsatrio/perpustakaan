@extends('layouts_user.master')

@section('token')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<!-- Intro -->
<section class="site-section site-section-top site-section-light themed-background-dark">
    <div class="container">
        <h1 class="text-center animation-fadeInQuickInv"><strong>Daftar Semua E-Book</strong></h1>
    </div>
</section>
<!-- END Intro -->
<section class="site-content site-section themed-background-muted">
    <div class="container">
        <div class="site-block">
            <form action="search_results.html" method="post">
                <div class="input-group input-group-lg">
                    <input type="text" id="site-search" name="site-search" class="form-control"
                        placeholder="Cari Berdasarkan Judul / Penerbit / Penulis">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<section class="site-content site-section-mini themed-background-default">
    <div class="container">
        <!-- Stats Row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="counter site-block">
                    <span>Kategori</span>
                    <small>Pages</small>
                </div>
            </div>
        </div>
        <!-- END Stats Row -->
    </div>
</section>
<!-- Team Member 1 -->
@foreach($data as $row)
<section class="site-content site-section overflow-hidden border-bottom">
    <div class="container">
        <div class="row row-items">
            <div class="col-md-2 col-md-offset-2 text-center visibility-none" data-toggle="animation-appear"
                data-animation-class="animation-fadeInRight" data-element-offset="-20">
                <img src="{{asset('img/buku/'.$row->gambar)}}" alt="" class="img-thumbnail">
            </div>
            <div class="col-md-6 visibility-none" data-toggle="animation-appear"
                data-animation-class="animation-fadeInLeft" data-element-offset="-20">
                <h4>
                    <span class="text-muted text-uppercase pull-right">{{$row->namakategori}}</span>
                    <strong>{{ ucwords($row->judul)}}</strong>
                </h4>
                <p>{{ substr($row->deskripsi, 0, 500)}}...</p>
                <button class="btn btn-primary">Detail Ebook</button>
            </div>
        </div>
    </div>
</section>
@endforeach
<section class="site-content site-section">
    <div class="text-center">
        {{ $data->links() }}
    </div>
    </div>
</section>
<!-- END Team Member 5 -->
@endsection