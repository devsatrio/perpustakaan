@extends('layouts.master')

@section('css')
@endsection
@section('content')
<div id="page-content">
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Cetak kode QR Buku</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">

            </div>
        </div>
    </div>
    <div class="row" id="tabelnya">
        <div class="col-md-12">
            <a href="{{url('cetakkodebuku/all')}}" target="blank()" class="btn btn-warning">Cetak Semua</a>
        </div><br><br>
        @foreach($data as $row)
        <div class="col-sm-3">
            <div class="widget">
                <div class="widget-content themed-background text-light-op">
                    <strong>{{$row->judul}} ({{$row->kode}})</strong>
                </div>
                <div class="widget-image widget-image-sm text-center">
                    @php
                    $qrdata = "kode buku : ".$row->kode."\nISBN : ".$row->isbn."\njudul : ".$row->judul;
                    @endphp
                    {!! QrCode::size(280)->generate($qrdata) !!}
                </div>
                <div class="widget-content text-dark">
                    <div class="row text-center">
                        <a href="{{url('cetakkodebuku/'.$row->kode.'/cetak')}}" target="blank()" class="btn btn-block btn-success"><i
                                class="fa fa-print"></i> Cetak Sekali</a>
                        <a href="{{url('cetakkodebukubanyak/'.$row->kode)}}" target="blank()" class="btn btn-block btn-warning"><i
                                class="fa fa-print"></i> Cetak Sejumlah Buku</a>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
        <div class="col-md-12 text-center">
            {{$data->links()}}
        </div>
    </div>
   
    @endsection
    @section('js')
    <script>
    $(function() {
        $('.cetakkode').click(function(e) {
            var kode = $(this).attr('data-kode');
            var divToPrint = document.getElementById('hidden_div' + kode);
            var newWin = window.open('', 'Print-Window');
            newWin.document.open();
            newWin.document.write('<html><body onload="window.print();window.close()">' + divToPrint
                .innerHTML + '</body></html>');
            newWin.document.close();
        });
        $('.cetakkodebanyak').click(function(e) {
            var kode = $(this).attr('data-kode');
            var divToPrint = document.getElementById('hidden_div_banyak' + kode);
            var newWin = window.open('', 'Print-Window');
            newWin.document.open();
            newWin.document.write('<html><body onload="window.print();window.close()">' + divToPrint
                .innerHTML + '</body></html>');
            newWin.document.close();
        });
    });
    </script>
    @endsection