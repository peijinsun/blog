@include('include.header')

<div class="container">
	<div class="row">
		<div class="col-md-8 content-wrapper">
			@include('discounts.content')
		</div>
		<div class="col-md-4 hidden-xs">
			@include('include.sidebar')
		</div>
	</div>
</div>

@include('include.footer')