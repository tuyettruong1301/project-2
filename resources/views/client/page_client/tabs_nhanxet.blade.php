<div id="comments" class="clearfix" style="display: none">	
	<ol class="commentlist clearfix" id="listComment">
		@if($cttour->binhluan->count() > 0)
			@foreach($cttour->binhluan as $comment)
				@if($comment->parent_id == 0)
				<li class="comment even thread-even depth-1" id="li-comment-{{$comment->id}}">
					<div id="comment-{{$comment->id}}" class="comment-wrap clearfix">
						<div class="comment-meta">
							<div class="comment-author vcard">
								<span class="comment-avatar clearfix">
									<img alt='' src='upload/{{$comment->users->anhdaidien}}' class='avatar avatar-60 photo avatar-default' height='60' width='60' />
								</span>
							</div>
						</div>
						<div class="comment-content clearfix">
							<div class="comment-author"><a>{{$comment->users->hoten}}</a>
								<span><a>April 24, 2012 at 10:46 am</a></span>
							</div>
							<p>{!! $comment->noidung !!}</p>
						</div>
						<div class="clear"></div>
					</div>
					<ul class='children' id="children-{{$comment->id}}">
						@foreach($cttour->binhluan as $reply)
							@if($reply->parent_id == $comment->id)
							<li class="comment byuser comment-author-_smcl_admin odd alt depth-2">
								<div class="comment-wrap clearfix">
									<div class="comment-meta">
										<div class="comment-author vcard">
											<span class="comment-avatar clearfix">
												<img alt='' src='upload/{{$reply->users->anhdaidien}}' class='avatar avatar-40 photo' height='40' width='40' />
											</span>
										</div>
									</div>
									<div class="comment-content clearfix">
										<div class="comment-author">
											<a>{{$reply->users->hoten}}</a>
											<span><a>April 25, 2012 at 1:03 am</a></span>
										</div>
										<p>{!! $reply->noidung !!}</p>
									</div>
								</div>
							</li>
							
							@endif
						@endforeach
					</ul>
					@if(Auth::check())
					<a class="reply-comment" id="reply-comment-{{$comment->id}}">Reply<i class="icon-reply"></i></a>
					<div class="col_full formReply" id="formReply-{{$comment->id}}" style="display: none">
						<textarea name="reply" id="noidungReply" cols="58" rows="4" tabindex="4" class="sm-form-control"></textarea>
						<input type="hidden" name="_token" id="tokenReply" value="{{csrf_token()}}">
						<input type="hidden" name="users_id" id="userReply" value="{{Auth::user()->id}}">
						<input type="hidden" name="tour_id" id="tourReply" value="{{$cttour->id}}">
						<button id="btnReply-{{$comment->id}}" tabindex="5" class="button button-3d btnReply">Reply</button>
					</div>
					@else
					<a class="reply-comment" data-toggle="modal" data-target="#DangNhap">Reply<i class="icon-reply"></i></a>
					@endif
				</li>
				@endif
			@endforeach
		@endif
	</ol>
	
	<div id="respond" class="clearfix">
		<h3>Leave a <span>Comment</span></h3>
		@if(Auth::check())
			<div class="col_full">
				<textarea name="comment" id="noidungComment" cols="58" rows="5" tabindex="4" class="sm-form-control"></textarea>
				<input type="hidden" name="_token" id="tokenComment" value="{{csrf_token()}}">
				<input type="hidden" name="users_id" id="userComment" value="{{Auth::user()->id}}">
				<input type="hidden" name="tour_id" id="tourComment" value="{{$cttour->id}}">
			</div>
			<div class="col_full nobottommargin">
				<button id="btnComment" tabindex="5" class="button button-3d nomargin">Submit Comment</button>
			</div>
		@else
			<div class="col_full">
				<textarea name="comment" cols="58" rows="5" tabindex="4" class="sm-form-control"></textarea>
			</div>
			<div class="col_full nobottommargin">
				<a data-toggle="modal" data-target="#DangNhap"><button tabindex="5" value="Submit" class="button button-3d nomargin">Submit Comment</button></a>
			</div>
		@endif
	</div>
</div>

