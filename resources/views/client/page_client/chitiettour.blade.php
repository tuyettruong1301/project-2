@extends('client.layout_client.master_client')

@section('content')
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<div class="postcontent nobottommargin clearfix">
				@if($cttour)
					@if($cttour->trangthaitour != 0)
					<div class="single-post nobottommargin">
					
						<div class="entry clearfix">

							<div class="entry-title">
								<h1>{{$cttour->tentour}}</h1>
							</div>

							<ul class="entry-meta clearfix">
								<li><a><i class="icon-calendar3"></i> {{date('d M Y',strtotime($cttour->created_at))}}</a></li>
								<li><a><i class="icon-user"></i> {{$cttour->users->email}}</a></li>
								<li><a><i class="icon-folder-open"></i> {{$cttour->diadiem->tendiadiem}}</a></li>
								<li><a><i class="icon-comments"></i> {{$cttour->binhluan->count()}} Comments</a></li>		
							</ul>
							<ul class="entry-meta clearfix">
								<li><a>Ngay tham quan: {{$cttour->songaydi}} ngay</a></li>
								<li><a>So khach toi da: {{$cttour->sokhachtoida}} nguoi</a></li>
							</ul>

							<div class="entry-image">
								<a><img src="upload/{{$cttour->hinhanh}}" alt="Blog Single"></a>
							</div>

							<div class="entry-content notopmargin">
								{!! $cttour->mota !!}
							</div>			
						</div>

						<div class="post-navigation clearfix text-center">
							@if(Auth::check())
								@if(Auth::user()->quyen == 1)
									<em>{{number_format($cttour->giatour)}} VND</em><a data-toggle="modal" data-target="#DatTour"><i class="icon-shopping-cart"></i></a>
								@endif
							@else
								<em>{{number_format($cttour->giatour)}} VND</em><a data-toggle="modal" data-target="#DangNhap"><i class="icon-shopping-cart"></i></a>
							@endif
						</div>

						<div class="row">
							<div class="col-sm-12">			
								<ul class="nav nav-tabs">
									<li><a href="#danhgia" data-toggle="tab" id="dg">Đánh giá</a></li>
									<li><a href="#comments" data-toggle="tab" id="bl">Bình luận</a></li>		
									<li><a href="#thongtinhdv" data-toggle="tab" id="tthdv">Hướng dẫn viên</a></li>
								</ul>
							</div>
						</div>

					</div>
					@else
					<h1 class="text-center title">Tour da bi xoa</h1><br><br>
					@endif
				@else
					<h1 class="text-center title">Khong ton tai tour nay</h1>
				@endif
			</div>		
			@include('client.page_client.sidebar_chitiet')
		</div>
	</div>
</section>


@endsection
