@extends('layouts.global')
@section('title') Trashed Categories @endsection
@section('content')
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
					<a class="nav-link text-info" href="{{route('categories.index')}}"><span class="oi oi-pin"></span> Published</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active bg-info" href="{{route('categories.trash')}}"><span class="oi oi-trash"></span> Trash</a>
				</li>
			</ul>
		</div>
	</div>
<hr class="my-3">
<div class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
			<thead class="thead-light">
				<tr>
					<th><b>Nama</b></th>
					<th><b>Slug</b></th>
					<th><b>Image</b></th>
					<th><b>Action</b></th>
				</tr>
			</thead>
	<tbody>
		@foreach($categories as $category)
			<tr>
				<td>{{$category->name}}</td>
				<td>{{$category->slug}}</td>
				<td>
				@if($category->image)
					<img src="{{asset('storage/' . $category->image)}}" width="48px"/>
				@endif
				</td>
				<td>
					<a href="{{route('categories.restore', [$category->id])}}" class="btn btn-success btn-sm"><span class="oi oi-loop-circular"></span> Restore</a>
						<form class="d-inline" action="{{route('categories.deletepermanent', [$category->id])}}" method="POST"
							onsubmit="return confirm('Delete this category permanently?')">
							@csrf
							<input type="hidden" name="_method" value="DELETE"/>
							<input type="submit" class="btn btn-danger btn-sm" value="Delete"/>
						</form>
				</td>
			</tr>
		@endforeach
	</tbody>
			<tfoot>
				<tr>
					<td colSpan="10">{{$categories->appends(Request::all())->links()}}</td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>
@endsection