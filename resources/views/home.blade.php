@extends('layout/common')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 content-wrapper">

            <div class="posts">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav-table-show nav nav-tabs multi-tabs">
                            <li class="{{ Request::is('/') || Request::is('index') ? 'selected' : '' }}">

                                <a id="allInfo" class="aFoucs" data-toggle="tab" href="#pdt-type">
                                    所有信息
                                </a>
                            </li>
                            <li class="{{ Request::is('domestic') ? 'selected' : '' }}">
                                <a data-toggle="tab"  class="aFoucs dome" href="#pdt-type">
                                    国内优惠
                                </a>
                            </li>
                            <li class="{{ Request::is('foreign') ? 'selected' : '' }}">
                                <a data-toggle="tab"  class="aFoucs frgn" href="#pdt-type">
                                    海淘优惠
                                </a>
                            </li>
                            <li class="hr"></li>
                        </ul>
                    </div>
                </div>
                <div class="lists">
                @include('discounts.list')
                </div>
            </div>
        </div>
        <div class="col-md-4">
            @include('layout.sidebar')
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(window).on('hashchange', function() {
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        } else {
            getPosts(page);
        }
    }
});
$(document).ready(function() {
    $(document).on('click', '.pagination a', function (e) {
        getPosts($(this).attr('href').split('page=')[1], type);
        e.preventDefault();
    });
    $(".dome").on('click', function(e) {
        getList(0);
        e.preventDefault();
    });
    $(".frgn").on('click', function(e) {
        getList(1);
        e.preventDefault();
    });
    $("#allInfo").on('click', function(e) {
        getList(2);
        e.preventDefault;
    })
});
function getList(type) {
    if (type == 0) {
        route = 'domestic';
    }
    else if (type == 1) {
        route = 'foreign';
    }
    else {
        route = 'index';
    }
    $.ajax({
        url : './' + route,
        dataType: 'json',
    }).done(function (data) {
        $('.lists').html(data);
    }).fail(function () {
        alert('Fetch JSON failed!!');
    });
}
function getPosts(page) {
    $.ajax({
        url : '?page=' + page,
        dataType: 'json',
    }).done(function (data) {
        $('.lists').html(data);
        location.hash = page;
    }).fail(function () {
        alert('Posts could not be loaded.');
    });
}
</script>
@endsection