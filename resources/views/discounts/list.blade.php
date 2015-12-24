<div class="row" style="padding-top: 20px;">
	<div class="col-lg-12">
		<ul class="nav nav-tabs">
			<li class="active">
				<a data-toggle="tab" href="#pdt-type">
					@if (isset($rec))
						每日精选
					@elseif ( !isset($type) )
						所有信息
					@elseif ($type == 0)
						国内优惠
					@elseif ($type == 1)
						海淘优惠
					@endif
				</a>
			</li>
		</ul>
	</div>
</div>
<!-- Post -->
@foreach ( $discounts as $discount )
<div class="row">    
	<br>
	<div class="col-lg-3 col-md-3 col-sm-12 post-thumb text-center">
		<a href="./article?id={{$discount['id']}}"><img src={{ $discount['thumbnail'] }}></a>
	</div>
	<div class="col-lg-9 col-md-9 col-sm-12">
		<div class="row">
			<div class="col-xs-12">
				<p class="post-title"><a href="./article?id={{$discount['id']}}">{{ $discount['title'] }}</a><span class="price"> &nbsp;&nbsp;{{$discount['price']}}</span> </p>
				<p class="publish-info">
					<span>发布者：<span class="post-author">{{ $discount['author'] }}</span></span>
					<span class="time-info pull-right">{{ $discount['time'] }}</span> 
				</p>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				<p class="post-details">
					<a href="./article?id={{$discount['id']}}" class="post-content">{{ $discount['content'] }}
					</a><a href="./article?id={{$discount['id']}}" class="read-more"><span style="color: #ef4135;"> 阅读全文</span></a>
				</p>

			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<ul class="pull-right list-inline content-link">
					<li>{{ $discount['source'] }}</li>
					<li><a href="{{ $discount['url'] }}" target="_blank"><h3><span class="label label-info redirect-btn">立即购买</span></h3></a></li>
				</ul>
				<ul class="list-inline content-btn">
					<li>
						<button class="btn btn-default worth-btn">值 {{ $discount['worth-count'] }}</button>
					</li>
					<li><a href="#"><i class="fa fa-commenting-o fa-lg"></i> {{ $discount['cmt-count'] }} </a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<hr>
@endforeach
<!-- Pagination -->
<div id="mypagination" class="text-center pages">
	{!! $discounts->render() !!}
</div>

