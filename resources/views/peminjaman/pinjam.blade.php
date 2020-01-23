@extends('layouts.master')

@section('token')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('css')
 <link href="{{asset('assets/js/plugins/loading.css')}}" rel="stylesheet">
@endsection
@section('content')
<div id="page-content">
                        <div class="content-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="header-section">
                                        <h1>Peminjaman Buku</h1>
                                    </div>
                                </div>
                                <div class="col-sm-6 hidden-xs">
                                  
                                </div>
                            </div>
                        </div>

                       <div class="row loading-div" id="halinput">
                         	<div class="col-md-12">
                         		<div class="block">
                                    <!-- Horizontal Form Title -->
                                    <div class="block-title">
                                        <h2>
                                        Tambah Data Peminjaman Buku
                                        </h2>
                                    </div>
                                    <form class="row form-bordered">
                                        <div class="form-group col-md-6">
                                            <label for="example-nf-email">Cari Anggota</label>
                                            <select id="cari_anggota" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Cari Nama Anggota..">
                                            </select>
                                          
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="example-nf-email">Nama</label>
                                            <input type="text" id="nama_anggota" class="form-control" readonly>
                                          <input type="hidden" id="kode_anggota">
                                          <input type="hidden" id="kode_buku">
                                          <input type="hidden" id="kodeuser" value="{{ Auth::user()->id }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="example-nf-email">Alamat</label>
                                            <input type="text" id="alamat_anggota" class="form-control" readonly>
                                          
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="example-nf-email">No. Telpon</label>
                                            <input type="text" id="telp_anggota" class="form-control" readonly>
                                          
                                        </div>
                                         <div class="form-group col-md-12">
                                            <label for="example-nf-email">Cari Buku</label>
                                            <select id="buku" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Cari Judul Buku..">
                                            </select>
                                            
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="example-nf-email">Judul</label>
                                            <input type="text" id="judul_buku" class="form-control" readonly>
                                          
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="example-nf-email">Penulis</label>
                                            <input type="text" id="penulis_buku" class="form-control" readonly>
                                          
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="example-nf-email">Tanggal Pinjam</label>
                                            <input type="text" id="tanggal_pinjam" class="form-control" readonly  value="{{date('Y-m-d')}}">
                                        </div>
                                        
                                       <div class="form-group col-md-6">
                                        <label for="example-nf-email">Tanggal Kembali</label>
                                                <input type="text" id="tanggal_kembali" name="example-datepicker3" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                                       </div>
                                       <div class="form-group form-actions">
                                        <br><br>
                                           <button class="btn btn-primary" type="button" id="btnsimpan">Simpan</button>
                                           <button type="button" class="btn btn-danger" onclick="window.history.go(-1);">Kembali</button>
                                        </div>
                                    </form>
                                     
                        	</div>
                         	</div>
                         </div>
                        
                        <!-- END Datatables Block -->
                    </div>
@endsection
@section('js')
<script src="{{asset('assets/js/plugins/loading.js')}}"></script>
<script src="{{asset('assets/js/custom/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/custom/peminjaman.js')}}"></script>
@endsection