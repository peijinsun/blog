<div class="row">
	<div class="col-lg-12">
		<ul class="nav nav-tabs">
			<li class="active highlight">
				<a data-toggle="tab" href="#pdt-type">
					@if (Request::is('rec'))
					每日精选
					@elseif (Request::is('search'))
					搜索结果
					@endif
				</a>
			</li>
		</ul>
	</div>
</div>

@if (Request::is('search'))
	<div class="row search-list">
		<div class="search-title">以下为<span class="keyword">“关键字”</span>全网搜索折扣信息</div>
	</div>
@endif
<!-- Post -->
@foreach ( $discounts as $discount )
<div class="row post-list">    
	<br>
	<div class="col-lg-3 col-md-3 col-sm-12 post-thumb text-center">
		<a href="./article?id={{$discount['id']}}"><img src={{ $discount['thumbnail'] }}></a>
	</div>
	<div class="col-lg-9 col-md-9 col-sm-12">
		<div class="row">
			<div class="col-xs-12">
				<p class="post-title"><a href="./article?id={{$discount['id']}}">{{ $discount['title'] }}</a> <span class="price"> &nbsp;&nbsp;{{$discount['price']}}</span></p>
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
			<div class="col-xs-12 bottom-btns-links">
				<ul class="pull-right list-inline content-link sourceInfo">
					<li>{{ $discount['source'] }}</li>
					<li><a href="{{ $discount['url'] }}" target="_blank"><h3><span class="label label-info redirect-btn">立即购买</span></h3></a></li>
				</ul>
				<ul class="list-inline content-btn">
					<li class="click-count-list">
						<a href="javascript:void(0)" title="点击数" class="click-count-wrap"><i class="click-icon"></i><span class="click-count">{{ $discount['worths'] }}</span></a>
					</li>
					<li class="comment-count-list"><a href="./worthtest" title=""评论 class="comment-count-wrap"><i class="comment-icon"></i> <span class="comment-count" >{{ $discount['cmt-count'] }}</span> </a></li>
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

