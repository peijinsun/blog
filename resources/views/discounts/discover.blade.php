@foreach ($discovers as $discover)
<div class="col-lg-6">
	<div class="well box-shadow discover-item">
		<div class="row">
			<div class="col-lg-12 text-center">
				<a href="#">
					<img class="img-responsive" src="{{$discover['img']}}" alt="">
				</a>
			</div>
			<div class="col-lg-12">
				<ul class="list-inline">
					<li><h4><a href="#">{{$discover['title']}}</a></h4></li>
					<li class="pull-right"><h4><a href=""><span class="label label-info">发现</span></a></h4></li>
				</ul>
			</div>
		</div>
	</div>
</div>
@endforeach