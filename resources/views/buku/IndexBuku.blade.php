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
                            <button type="button" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;" id="tambah"><i class="fa fa-pencil"></i> Tambah Data</button>
                            <br><br>
                            <div class="table-responsive" id="listdata">
                            
                                    @include('buku.Buku')
                                
                            </div>
                                </div>
                            </div>
                         </div>
                        
                        <div class="row loading-div" style="display: none;" id="halinput">
                            <div class="col-md-12">
                                <div class="block">
                                    <!-- Horizontal Form Title -->
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
                                            <label class="col-md-3 control-label" for="example-hf-email">Penulis</label>
                                            <div class="col-md-9">
                                                <input type="text" id="input_penulis" 
                                                name="input_penulis"
                                                class="form-control">
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-password">Foto</label>
                                            <div class="col-md-9">
                                                <input type="file" id="input_foto"
                                                name="input_foto">
                                            </div>
                                        </div>
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-effect-ripple btn-primary" id="simpan">Simpan</button>
                                                <button type="button" class="btn btn-effect-ripple btn-danger" id="kembali">Kembali</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END Horizontal Form Content -->
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
                                                <input type="text" id="edit_judul" 
                                                name="edit_judul"
                                                class="form-control">
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-email">Penulis</label>
                                            <div class="col-md-9">
                                                <input type="text" id="edit_penulis" 
                                                name="edit_penulis"
                                                class="form-control">
                                                <input type="hidden" name="_method" value="PUT">
                                               <input type="hidden" id="kode_edit" name="kode_edit">
                                               <input type="hidden" id="edit_fotolama" name="edit_fotolama">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-email"></label>
                                            <div class="col-md-9">
                                                
                                                <img id="imagebuku" src="{{asset('img/default/noimage.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-email">Foto</label>
                                            <div class="col-md-9">
                                                <input type="file" id="edit_foto" 
                                                name="edit_foto">

                                            </div>
                                        </div>

                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-effect-ripple btn-primary" id="btnedit">Simpan</button>
                                                <button type="reset" class="btn btn-effect-ripple btn-danger" id="kembaliedit">Kembali</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END Horizontal Form Content -->
                            </div>
                            </div>
                         </div>
                    </div>
@endsection
@section('js')
<script src="{{asset('assets/js/plugins/loading.js')}}"></script>
<script src="{{asset('assets/js/custom/sweetalert.min.js')}}"></script>

<script src="{{asset('assets/js/custom/buku.js')}}"></script>
@endsection