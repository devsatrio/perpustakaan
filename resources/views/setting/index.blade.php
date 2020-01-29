@extends('layouts.master')

@section('content')
<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>Setting</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">

            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-md-12">
        <div class="block">
            <!-- Horizontal Form Title -->
            <div class="block-title">
                <h2>Edit Setting</h2>
            </div>
            @if (session('status'))
            <div class="alert alert-block alert-success alert-dismissible  fade in">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('status') }}
            </div>
            @endif
            <form method="POST" class="form-horizontal form-bordered" id="forminput" action="{{url('/setting')}}"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">Landing Text</label>
                    <div class="col-md-9">
                        <input type="text" name="landing" class="form-control" value="{{$setting->landing_text}}"
                            required>
                        <input type="hidden" name="kode" value="{{$setting->id}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">Sub Landing Text</label>
                    <div class="col-md-9">
                        <input type="text" name="sublanding" value="{{$setting->sublanding_text}}" class="form-control"
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-email">Denda Perhari</label>
                    <div class="col-md-9">
                        <input type="number" min="0" name="denda" class="form-control" value="{{$setting->denda}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="example-hf-password">Landing Image</label>
                    <div class="col-md-9">
                        @if($setting->gambar !='' )
                        <img src="{{asset('img/setting/'.$setting->gambar)}}" style="max-width:50%;">
                        @endif
                        <input type="file" id="input_foto" name="input_foto" accept="image/*">
                        <input type="hidden" name="foto_lama" value="{{$setting->gambar}}">
                    </div>
                </div>
                <div class="form-group form-actions">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-effect-ripple btn-primary" id="simpan">Simpan</button>
                        <button type="reset" class="btn btn-effect-ripple btn-danger" id="kembali">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection