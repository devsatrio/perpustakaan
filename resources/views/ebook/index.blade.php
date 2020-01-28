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
                    <h1>Ebook</h1>
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
                    <h2>Daftar Ebook</h2>

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
                                <th>ISBN</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Penerbit</th>
                                <th>Tgl Terbit</th>
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
                <!-- Horizontal Form Title -->
                <div class="block-title">
                    <h2>Tambah Data Ebook</h2>
                </div>
                <form method="POST" class="form-horizontal form-bordered" id="forminput" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Judul</label>
                        <div class="col-md-9">
                            <input type="text" id="input_judul" name="input_judul" class="form-control">
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
                        <label class="col-md-3 control-label" for="example-hf-email">Jumlah Halaman</label>
                        <div class="col-md-9">
                            <input type="number" min="0" id="input_halaman" name="input_halaman" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Bahasa</label>
                        <div class="col-md-9">
                            <input type="text" id="input_bahasa" name="input_bahasa" class="form-control">
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
                        <label class="col-md-3 control-label" for="example-hf-email">Penerbit</label>
                        <div class="col-md-9">
                            <input type="text" id="input_penerbit" name="input_penerbit" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Deskripsi</label>
                        <div class="col-md-9">
                            <textarea id="input_deskripsi" name="input_deskripsi" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">Foto</label>
                        <div class="col-md-9">
                            <input type="file" id="input_foto" name="input_foto">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">File PDF</label>
                        <div class="col-md-9">
                            <input type="file" id="input_pdf" name="input_pdf">
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
                    <h2>Edit Data Ebook</h2>
                </div>
                <form method="post" class="form-horizontal form-bordered" id="formedit" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Judul</label>
                        <div class="col-md-9">
                            <input type="text" id="edit_judul" name="edit_judul" class="form-control">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" id="kode_edit" name="kode_edit">
                            <input type="hidden" id="edit_fotolama" name="edit_fotolama">
                            <input type="hidden" id="edit_filelama" name="edit_filelama">
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
                        <label class="col-md-3 control-label" for="example-hf-email">Jumlah Halaman</label>
                        <div class="col-md-9">
                            <input type="number" min="0" id="edit_halaman" name="edit_halaman" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Bahasa</label>
                        <div class="col-md-9">
                            <input type="text" id="edit_bahasa" name="edit_bahasa" class="form-control">
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
                        <label class="col-md-3 control-label" for="example-hf-email">Penerbit</label>
                        <div class="col-md-9">
                            <input type="text" id="edit_penerbit" name="edit_penerbit" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-email">Deskripsi</label>
                        <div class="col-md-9">
                            <textarea name="edit_deskripsi" id="edit_deskripsi" class="form-control"></textarea>
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
                            <input type="file" id="edit_foto" name="edit_foto">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-hf-password">File PDF</label>
                        <div class="col-md-9">
                            <input type="file" id="edit_pdf" name="edit_pdf">
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
    <script src="{{asset('assets/js/custom/ebookTables.js')}}"></script>
    <script src="{{asset('assets/js/custom/ebook.js')}}"></script>
    <script>
    $(function() {
        UiTables.init();
    });
    </script>
    @endsection