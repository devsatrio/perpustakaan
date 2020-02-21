@extends('layouts.master')
@section('css')
@endsection
@section('content')
<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Cari Statistik</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="loading-div" id="halinput">
                <div class="block full">
                    <div class="block-title">
                        <h2>Input Tanggal</h2>
                    </div>
                    <form method="post" action="{{url('/statistik/bulan')}}" class="form-horizontal form-bordered" id="forminput">
                        <div class="form-group">
                            <label for="example-nf-email">Tanggal Mulai</label>
                            <input type="text" name="tgl_satu"
                                class="form-control input-datepicker" data-date-format="yyyy-mm-dd"
                                placeholder="yyyy-mm-dd" required>
                        </div>
                        {{@csrf_field()}}
                        <div class="form-group">
                            <label for="example-nf-email">Sampai Tanggal</label>
                            <input type="text" name="tgl_dua"
                                class="form-control input-datepicker" data-date-format="yyyy-mm-dd"
                                placeholder="yyyy-mm-dd" required>
                        </div>
                        <div class="form-group form-actions">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-effect-ripple btn-primary"
                                    id="simpan">Tampilkan</button>
                                <button type="reset" onclick="history.go(-1)" class="btn btn-effect-ripple btn-danger">Kembali</button>
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
@endsection