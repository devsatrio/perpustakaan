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

@foreach($hasil as $row)
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
                    <span class="text-muted text-uppercase pull-right">{{$row->kategori}}</span>
                    <strong>{{ ucwords($row->judul)}}</strong>
                </h4>
                <p>{{ substr($row->deskripsi, 0, 500)}}...</p>
                @if($row->tipe == 'Book')
                <a href="{{ url('/detailbuku/'.$row->link.'/detail') }}" class="btn btn-primary">Detail Buku</a>
                @else
                <a href="{{ url('/detail-ebook/'.$row->link) }}" class="btn btn-primary">Detail Buku</a>
                @endif
            </div>
        </div>
    </div>
</section>
@endforeach
<section class="site-content site-section">
    <div class="text-center">
        {{ $hasil->links() }}
    </div>
    </div>
</section>
<section class="site-content site-section overflow-hidden border-bottom">
    <div class="container">
    <div class="text-center visibility-none" data-toggle="animation-appear"
                data-animation-class="animation-fadeInRight" data-element-offset="-20">
          <a onclick="window.history.go(-1);" class="btn btn-danger btn-lg text-white">Kembali</a>
    </div>
    </div>
    <br>
</section>
@endsection