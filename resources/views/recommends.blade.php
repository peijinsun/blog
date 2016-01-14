@extends('layout/common')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 content-wrapper">
                <div class="posts">
                    @include('discounts.rec_list')
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
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function (e) {
            getPosts($(this).attr('href').split('page=')[1]);
            e.preventDefault();
        });
    });
    function getPosts(page, type) {
        $.ajax({
            url : '?rec&page=' + page,
            dataType: 'json',
        }).done(function (data) {
            $('.posts').html(data);
            location.hash = page;
            $('html, body').animate({ scrollTop: 0 }, 0);
        }).fail(function () {
            alert('Posts could not be loaded.');
        });
    }
</script>
@endsection