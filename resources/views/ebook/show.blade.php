@extends('layouts.master')

@section('token')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div id="page-content">
    <!-- User Profile Row -->
    <div class="row">
        <div class="col-md-5 col-lg-4">
            <div class="widget">
                <div class="widget-image widget-image-sm">
                    <img src="{{asset('img/buku/'.$data->gambar)}}" alt="image">
                    <div class="widget-image-content text-center">
                        <img src="{{asset('img/buku/'.$data->gambar)}}" alt="avatar"
                            class="img-circle img-thumbnail img-thumbnail-transparent img-thumbnail-avatar-2x push">
                        <h2 class="widget-heading text-light"><strong>{{$data->judul}}</strong></h2>
                        <h4 class="widget-heading text-light-op"><em>{{$data->namakategori}}</em></h4>
                    </div>
                </div>
                <div class="widget-content widget-content-full border-bottom">
                    <div class="row text-center">
                        <div class="col-xs-12 push-inner-top-bottom border-right">
                            <h3 class="widget-heading"><i class="gi gi-heart text-danger push"></i>
                                <br><small><strong>{{$data->dibaca}} kali </strong>Dibaca</small></h3>
                        </div>
                    </div>
                </div>
                <div class="widget-content border-bottom">
                    <h4>ISBN</h4>
                    <p>{{$data->isbn}}</p>
                    <h4>Halaman</h4>
                    <p>{{$data->halaman}}</p>
                    <h4>Lokasi</h4>
                    <p>{{$data->lokasi}}</p>
                    <h4>Tanggal Terbit</h4>
                    <p>{{$data->tanggal_terbit}}</p>
                    <h4>Bahasa</h4>
                    <p>{{$data->bahasa}}</p>
                    <h4>Penerbit</h4>
                    <p>{{$data->penerbit}}</p>
                    <h4>Untuk Umum</h4>
                    <p>{{$data->umum}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-7 col-lg-8">
            <div class="block full">
                <div class="block-title">
                    <ul class="nav nav-tabs" data-toggle="tabs">
                        <li class="active"><a href="#profile-activity">Riwayat Peminjaman</a></li>
                        <li><a href="#profile-gallery">Deskripsi</a></li>
                    </ul>
                </div>
                <div class="tab-content">

                    <div class="tab-pane active" id="profile-activity">
                        <div class="text-center">

                            <p class="text-muted">15 Pembaca terakhir</p>
                        </div>
                        <div class="block-content-full">
                            <table class="table table-striped table-borderless table-vcenter remove-margin-bottom">
                                <tbody>
                                    @foreach($pembaca as $row)
                                    <tr class="animation-fadeInQuick2">
                                        <td class="text-center" style="width: 100px;"><img
                                                src="{{asset('img/anggota/'.$row->gambar)}}" alt="avatar"
                                                class="img-circle img-thumbnail img-thumbnail-avatar"></td>
                                        <td>
                                            <h4><strong>{{$row->nama}}</strong></h4>
                                            <i class="fa fa-fw fa-user text-danger"></i> {{$row->status_anggota}}<br>
                                            <i class="fa fa-fw fa-calendar text-info"></i> {{$row->tanggal}}
                                        </td>
                                        
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="profile-gallery">
                        {{$data->deskripsi}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection