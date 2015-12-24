@include('include.header')

<div class="container">
	<div class="row">
		<div class="col-md-8 content-wrapper">
			@include('include.tags')
			<div class="posts">
				@include('discounts.list')
			</div>
		</div>
		<div class="col-md-4">
			@include('include.sidebar')
		</div>
	</div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function (e) {
            getPosts($(this).attr('href').split('page=')[1], <?php echo $type; ?>);
            e.preventDefault();
        });
    });
    function getPosts(page, type) {
        $.ajax({
            url : '?type=' + type + '&page=' + page,
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

@include('include.footer')