<!-- Blog Sidebar Widgets Column -->
<div class="sidebar">
    <!-- Recent Post -->
    <div class="panel panel-primary sidebar-list">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#recent-menu">最新精选</a></li>
        </ul>
        <div class="tab-content">
            <div id="recent-menu" class="tab-pane fade in active">
                @foreach ($recomends as $rec)
                <div class="row">
                    <div class="col-sm-3">
                        <a href="./article?id={{$rec['id']}}"><img src="{{ $rec['thumbnail'] }}"></a>
                    </div>
                    <div class="col-sm-9">
                        <a href="./article?id={{$rec['id']}}"><p>{{ $rec['title'] }}</p></a>
                        <span class="pull-right time-info">{{ $rec['time'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="panel panel-primary sidebar-list" data-spy="affix" data-offset-top="465">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#recent-menu">点击排行</a></li>
        </ul>
        <div class="tab-content">
            <div id="recent-menu" class="tab-pane fade in active">
                @foreach ($recomends as $rec)
                <div class="row">
                    <div class="col-sm-3">
                        <a href="./article?id={{$rec['id']}}"><img src="{{ $rec['thumbnail'] }}"></a>
                    </div>
                    <div class="col-sm-9">
                        <a href="./article?id={{$rec['id']}}"><p>{{ $rec['title'] }}</p></a>
                        <span class="pull-right time-info">{{ $rec['time'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
<!--
    <div id="sticky" class="panel panel-primary sidebar-list" data-spy="affix" data-offset-top="455">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#menu1">国内优惠</a></li>
            <li><a data-toggle="tab" href="#menu2">海淘优惠</a></li>
        </ul>
        <div class="tab-content">
            <div id="menu1" class="tab-pane fade in active">
                @foreach ($domestics as $dome)
                <div class="row">
                    <div class="col-sm-3">
                        <a href="./article?id={{$dome['id']}}"><img src="{{ $dome['thumbnail'] }}"></a>
                    </div>
                    <div class="col-sm-9">
                        <a href="./article?id={{$dome['id']}}"><p >{{ $dome['title'] }}</p></a>
                        <span class="pull-right time-info">{{ $dome['time'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
            <div id="menu2" class="tab-pane fade">
                @foreach ($foreigns as $forg)
                <div class="row">
                    <div class="col-sm-3">
                        <a href="./article?id={{$forg['id']}}"><img src="{{ $forg['thumbnail'] }}"></a>
                    </div>
                    <div class="col-sm-9">
                        <a href="./article?id={{$forg['id']}}"><p >{{ $forg['title'] }}</p></a>
                        <span class="pull-right time-info">{{ $forg['time'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
-->
    <!-- Side Widget Well -->
    <div class="panel panel-primary sidebar-ad">
        
    </div>
</div>
