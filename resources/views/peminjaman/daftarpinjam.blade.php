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
                                        <h1>Peminjaman</h1>
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
                                <h2>Daftar Peminjaman</h2>
                                
                            </div>
                            <div class="table-responsive" id="listdata">
                            
                                    @include('peminjaman.listpinjam')
                                
                            </div>
                                </div>
                            </div>
                         </div>
                    </div>
                    <div id="modal-fade" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h3 class="modal-title"><strong>Oops, Anggota ini telat mengembalikan</strong></h3>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" id="kode_user">
                                                    <input type="hidden" id="kode">
                                                    <div class="form-group">
                                            <label for="example-nf-email">Masukan Denda</label>
                                            <input type="text" id="jumlah" class="form-control">
                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-effect-ripple btn-primary" id="simpandenda">Save</button>
                                                    <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

@endsection
@section('js')
<script src="{{asset('assets/js/plugins/loading.js')}}"></script>
<script src="{{asset('assets/js/custom/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/custom/daftarpinjam.js')}}"></script>
@endsection