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
    <div class="row loading-div" id="tabelnya">
        <div class="col-md-12">
            <div class="block full">
                <div class="block-title">
                    <h2>Daftar Buku</h2>

                </div>
                <button type="button" class="btn btn-effect-ripple btn-primary"
                    style="overflow: hidden; position: relative;" id="tambah"><i class="fa fa-pencil"></i> Tambah
                    Data</button>
                    <a href="{{ url('cetakkodebuku') }}" class="btn btn-effect-ripple btn-success"><i class="fa fa-tags"></i> Cetak kode QR
                    Data</a>
                <br><br>
                <div class="table-responsive" id="listdata">
                    <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>ISBN</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Kategori</th>
                                <th>Penerbit</th>
                                <th>Jumlah</th>
                                <th class="text-center" style="width: 100px;">Aksi</th>
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
                    <h2>Tambah Data Buku</h2>
                </div>
                <form method="POST" class="form-horizontal form-bordered" id="forminput" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Judul</label>
                        <div class="col-md-9">
                            <input type="text" id="input_judul" name="input_judul" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Kode</label>
                        <div class="col-md-9">
                            <input type="text" id="input_kode" name="input_kode" class="form-control">
                            <span class="text-danger" id="error_kode"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Penulis</label>
                        <div class="col-md-9">
                            <input type="text" id="input_penulis" name="input_penulis" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Halaman</label>
                        <div class="col-md-9">
                            <input type="number" min="0" id="input_halaman" name="input_halaman" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Tanggal Terbit</label>
                        <div class="col-md-9">
                            <input type="text" id="input_tgl" name="input_tgl" class="form-control input-datepicker"
                                data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">ISBN</label>
                        <div class="col-md-9">
                            <input type="text" id="input_isbn" name="input_isbn" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Kategori</label>
                        <div class="col-md-9">
                            <select name="input_kategori" id="input_kategori" class="form-control">
                                @foreach($data as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Bahasa</label>
                        <div class="col-md-9">
                            <input type="text" id="input_bahasa" name="input_bahasa" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Penerbit</label>
                        <div class="col-md-9">
                            <input type="text" id="input_penerbit" name="input_penerbit" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Berat</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <input type="text" onkeypress="return isNumberKey2(event)" id="input_berat"
                                    name="input_berat" class="form-control">
                                <span class="input-group-addon">KG</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Lebar</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <input type="text" onkeypress="return isNumberKey2(event)" id="input_lebar"
                                    name="input_lebar" class="form-control">
                                <span class="input-group-addon">CM</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Jumlah</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <input type="text" onkeypress="return isNumberKey2(event)" id="input_jumlah"
                                    name="input_jumlah" class="form-control">
                                <span class="input-group-addon">Pcs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Lokasi</label>
                        <div class="col-md-9">
                            <textarea id="input_lokasi" name="input_lokasi" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Deskripsi</label>
                        <div class="col-md-9">
                            <textarea id="input_deskripsi" name="input_deskripsi" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Untuk Umum</label>
                        <div class="col-md-9">
                            <div class="checkbox">
                                <label for="example-checkbox1">
                                    <input type="checkbox" id="input_umum" name="input_umum"
                                        value="ya"> ya
                                </label>
                            </div>
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
                <!-- Horizontal Form Title -->
                <div class="block-title">

                    <h2>Edit Data Buku</h2>
                </div>
                <form method="post" class="form-horizontal form-bordered" id="formedit" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Judul</label>
                        <div class="col-md-9">
                            <input type="text" id="edit_judul" name="edit_judul" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Kode</label>
                        <div class="col-md-9">
                            <input type="text" id="edit_kode" name="edit_kode" class="form-control">
                            <input type="hidden" id="edit_kode_lama" name="edit_kode_lama">
                            <span class="text-danger" id="error_edit_kode"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Penulis</label>
                        <div class="col-md-9">
                            <input type="text" id="edit_penulis" name="edit_penulis" class="form-control">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" id="kode_edit" name="kode_edit">
                            <input type="hidden" id="edit_fotolama" name="edit_fotolama">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Halaman</label>
                        <div class="col-md-9">
                            <input type="number" min="0" id="edit_halaman" name="edit_halaman" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Tanggal Terbit</label>
                        <div class="col-md-9">
                            <input type="text" id="edit_tgl" name="edit_tgl" class="form-control input-datepicker"
                                data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">ISBN</label>
                        <div class="col-md-9">
                            <input type="text" id="edit_isbn" name="edit_isbn" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Kategori</label>
                        <div class="col-md-9">
                            <select name="edit_kategori" id="edit_kategori" class="form-control">
                                @foreach($data as $row)
                                <option value="{{$row->id}}">{{$row->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Bahasa</label>
                        <div class="col-md-9">
                            <input type="text" id="edit_bahasa" name="edit_bahasa" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Penerbit</label>
                        <div class="col-md-9">
                            <input type="text" id="edit_penerbit" name="edit_penerbit" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Berat</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <input type="text" onkeypress="return isNumberKey2(event)" id="edit_berat"
                                    name="edit_berat" class="form-control">
                                <span class="input-group-addon">KG</span>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Lebar</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <input type="text" onkeypress="return isNumberKey2(event)" id="edit_lebar"
                                    name="edit_lebar" class="form-control">
                                <span class="input-group-addon">CM</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Jumlah</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <input type="text" onkeypress="return isNumberKey2(event)" id="edit_jumlah"
                                    name="edit_jumlah" class="form-control">
                                <span class="input-group-addon">Pcs</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Lokasi</label>
                        <div class="col-md-9">
                            <textarea id="edit_lokasi" name="edit_lokasi" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Deskripsi</label>
                        <div class="col-md-9">
                            <textarea name="edit_deskripsi" id="edit_deskripsi" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Untuk Umum</label>
                        <div class="col-md-9">
                            <div class="checkbox">
                                <label for="example-checkbox1">
                                    <input type="checkbox" id="edit_umum" name="edit_umum"
                                        value="ya"> ya
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email"></label>
                        <div class="col-md-9">

                            <img id="imagebuku" src="{{asset('img/default/noimage.jpg')}}" style="max-width:100%;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Foto</label>
                        <div class="col-md-9">
                            <input type="file" id="edit_foto" name="edit_foto" accept="image/*">

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
    @endsection
    @section('js')
    <script src="{{asset('assets/js/plugins/loading.js')}}"></script>
    <script src="{{asset('assets/js/custom/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/js/custom/bukuTables .js')}}"></script>
    <script src="{{asset('assets/js/custom/buku.js')}}"></script>
    <script>
    $(function() {
        UiTables.init();
    });
    </script>
    @endsection