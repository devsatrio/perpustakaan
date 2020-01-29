@extends('layouts_user.master')

@section('token')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')

<section class="site-section site-section-top site-section-light themed-background-dark">
				@foreach($kategori as $row)
                <div class="container">
                    <h1 class="text-center animation-fadeInQuickInv"><strong>Kategori : {{ucfirst($row->kategori)}}</strong></h1>
                </div>
                @endforeach
            </section>
            
            <!-- END Intro -->

            <!-- Latest Posts -->
            <section class="site-content site-section">
                <div class="container">
                    <div class="row row-items">
                    	@foreach($data as $row)
                        <div class="col-md-4">
                            <a href="{{ url('/detailbuku/'.$row->link.'/detail') }}" class="post">
                                <div class="post-image">
                                    <img src="{{asset('img/buku/'.$row->gambar)}}" alt="" class="img-responsive">
                                </div>
                                <div class="text-muted pull-right">{{$row->tanggal_terbit}}</div>
                                <h2 class="h4">
                                    <strong>{{$row->judul}}</strong>
                                </h2>
                                <p>{{ substr($row->deskripsi, 0, 100)}}...</p>
                            </a>
                        </div>
                        @endforeach
                        
                    </div>
                    <div class="text-center">
                        <ul class="pagination">
                            <!-- <li class="active"><a href="javascript:void(0)">1</a></li>
                            <li><a href="javascript:void(0)">2</a></li>
                            <li><a href="javascript:void(0)">3</a></li>
                            <li><span>...</span></li>
                            <li><a href="javascript:void(0)">20</a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-chevron-right"></i></a></li> -->
                            {{$data->links()}}
                        </ul>
                    </div>
                </div>
            </section>
@endsection