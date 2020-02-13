@extends('layouts.master')

@section('content')
<div id="page-content">
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Log History Ebook</h1>
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
                    <h2>{{$ebook->judul}}</h2>
                </div>
                <div class="table-responsive">
                    <table id="example-datatable" class="table table-striped table-bordered table-vcenter">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">No</th>
                                <th>Nama</th>
                                <th>Telp</th>
                                <th>Tanggal Baca</th>
                                <th>Browser</th>
                                <th>IP</th>
                                <th>Device</th>
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
                                <td>{{ $value->notelp }}</td>
                                <td>{{$value->tanggal}}</td>
                                <td>{{$value->browser}}</td>
                                <td>{{$value->ip}}</td>
                                <th>{{$value->tipe}}</th>
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
<script src="{{asset('assets/js/pages/uiTables.js')}}"></script>
<script>
$(function() {
    UiTables.init();
});
</script>
@endsection