@extends('layouts.master')

@section('token')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('css')
<link href="{{asset('assets/js/plugins/loading.css')}}" rel="stylesheet">
@endsection
@section('content')
<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Buku</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">

            </div>
        </div>
    </div>
    <!-- END Table Styles Header -->
    <div class="row">
        <div class="col-md-8">
            <div class="loading-div" id="tabelnya">
                <div class="block full">
                    <div class="block-title">
                        <h2>Daftar Kategori</h2>
                    </div>
                    <div class="table-responsive" id="listdata">
                        <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th class="text-center" style="width: 100px;">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="loading-div" id="halinput">
                <div class="block full">
                    <div class="block-title">
                        <h2>Form Kategori</h2>
                    </div>
                    <form method="post" class="form-horizontal form-bordered" id="forminput">
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="example-hf-email">Nama</label>
                            <div class="col-md-9">
                                <input type="text" id="input_nama" name="input_nama" class="form-control">
                                <input type="hidden" id="input_aksi" name="input_aksi" value="tambah">
                                <input type="hidden" id="input_kode" name="input_kode">
                            </div>
                        </div>
                        <div class="form-group form-actions">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="submit" class="btn btn-effect-ripple btn-primary"
                                    id="simpan">Simpan</button>
                                <button type="reset" class="btn btn-effect-ripple btn-warning">Bersih</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('assets/js/plugins/loading.js')}}"></script>
<script src="{{asset('assets/js/custom/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/custom/kategoriTables.js')}}"></script>
<script src="{{asset('assets/js/custom/kategori.js')}}"></script>
<script>
$(function() {
    UiTables.init();
});
</script>
@endsection