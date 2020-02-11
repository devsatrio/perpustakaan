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
            <button id="cetaksemua" class="btn btn-warning"><i class="fa fa-print"></i> Cetak Semua</button>
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
                        <button class="btn btn-block btn-success cetakkode" data-kode="{{$row->kode}}"><i
                                class="fa fa-print"></i> Cetak</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="hidden_div{{$row->kode}}" style="display: none;">
            {!! QrCode::size(150)->generate($qrdata) !!}
        </div>
        @endforeach
        <div class="col-md-12 text-center">
            {{$data->links()}}
        </div>
    </div>
    <div id="hidden_divall" style="display: none;">
        <table>
            <tr>
                @php
                $count = count($data);
                $columns = 4;
                @endphp

                @foreach($data as $i => $row)
                <td align="center">
                    @php
                    $qrdata = "kode buku : ".$row->kode."\nISBN : ".$row->isbn."\njudul : ".$row->judul;
                    @endphp
                    {!! QrCode::size(180)->generate($qrdata) !!}
                    <br>
                    {{$row->judul}} ({{$row->kode}})
                </td>

                @php
                $i++;
                if($i != $count && $i >= $columns && $i % $columns == 0){
                    echo '</tr><tr>';
                }
                @endphp

            
                @endforeach
            </tr>
        </table>

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
            $('#cetaksemua').click(function(e) {
                var divToPrint = document.getElementById('hidden_divall');
                var newWin = window.open('', 'Print-Window');
                newWin.document.open();
                newWin.document.write('<html><body onload="window.print();window.close()">' + divToPrint
                    .innerHTML + '</body></html>');
                newWin.document.close();
            });
        });
        </script>
        @endsection