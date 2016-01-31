<div class="row">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#pdt-type">优惠详情</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-lg-5 col-md-5 col-sm-5 text-center image-show">
        <a href="{{$details['url']}}"><img src="{{$details['thumbnail']}}" style="width: 100%; min-height: 150px;padding: 5px 10px 10px 5px;"></a>
    </div>
    <div class="col-lg-7 col-md-7 col-sm-7">
        <div class="row">
            <div class="col-xs-12">
                <p class="post-title">{{$details['title']}}          <span class="red">$82.95（约￥635）</span></p>
                <div class="row">
                <div class = "spInfo">
                    <div class="col-lg-12">时间：{{$details['time']}}</div>
                    <div class="col-lg-12">商城：{{$details['source']}}</div>
                    </div>
                    <div class="col-lg-12">
                        <ul class="list-inline">
                            <li><a  href="{{$details['url']}}" target="_blank"><h3><span class="label label-info redirect-btn">直达链接<i>></i></span></h3></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="item-box col-sm-12">
        <div class="subtitle-box">优惠活动</div>
        <p class="content">{{$details['deals']}}</p>
    </div>
    <div class="item-box col-sm-12">
        <div class="subtitle-box">商品介绍</div>
        <div class="content">{{$details['content']}}</div>
    </div>
</div>
