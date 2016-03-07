@extends('layout/common')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 content-wrapper">
			<div class="posts">
				@include('discounts.cheap')
			</div>
		</div>
		<div class="col-md-4">
			@include('layout.sidebar')
		</div>
	</div>
</div>
@endsection

@section('script')
<script>
$(".cheap-intro").each(function () {
    var maxwidth = 80;
    if ($(this).text().length > maxwidth) {
        $(this).text($(this).text().substring(0, maxwidth));
        $(this).html($(this).html() + '...');
    }
    ;
});
$(".cheap-title").each(function () {
    var maxwidth = 5;
    if ($(this).text().length > maxwidth) {
        $(this).text($(this).text().substring(0, maxwidth));
        $(this).html($(this).html() + '...');
    }
    ;
});
$(".cheap-price").each(function () {
    var maxwidth = 10;
    if ($(this).text().length > maxwidth) {
        $(this).text($(this).text().substring(0, maxwidth));
        $(this).html($(this).html() + '...');
    }
    ;
});
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
    });
    function getPosts(page) {
        $.ajax({
            url : '?page=' + page,
            dataType: 'json',
        }).done(function (data) {
            $('.posts').html(data);
            location.hash = page;
        }).fail(function () {
            alert('Posts could not be loaded.');
        });
    }
</script>
@endsection