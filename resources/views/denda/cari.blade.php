@extends('layouts.master')

@section('content')
<div id="page-content">
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Denda</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
            </div>
        </div>
    </div>
    <div class="row loading-div" id="tabelnya">
        <div class="col-md-12">
            <div class="block full">
                <!-- Inline Form Title -->
                <div class="block-title">
                    <h2>Pilih Berdasarkan Tanggal Pengembalian</h2>
                </div>
                <!-- END Inline Form Title -->

                <!-- Inline Form Content -->
                <form action="{{url('/caridenda')}}" method="POST" class="form-inline">
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
                    <h2>List Denda Dari "{{$tglsatu}}" Sampai "{{$tgldua}}" </h2>
                </div>
                <a href="{{url('/denda/'.$tglsatu.'/'.$tgldua)}}" class="btn btn-success"><i class="fa fa-download"></i> Export Excel</a>
                <br><br>
                <div class="table-responsive">
                    <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">No</th>
                                <th>Anggota</th>
                                <th>Judul Buku</th>
                                <th>Tgl Pengembalian</th>
                                <th>Tgl Max Pengembalian</th>
                                <th>Denda Keterlambatan</th>
                                <th>Denda Lain</th>
                                <th>Keterangan</th>
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
                                <td>{{ $value->tgl_kembali}}</td>
                                <td>{{ $value->tgl_harus_kembali}}</td>
                                <td class="text-right">{{"Rp ". number_format($value->denda,0,',','.')}}</td>
                                <td class="text-right">{{"Rp ". number_format($value->denda_lain,0,',','.')}}</td>
                                <td>{{$value->keterangan_denda}}</td>
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
<!-- <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script> -->
<script src="{{asset('assets/js/pages/uiTables.js')}}"></script>
<script>
$(function() {
    UiTables.init();
});
</script>
@endsection