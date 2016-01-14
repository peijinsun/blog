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
                @foreach ($populars as $pop)
                <div class="row">
                    <div class="col-sm-3">
                        <a href="./article?id={{$pop['id']}}"><img src="{{ $pop['thumbnail'] }}"></a>
                    </div>
                    <div class="col-sm-9">
                        <a href="./article?id={{$pop['id']}}"><p>{{ $pop['title'] }}</p></a>
                        <span class="pull-right time-info">{{ $pop['time'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Side Widget Well -->
    <div class="panel panel-primary sidebar-ad">
        
    </div>
</div>
