@extends('layouts.master')

@section('content')
<div id="page-content">
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Laporan Peminjaman</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
            </div>
        </div>
    </div>
    <div class="row loading-div" id="tabelnya">
        <div class="col-md-12">
            <div class="block full">
                <div class="block-title">
                    <h2>Pilih Berdasarkan Tanggal Pinjam</h2>
                </div>
                <form action="{{url('/laporan-peminjaman')}}" method="POST" class="form-inline">
                    @csrf
                    <div class="form-group">
                        <label class="sr-only" for="example-if-email">Tanggal Mulai</label>
                        <input type="text" name="tgl_satu" class="form-control input-datepicker"
                            data-date-format="yyyy-mm-dd" placeholder="tanggal mulai" required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="example-if-password">Sampai Tanggal</label>
                        <input type="text" name="tgl_dua" class="form-control input-datepicker"
                            data-date-format="yyyy-mm-dd" placeholder="tanggal selesai" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-effect-ripple btn-primary"
                            style="overflow: hidden; position: relative;">Tampilkan</button>
                        <button type="reset" class="btn btn-effect-ripple btn-danger"
                            style="overflow: hidden; position: relative;">Reset</button>
                    </div>
                </form>
                <!-- END Inline Form Content -->
            </div>
            <div class="block full">
                <div class="block-title">
                    <h2>List Peminjaman dari tanggal {{$tglsatu}} sampai {{$tgldua}}</h2>
                </div>
                <a href="{{url('/laporan-peminjaman/'.$tglsatu.'/'.$tgldua)}}" class="btn btn-success"><i
                        class="fa fa-download"></i>
                    Export Excel</a>
                <button type="button" id="cetak" class="btn btn-warning"><i class="fa fa-print"></i>
                    Cetak</button>
                <br><br>
                <div class="table-responsive">
                    <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">No</th>
                                <th class="text-center">Peminjam</th>
                                <th class="text-center">judul</th>
                                <th class="text-center">Admin</th>
                                <th class="text-center">Tanggal Pinjam</th>
                                <th class="text-center">Maksimal Pengembalian</th>
                                <th class="text-center">Tanggal Pengembalian</th>
                            </tr>
                        </thead>
                        <tbody id="isitabel">
                            @php
                            $nomer = 1;
                            @endphp
                            @foreach ($data as $value)
                            <tr>
                                <td>{{$nomer++}}</td>
                                <td>{{ $value->nama }}</td>
                                <td>{{ $value->judul }}</td>
                                <td>{{ $value->username }}</td>
                                <td>{{ $value->tgl_pinjam}}</td>
                                <td>{{ $value->tgl_harus_kembali}}</td>
                                <td>{{ $value->tgl_kembali}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="hidden_div" style="display: none;">
    <h2>List Peminjaman dari tanggal {{$tglsatu}} sampai {{$tgldua}}</h2>
    <table border="1">
        <thead>
            <tr>
                <th class="text-center" style="width: 50px;">No</th>
                <th class="text-center">Peminjam</th>
                <th class="text-center">judul</th>
                <th class="text-center">Admin</th>
                <th class="text-center">Tanggal Pinjam</th>
                <th class="text-center">Maksimal Pengembalian</th>
                <th class="text-center">Tanggal Pengembalian</th>
            </tr>
        </thead>
        <tbody id="isitabel">
            @php
            $nomer = 1;
            @endphp
            @foreach ($data as $value)
            <tr>
                <td>{{$nomer++}}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->judul }}</td>
                <td>{{ $value->username }}</td>
                <td>{{ $value->tgl_pinjam}}</td>
                <td>{{ $value->tgl_harus_kembali}}</td>
                <td>{{ $value->tgl_kembali}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('js')
<script src="{{asset('assets/js/pages/uiTables.js')}}"></script>
<script>
$(function() {
    UiTables.init();
    $('#cetak').click(function(e) {
        var divToPrint = document.getElementById('hidden_div');
        var newWin = window.open('', 'Print-Window');
        newWin.document.open();
        newWin.document.write('<html><body onload="window.print();window.close()">' + divToPrint
            .innerHTML + '</body></html>');
        newWin.document.close();
    });
});
</script>
@endsection