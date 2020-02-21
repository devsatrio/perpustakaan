
            @if(Auth::guard('anggota')->check())
            <div class="col-md-8 col-md-offset-2">
                <article class="site-block">
                    <iframe width="100%" height="100%" src="{{ asset('/ViewerJS/#../fileebook/'.$data->ebook) }}">
                </article>
            </div>
            @else
            <div class="col-md-8 col-md-offset-2 text-center">
                <h1 class="text-danger"><b>Maaf, Anda Harus Login</b></h1>
            </div>
            @endif
        