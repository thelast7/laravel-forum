@if(count($errors)>0)
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</ul>	
</div>
@endif

@if(session('info'))
	<div class="alert alert-success">
		<i class="fa fa-check"></i> {{session('info')}}		
	</div>
@endif