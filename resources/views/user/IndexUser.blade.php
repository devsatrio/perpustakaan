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
                                        <h1>User</h1>
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
                                <h2>Daftar User</h2>
                                
                            </div>
                            <button type="button" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;" id="tambah"><i class="fa fa-pencil"></i> Tambah Data</button>
                            <br><br>
                            <div class="table-responsive" id="listdata">
                            
                                    @include('user.user')
                                
                            </div>
                                </div>
                            </div>
                         </div>

                       <div class="row loading-div" style="display: none;" id="halinput">
                         	<div class="col-md-12">
                         		<div class="block">
                                    <!-- Horizontal Form Title -->
                                    <div class="block-title">
                                        
                                        <h2>Tambah Data User</h2>
                                    </div>
                                    <!-- END Horizontal Form Title -->

                                    <!-- Horizontal Form Content -->
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
                                                <input type="text" id="input_alamat" 
                                                name="input_alamat"
                                                class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-email">Email</label>
                                            <div class="col-md-9">
                                                <input type="text" id="input_email" 
                                                name="input_email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-email">No. Telfon</label>
                                            <div class="col-md-9">
                                                <input type="text" id="input_notelp"
                                                name="input_notelp"
                                                 class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-password">Username</label>
                                            <div class="col-md-9">
                                                <input type="text" id="input_user"
                                                name="input_user" class="form-control">
                                                <span class="help-block">minimal 8 karakter, alphanumerik</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-password">Password</label>
                                            <div class="col-md-9">
                                                <input type="password" id="input_pass" name="input_pass" class="form-control">
                                                <span class="help-block">minimal 8 karakter</span>
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
                                        
                                        <h2>Edit Data</h2>
                                    </div>
                                    <form method="post" class="form-horizontal form-bordered" id="formedit" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-email">Username</label>
                                            <div class="col-md-9">
                                                <input type="text" id="edit_username" 
                                                name="edit_username"
                                                class="form-control">
                                            </div>
                                        </div>
                                          <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-email">Nama</label>
                                            <div class="col-md-9">
                                                <input type="text" id="edit_nama" 
                                                name="edit_nama"
                                                class="form-control">
                                                <input type="hidden" name="_method" value="PUT">
                                               <input type="hidden" id="kode_edit" name="kode_edit">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-email">Alamat</label>
                                            <div class="col-md-9">
                                                <input type="text" id="edit_alamat" 
                                                name="edit_alamat"
                                                class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-email">Email</label>
                                            <div class="col-md-9">
                                                <input type="text" id="edit_email"
                                                name="edit_email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-email">No. Telfon</label>
                                            <div class="col-md-9">
                                                <input type="text" id="edit_notelp" 
                                                name="edit_notelp"
                                                class="form-control">
                                                <input type="hidden" id="edit_fotolama" name="edit_fotolama">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-hf-email"></label>
                                            <div class="col-md-9">
                                                
                                                <img id="imageuser" src="{{asset('img/default/noimage.jpg')}}" alt="">
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
                        
                        <!-- END Datatables Block -->
                    </div>
@endsection
@section('js')
<script src="{{asset('assets/js/plugins/loading.js')}}"></script>
<script src="{{asset('assets/js/custom/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/custom/user.js')}}"></script>
@endsection