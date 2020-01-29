@extends('layouts_user.master')

@section('content')

<section class="site-section site-section-top site-section-light themed-background-dark">
    <div class="container">
        <h1 class="text-center animation-fadeInQuickInv"><strong>Baca E-Book</strong></h1>
    </div>
</section>
<section class="site-content site-section border-bottom">
    <div class="container">
        <div class="row">
            @if(Auth::guard('anggota')->check())
            <div class="col-md-8 col-md-offset-2">
                <article class="site-block">
                    <h3 class="push-top text-center"><strong>{{ucwords($data->judul)}}</strong></h3>
                    <iframe width="100%" height="800px" src="{{ asset('/ViewerJS/#../fileebook/'.$data->ebook) }}">
                </article>
            </div>
            @else
            <div class="col-md-8 col-md-offset-2 text-center">
                <h1 class="text-danger"><b>Maaf, Anda Harus Login</b></h1>
            </div>
            @endif
        </div>
    </div>
    <br>
</section>

@endsection