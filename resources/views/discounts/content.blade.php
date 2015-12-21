<div class="row">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#pdt-type">优惠详情</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 text-center">
        <a href="{{$details['url']}}"><img src="{{$details['thumbnail']}}" style="width: 100%; min-height: 150px;"></a>
    </div>
    <div class="col-lg-9 col-md-9 col-sm-9">
        <div class="row">
            <div class="col-xs-12">
                <p class="post-title">{{$details['title']}}</p>
                <div class="row">
                    <div class="col-lg-12">时间：{{$details['time']}}</div>
                    <div class="col-lg-12">商城：{{$details['source']}}</div>
                    <div class="col-lg-12"><a href="{{$details['url']}}"><h3><span class="label label-info redirect-btn">立即购买</span></h3></a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-12">
        <h3>优惠活动</h3>
        <p>{{$details['deals']}}</p>
    </div>
    <div class="col-sm-12">
        <h3>商品介绍</h3>
        <p>{{$details['content']}}</p>
    </div>
</div>