@extends('layouts_user.master')

@section('token')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')

<section class="site-section site-section-top site-section-light themed-background-dark">
    <div class="container">
        <h1 class="text-center animation-fadeInQuickInv"><strong>Daftar Semua Buku</strong></h1>
    </div>
</section>
<section class="site-content site-section-mini themed-background-default">
                <div class="container">
                    <!-- Stats Row -->
                    <div class="row">
                    	<div></div>
                    	<div></div>
                        <!-- <div class="col-xs-6">
                            <div class="counter site-block">
                                <span>30</span>
                                <small>Pages</small>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="counter site-block">
                                <span>27</span>
                                <small>Customers</small>
                            </div>
                        </div> -->
                    </div>
                    <!-- END Stats Row -->
                </div>
            </section>
<section class="site-content site-section themed-background-muted">
                <div class="container">
                    <div class="site-block">
                        <form action="search_results.html" method="post">
                            <div class="input-group input-group-lg">
                                <input type="text" id="site-search" name="site-search" class="form-control" placeholder="Search Site..">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

<section class="site-content site-section overflow-hidden border-bottom">
	
    <div class="container">
    	
        <div class="row row-items">
        	@foreach($list as $row)
            <div class="col-md-2 col-md-offset-2 text-center visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInRight" data-element-offset="-20">
                <!-- <img src="img/placeholders/avatars/avatar7@2x.jpg" alt="" class="img-circle img-thumbnail img-thumbnail-avatar-2x"> -->
                <img src="{{asset('img/buku/'.$row->gambar)}}" style="max-width:100%;max-height:150px;">
            </div>
            <div class="col-md-6 visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInLeft" data-element-offset="-20">
                <h4>
                    <span class="text-muted text-uppercase pull-right">{{$row->tanggal_terbit}}</span>
                    <strong>{{ ucwords("$row->judul") }}</strong>
                </h4>
                    <p>{{$row->deskripsi}}</p>
                    <a href="{{url('/detailbuku/'.$row->link.'/detail')}}"><button class="btn btn-success">Detail</button></a>

            </div>
            @endforeach
            <hr>
            <div class="text-center visibility-none" data-toggle="animation-appear" data-animation-class="animation-fadeInRight" data-element-offset="-20">
				<ul class="pagination">
   					<li class="active">{{ $list->links() }}</li>
				</ul>
			</div>
		</div>
	</div>
</section>


@endsection