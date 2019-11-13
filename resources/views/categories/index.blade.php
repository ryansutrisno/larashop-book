@extends('layouts.global')
@section('title') Category List @endsection
@section('content')
@if(session('status'))
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-warning">{{session('status')}}</div>
		</div>
	</div>
@endif
<div class="row">
	<div class="col-md-6">
			<form action="{{route('categories.index')}}">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Filter by category name" value="{{Request::get('name')}}" name="name">
						<div class="input-group-append">
							<input type="submit" value="Filter" class="btn btn-info">
						</div>
				</div>
			</form>
	</div>
	<div class="col-md-6">
		<ul class="nav nav-pills card-header-pills">
			<li class="nav-item">
				<a class="nav-link active bg-info" href="{{route('categories.index')}}"><span class="oi oi-pin"></span> Published</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-info" href="{{route('categories.trash')}}"><span class="oi oi-trash"></span> Trash</a>
			</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="col-md-12 text-right">
<a href="{{route('categories.create')}}" class="btn btn-info"><span class="oi oi-plus"></span> Create Category</a>
	</div>
</div>
<br>
<hr class="my-3">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered table-stripped table-hover sticky-top">
				<thead class="thead-light">
					<tr>
						<th><b>Name</b></th>
						<th><b>Slug</b></th>
						<th><b>Image</b></th>
						<th><b>Actions</b></th>
					</tr>
				</thead>
			<tbody>
				@foreach ($categories as $category)
					<tr>
						<td>{{$category->name}}</td>
						<td>{{$category->slug}}</td>
						<td>
						@if($category->image) <img src="{{asset('storage/' . $category->image)}}" width="48px"/>
							@else
						No image
						@endif
						</td>
						<td>
						<a href="{{route('categories.show', [$category->id])}}" class="btn btn-success btn-sm"><span title="Show" class="oi oi-eye"></span></a>
						<a href="{{route('categories.edit', [$category->id])}}" class="btn btn-warning btn-sm"><span title="Edit" class="oi oi-pencil"></span></a>
							<form class="d-inline" action="{{route('categories.destroy', [$category->id])}}" method="POST" onsubmit="return confirm('Move category to trash?')">
							@csrf
							<input type="hidden" value="DELETE" name="_method">
							<input type="submit" class="btn btn-danger btn-sm" value="Trash">
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<td colSpan="10"> {{$categories->appends(Request::all())->links()}}</td>
				</tr>
			</tfoot>
</table>
</div>
</div>
@endsection