<div class="row" id="danhgia" style="display: block">
	<div class="col-sm-12" style="font-size: 2em; margin: 30px 0 0 30px;">	
		<div class="boxRatingCmt">
			<div class="toprt">		
				<div class="crt">
					 <div class="lcrt" data-gpa="{{round($cttour->danhgia->avg('sodiem'),2)}}">
                        <b>{{round($cttour->danhgia->avg('sodiem'),2)}}<i class="glyphicon glyphicon-star" style="font-size: 35px"></i></b>
                        <span>{{$cttour->danhgia->count()}} đánh giá</span>
                    </div>
                    <div class="rcrt">	
                    	@if($cttour->danhgia->count()>0)
                    		<?php
	                    		$sodiem = ['1'=>0, '2'=>0, '3'=>0, '4'=>0, '5'=>0];
	                    		foreach($cttour->danhgia as $rate){
	                    			if($rate->sodiem == 1){
	                    				$sodiem[1] ++;
	                    			}elseif($rate->sodiem == 2){
	                    				$sodiem[2] ++;
	                    			}elseif($rate->sodiem == 3){
	                    				$sodiem[3] ++;
	                    			}elseif($rate->sodiem == 4){
	                    				$sodiem[4] ++;
	                    			}else{
	                    				$sodiem[5] ++;
	                    			}
	                    		}
	                    	?>
	                        <div class="r">
	                            <span class="t">5 <i></i></span>
	                            <div class="bgb">
	                                <div class="bgb-in" style="width: 
	                                {{$sodiem[5] * 100 / $cttour->danhgia->count()}}%"></div>
	                            </div>
	                            <span class="c"><strong>{{$sodiem[5]}}</strong> đánh giá</span>
	                        </div>
	                        <div class="r">
	                            <span class="t">4 <i></i></span>
	                            <div class="bgb">
	                                <div class="bgb-in" style="width: 
	                                {{$sodiem[4] * 100 / $cttour->danhgia->count()}}%"></div>
	                            </div>
	                            <span class="c"><strong>{{$sodiem[4]}}</strong> đánh giá</span>
	                        </div>
	                        <div class="r">
	                            <span class="t">3 <i></i></span>
	                            <div class="bgb">
	                                <div class="bgb-in" style="width: 
	                                {{$sodiem[3] * 100 / $cttour->danhgia->count()}}%"></div>
	                            </div>
	                            <span class="c"><strong>{{$sodiem[3]}}</strong> đánh giá</span>
	                        </div>
	                        <div class="r">
	                            <span class="t">2 <i></i></span>
	                            <div class="bgb">
	                                <div class="bgb-in" style="width: 
	                                {{$sodiem[2] * 100 / $cttour->danhgia->count()}}%"></div>
	                            </div>
	                            <span class="c"><strong>{{$sodiem[2]}}</strong> đánh giá</span>
	                        </div>
	                        <div class="r">
	                            <span class="t">1 <i></i></span>
	                            <div class="bgb">
	                                <div class="bgb-in" style="width: 
	                                {{$sodiem[1] * 100 / $cttour->danhgia->count()}}%"></div>
	                            </div>
	                            <span class="c"><strong>{{$sodiem[1]}}</strong> đánh giá</span>
	                        </div>
                        @else
	                        <div class="r">
	                            <span class="t">5 <i></i></span>
	                            <div class="bgb">
	                                <div class="bgb-in" style="width: 0%"></div>
	                            </div>
	                            <span class="c"><strong>0</strong> đánh giá</span>
	                        </div>
	                        <div class="r">
	                            <span class="t">4 <i></i></span>
	                            <div class="bgb">
	                                <div class="bgb-in" style="width: 0%"></div>
	                            </div>
	                            <span class="c"><strong>0</strong> đánh giá</span>
	                        </div>
	                        <div class="r">
	                            <span class="t">3 <i></i></span>
	                            <div class="bgb">
	                                <div class="bgb-in" style="width: 0%"></div>
	                            </div>
	                            <span class="c"><strong>0</strong> đánh giá</span>
	                        </div>
	                        <div class="r">
	                            <span class="t">2 <i></i></span>
	                            <div class="bgb">
	                                <div class="bgb-in" style="width: 0%"></div>
	                            </div>
	                            <span class="c"><strong>0</strong> đánh giá</span>
	                        </div>
	                        <div class="r">
	                            <span class="t">1 <i></i></span>
	                            <div class="bgb">
	                                <div class="bgb-in" style="width: 0%"></div>
	                            </div>
	                            <span class="c"><strong>0</strong> đánh giá</span>
	                        </div>
	                    @endif   
                    </div>
	            </div>
	        </div>
	    </div>
	    <?php $flag =true ?>
		@if(Auth::check())
			@foreach($cttour->donhang as $bll)
				@if($bll->users_id == Auth::user()->id && $bll->tinhtrangdon == 4)
					@foreach($cttour->danhgia as $rate)
						@if($rate->users_id == Auth::user()->id)
							<?php $flag = false ?>
							<div class="row">
								<div class="text-center" style="margin-top: 10px; color: #A9A9A9">Bạn đã đánh giá {{$rate->sodiem}} sao cho tour này</div><br>
							</div>	
							@break
						@endif
					@endforeach
					@if($flag == true)
						<div class="text-center" style="margin-top: 10px">
							<form action="danh-gia-{{$cttour->id}}" method="post">
								<input type="hidden" name="_token" value="{{csrf_token()}}" >  
								<i class="glyphicon glyphicon-star" id="dg1" style="color: #DDDDDD;"></i>
								<i class="glyphicon glyphicon-star" id="dg2" style="color: #DDDDDD;"></i>
								<i class="glyphicon glyphicon-star" id="dg3" style="color: #DDDDDD;"></i>
								<i class="glyphicon glyphicon-star" id="dg4" style="color: #DDDDDD;"></i>
								<i class="glyphicon glyphicon-star" id="dg5" style="color: #DDDDDD;"></i>
								<input type="hidden" name="sodiem" value="0" id="sodiemdanhgia">
								<br>
								<button type="submit">Gửi</button>
							</form>
						</div>
					@endif									
				@break	
				@endif
			@endforeach
		@endif	
	</div>
</div>

<div id="thongtinhdv" class="text-center" style="display: none; padding: 25px; background-color: lavender">
	<img src="upload/{{$cttour->users->anhdaidien}}" height="200" width="200" style="border-radius: 50%">
	<div class="clear"></div>
	<span>Ho ten: {{$cttour->users->hoten}}</span>
	<span>Email: {{$cttour->users->email}}</span>
	<span>Dia chi: @if($cttour->users->gioitinh != "") {{$cttour->users->diachi}} @else Chua cap nhat @endif</span>
	<span>So dien thoai: {{$cttour->users->sodienthoai}}</span>
	<span>Gioi tinh: 
		@if($cttour->users->gioitinh == 1) 
			Nam
		@elseif($cttour->users->gioitinh == 2)
			Nu
		@else
			Chua cap nhat
		@endif
	</span>
	<span><a href="{{route('tour_hdv',$cttour->users->id)}}">Xam cac tour khac cua huong dan vien</a></span>
</div>