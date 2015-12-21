@include('header')

<div class="container">
	<div class="row">
		<div class="col-md-8 content-wrapper">
			@yield('carousel')
			@yield('content')
		</div>
		<div class="col-md-4">
			@include('sidebar')
		</div>
	</div>
</div>

@include('footer')