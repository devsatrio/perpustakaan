@extends('layouts_user.master')

@section('token')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('css')
<link href="{{asset('assets/js/plugins/loading.css')}}" rel="stylesheet">
@endsection
@section('content')
<section class="site-section site-section-top site-section-light themed-background-dark">
    <div class="container">
        <h1 class="text-center animation-fadeInQuickInv"><strong>Daftar Semua Buku</strong></h1>
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
                   
                    @foreach($kategori as $row)
                    <a href="{{url('/kategori-buku/'.$row->id)}}" class="btn btn-lg btn-success">{{ ucfirst($row->nama)}} </a>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- END Stats Row -->
    </div>
</section>
@foreach($list as $row)
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
                <a href="{{ url('/detailbuku/'.$row->link.'/detail') }}" class="btn btn-primary">Detail Buku</a>
            </div>
        </div>
    </div>
</section>
@endforeach
<section class="site-content site-section">
    <div class="text-center">
        {{ $list->links() }}
    </div>
    </div>
</section>
@endsection