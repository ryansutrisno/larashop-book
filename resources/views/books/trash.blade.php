@extends('layouts.global')
@section('title') Trashed Books @endsection
@section('content')
<h3>Trashed Book</h3>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
			<div class="col-md-6">
				<form action="{{route('books.trash')}}">
						<div class="input-group">
							<input name="keyword" type="text" value="{{Request::get('keyword')}}" class="form-control" placeholder="Filter by title">
								<div class="input-group-append">
									<input type="submit" value="Filter" class="btn btn-info">
								</div>
						</div>
				</form>
			</div>
					<div class="col-md-6">
						<ul class="nav nav-pills card-header-pills">
							<li class="nav-item">
								<a class="nav-link text-info bg-transparent {{Request::get('status') == NULL && Request::path() == 'books' ? 'active' : ''}}" href="{{route('books.index')}}"><span class="oi oi-list"></span> All</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-info bg-transparent {{Request::get('status') == 'publish' ? 'active' : '' }}" href="{{route('books.index', ['status' => 'publish'])}}"><span class="oi oi-pin"></span> Publish</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-info bg-transparent {{Request::get('status') == 'draft' ? 'active' : '' }}" href="{{route('books.index', ['status' => 'draft'])}}"><span class="oi oi-folder"></span> Draft</a>
							</li>
							<li class="nav-item">
							<a class="nav-link text-info bg-transparent {{Request::path() == 'books/trash' ? 'active' : ''}}" href="{{route('books.trash')}}"><span class="oi oi-trash"></span>Trash</a>
							</li>
						</ul>
					</div>
				</div>
				<hr class="my-3">
			</div>
			@if(session('status'))
				<div class="alert alert-success">{{session('status')}}</div>
			@endif
			<table class="table table-bordered table-stripped table-hover table-responsive">
					<thead class="thead-light">
						<tr>
							<th><b>Cover</b></th>
							<th><b>Title</b></th>
							<th><b>Author</b></th>
							<th><b>Categories</b></th>
							<th><b>Stock</b></th>
							<th><b>Price</b></th>
							<th><b>Action</b></th>
						</tr>
					</thead>
				<tbody>
				@foreach($books as $book)
						<tr>
							<td>
							@if($book->cover)
								<img src="{{asset('storage/' . $book->cover)}}" width="96px"/>
							@endif
							</td>
							<td>{{$book->title}}</td>
							<td>{{$book->author}}</td>
							<td>
								<ul class="pl-3">
									@foreach($book->categories as $category)
										<li>{{$category->name}}</li>
									@endforeach
								</ul>
							</td>
							<td>{{$book->stock}}</td>
							<td>{{$book->price}}</td>
							<td>
							<form method="POST" action="{{route('books.restore', [$book->id])}}" class="d-inline">
								@csrf
								<input type="submit" value="Restore" class="btn btn-success btn-sm"/>
							</form>
							<form method="POST" action="{{route('books.deletepermanent', [$book->id])}}" class="d-inline" onsubmit="return confirm('Delete this book permanently?')">
								@csrf
								<input type="hidden" name="_method" value="DELETE">
								<input type="submit" value="Delete" class="btn btn-danger btn-sm">
							</form>
							</td>
						</tr>
				@endforeach
				</tbody>
					<tfoot>
						<tr>
							<td colspan="10"> {{$books->appends(Request::all())->links()}}</td>
						</tr>
					</tfoot>
				</table>
		</div>
	</div>
@endsection