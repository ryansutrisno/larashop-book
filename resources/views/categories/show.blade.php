@extends('layouts.global')
@section('title') Detail Category @endsection
@section('content')
	<div class="col-md-8">
		<div class="card">
			<div class="card-body">
				<label><b>Category name</b></label><br>{{$category->name}}
					<br><br>
				<label><b>Category slug</b></label><br>{{$category->slug}}
					<br><br>
				<label><b>Category image</b></label><br>
				@if($category->image)
					<img src="{{asset('storage/' . $category->image)}}" width="120px">
				@endif
			</div>
		</div>
		<div style="margin: 5px"><a href="{{route('categories.index')}}" class="btn btn-info"><span class="oi oi-action-undo"></span> Back</a></div>
	</div>
@endsection