<!-- Blog Sidebar Widgets Column -->
<div class="sidebar">
    <!-- Recent Post -->
    <div class="panel panel-primary sidebar-list">
        <ul class="nav nav-tabs">
            <li class="active highlight"><a data-toggle="tab" href="#recent-menu">最新精选</a></li>
        </ul>
        <div class="tab-content">
            <div id="recent-menu" class="menu tab-pane fade in active">
                @foreach ($recomends as $rec)
                <div class="row list_item">
                    <div class="col-sm-3">
                        <a href="./article?id={{$rec['id']}}"><img src="{{ $rec['thumbnail'] }}"></a>
                    </div>
                    <div class="col-sm-9">
                        <a href="./article?id={{$rec['id']}}"><p><span class="rec-title">{{ $rec['title'] }}</span><span class="price rec-price">{{$rec['price']}}</span></p></a>
                        <div class="list_bot"><a class="grey click-count-wrap" title="点击数"><i class="click-icon"></i><span class="click-count">2410</span></a><a class="grey comment-count-wrap" title="评论"><i class="comment-icon"></i><span class="comment-count">171</span></a></div>
                    </div>
                </div>
				<hr>
                @endforeach
            </div>
        </div>
    </div>
    <div class="panel panel-primary sidebar-list" >
        <ul class="nav nav-tabs">
            <li class="active highlight"><a data-toggle="tab" href="#recent-menu">点击排行</a></li>
        </ul>
        <div class="tab-content">
            <div id="pop-menu" class="menu tab-pane fade in active">
                @foreach ($populars as $pop)
                <div class="row list_item">
                    <div class="col-sm-3">
                        <a href="./article?id={{$pop['id']}}"><img src="{{ $pop['thumbnail'] }}"></a>
                    </div>
                    <div class="col-sm-9">
                        <a href="./article?id={{$pop['id']}}"><p><span class="pop-title">{{ $pop['title'] }}</span><span class="price pop-price">{{$pop['price']}}</span></p></a>
                        <div class="list_bot"><a class="grey click-count-wrap" title="点击数"><i class="click-icon"></i><span class="click-count">2410</span><a><a title="评论" class="grey comment-count-wrap"><i class="comment-icon"></i><span class="comment-count">171</span></a></div>
                    </div>
                </div>
				<hr>
                @endforeach
            </div>
            <a id="returnTop" href="javascript:scroll(0,0)"></a>
        </div>
    </div>
    <!-- Side Widget Well -->
	<!--
    <div class="panel panel-primary sidebar-ad">
    </div> -->
</div>
