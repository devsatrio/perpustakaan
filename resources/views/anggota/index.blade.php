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
                    <h1>Anggota</h1>
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
                    <h2>Daftar Anggota</h2>
                </div>
                <button type="button" class="btn btn-effect-ripple btn-primary"
                    style="overflow: hidden; position: relative;" id="tambah"><i class="fa fa-pencil"></i> Tambah
                    Data</button>
                <br><br>
                <div class="table-responsive" id="listdata">
                    <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Status</th>
                                <th>Alamat</th>
                                <th>No. Telp</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row loading-div" style="display: none;" id="halinput">
        <div class="col-md-12">
            <div class="block">
                <div class="block-title">
                    <h2>Tambah Data Anggota</h2>
                </div>
                <form method="POST" class="form-horizontal form-bordered" id="forminput" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Nama</label>
                        <div class="col-md-9">
                            <input type="text" id="input_nama" name="input_nama" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Alamat</label>
                        <div class="col-md-9">
                            <input type="text" id="input_alamat" name="input_alamat" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">No. Telfon</label>
                        <div class="col-md-9">
                            <input type="number" min="0" id="input_notelp" name="input_notelp" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Status Anggota</label>
                        <div class="col-md-9">
                            <select name="input_status" class="form-control" id="input_status">
                                <option value="Umum">Umum</option>
                                <option value="Karyawan">Karyawan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Username</label>
                        <div class="col-md-9">
                            <input type="text" id="input_user" name="input_user" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Password</label>
                        <div class="col-md-9">
                            <input type="password" id="input_pass" name="input_pass" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Konfirmasi Password</label>
                        <div class="col-md-9">
                            <input type="password" id="input_kpass" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Foto</label>
                        <div class="col-md-9">
                            <input type="file" id="input_foto" name="input_foto" accept="image/*">
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-effect-ripple btn-primary" id="simpan">Simpan</button>
                            <button type="reset" class="btn btn-effect-ripple btn-danger" id="kembali">Kembali</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row loading-div" style="display: none;" id="haledit">
        <div class="col-md-12">
            <div class="block">
                <div class="block-title">
                    <h2>Edit Data</h2>
                </div>
                <form method="POST" class="form-horizontal form-bordered" id="formedit" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Username</label>
                        <div class="col-md-9">
                            <input type="text" id="edit_username" name="edit_username" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Nama</label>
                        <div class="col-md-9">
                            <input type="text" id="edit_nama" name="edit_nama" class="form-control">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" id="kode_edit" name="kode_edit">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Alamat</label>
                        <div class="col-md-9">
                            <input type="text" id="edit_alamat" name="edit_alamat" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">No. Telfon</label>
                        <div class="col-md-9">
                            <input type="number" min="0" id="edit_notelp" name="edit_notelp" class="form-control">
                            <input type="hidden" id="edit_fotolama" name="edit_fotolama">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Status Anggota</label>
                        <div class="col-md-9">
                            <select name="edit_status" class="form-control" id="edit_status">
                                <option value="Umum">Umum</option>
                                <option value="Karyawan">Karyawan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">*Password Baru</label>
                        <div class="col-md-9">
                            <input type="password" id="edit_password" name="edit_password" class="form-control"
                                placeholder="Isi apabila ingin mengganti password lama">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">*Konfirmasi Password Baru</label>
                        <div class="col-md-9">
                            <input type="password" id="edit_kpassword" name="edit_kpassword" class="form-control"
                                placeholder="Isi apabila ingin mengganti password lama">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email"></label>
                        <div class="col-md-9">
                            <img id="imageuser" src="{{asset('img/default/noimage.jpg')}}" style="max-width:200px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">*Foto</label>
                        <div class="col-md-9">
                            <input type="file" id="edit_foto" name="edit_foto" accept="image/*">
                            <span class="text-muted">isi apabila ingin mengganti foto</span>
                        </div>
                    </div>

                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-effect-ripple btn-primary" id="btnedit">Simpan</button>
                            <button type="reset" class="btn btn-effect-ripple btn-danger"
                                id="kembaliedit">Kembali</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('assets/js/plugins/loading.js')}}"></script>
<script src="{{asset('assets/js/custom/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/custom/anggotaTables.js')}}"></script>
<script src="{{asset('assets/js/custom/anggota.js')}}"></script>
<script>
$(function() {
    UiTables.init();
});
</script>
@endsection