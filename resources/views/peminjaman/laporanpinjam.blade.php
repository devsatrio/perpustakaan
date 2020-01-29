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
                    <h2>List Peminjaman</h2>
                </div>

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
@endsection
@section('js')
<script src="{{asset('assets/js/pages/uiTables.js')}}"></script>
<script>
$(function() {
    UiTables.init();
});
</script>
@endsection