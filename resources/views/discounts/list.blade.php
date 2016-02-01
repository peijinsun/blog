
<!-- Post -->
@foreach ( $discounts as
$discount )
<div class="row post-list">
    <div class="col-lg-3 col-md-3 col-sm-12 post-thumb text-center">
        <a href="./article?id={{$discount
['id']}}"><img src={{ $discount['thumbnail'] }}></a>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-12">
        <div class="row">
            <div
                    class="col-xs-12">
                <p class="post-title"><a href="./article?id={{$discount['id']}}">{{ $discount['title'] }}</a><span
                        class="price">
&nbsp;&nbsp;{{$discount['price']}}</span></p>
                <p class="publish-info">
					<span>发布者：<span
                            class="post-author">{{ $discount['author'] }}</span></span>
                    <span class="time-info pull-right">{{ $discount['time'] }}</span>

                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">

                <p class="post-details">
                    <a href="./article?id={{$discount['id']}}" class="post-content">{{ $discount['content'] }}

                    </a><a href="./article?id={{$discount['id']}}" class="read-more"><span
                        style="color: #ef4135;"> 阅读全文</span></a>

                </p>

            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 bottom-btns-links">
                <ul class="pull-right
list-inline content-link sourceInfo">
                    <li>{{ $discount['source'] }}</li>
                    <li><a href="{{
$discount['url'] }}" target="_blank"><h3><span class="buyNow label label-info redirect-btn">立即购买</span></h3></a></li>
                </ul>

                <ul class="list-inline content-btn">
                    <li>
                   <!--     <button class="btn btn-default worth btn worth" data-value="{{ $discount['worths'] }}" data-post-id="{{ $discount['id'] }}">-->
                     <a href="javascript:void(0);" title="点赞数" class="click-count-wrap"  data-value="{{ $discount['worths'] }}" data-post-id="{{ $discount['id'] }}" id="dzBtn" title="赞"><i class="click-icon"></i><span class="worth-count click-count">{{ $discount['clicks'] }}</a></span>
                      <!--  </button>-->

                    </li>
                    <!--
                    <li><a  id="plBtn" class="comment-count-wrap"  href="./worthtest" title="评论"><i class="comment-icon"></i><span class="comment-count">{{ $discount['cmt-count'] }}</span></a></li>-->
                </ul>
            </div>
        </div>
    </div>
</div>
<hr>
@endforeach
<!-- Pagination -->
<div id="mypagination"
     class="text-center pages">
    {!! $discounts->render() !!}
</div>

