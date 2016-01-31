<div class="row">
    <ul class="nav nav-tabs">
        <li class="active highlight"><a data-toggle="tab" href="#pdt-type">白菜价</a></li>
    </ul>
</div>
<div class="row portfolio">
    @foreach ($cheaps as $cheap)
    <div class="col-md-4 portfolio-item">
        <div class="well box-shadow cheap-item">
            <div class="row">
                <div class="col-lg-12">
                    <a href="#">
                        <img class="img-responsive cheaps" src="{{$cheap['img']}}" alt="">
                    </a>
                </div>
                <div class="col-lg-12 "><h4><a href="#" class="cheap-title">{{$cheap['title']}}</a></h4></div>
                <div class="col-lg-12 cheap-price">{{$cheap['price']}}</div>
                <div class="bcBuyNow col-lg-12 text-center"><a href="{{ $cheap['url'] }}" target="_blank"><h3><span class="label label-info redirect-btn">立即购买</span></h3></a></div>
            </div>
            
           
        </div>
    </div>
    @endforeach
</div>
<div id="mypagination" class="text-center pages">
    {!! $cheaps->render() !!}
</div>
