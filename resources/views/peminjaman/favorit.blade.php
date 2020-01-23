@extends('layouts.master')

@section('content')
<div id="page-content">
                        <!-- Table Styles Header -->
                        <div class="content-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="header-section">
                                        <h1>Statistik</h1>
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
                                <h2>Buku Favorit</h2>
                                
                            </div>
                            <div class="table-responsive">
                             <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 50px;">No</th>
                                        <th>Judul</th>
                                         <th>Penulis</th>
                                        <th>Jumlah Peminjaman</th>
                                        <th>Bulan</th>
                                    </tr>
                                </thead>
                                <tbody id="isitabel">
                                    @php
                                    $nomer = 1;
                                    @endphp
                                     @foreach ($data as $value)
                                        <tr>
                                            <td>{{$nomer++}}</td>
                                            <td>{{ $value->judul }}</td>
                                            <td>{{ $value->penulis }}</td>
                                            <td>{{ $value->jumlah}} Kali Peminjaman</td>
                                            <td>{{$value->bulan}}-{{$value->tahun}}</td>
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
