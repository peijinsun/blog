@extends('layout/common')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 content-wrapper">
			@include('discounts.content')
		</div>
		<div class="col-md-4 hidden-xs">
			@include('layout.sidebar')
		</div>
	</div>
</div>
@endsection
