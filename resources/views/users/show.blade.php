@extends('layouts.global')
@section('title') Detail User @endsection
@section('content')
<div class="col-md-8">
	<h3>Detail User</h3>
		<div class="card">
		<div class="card-body">
		<b>Name :</b> {{$user->name}}
	<br><br>
	<b>Avatar :</b> <br>
	<br>
	@if($user->avatar)
	<img src="{{asset('storage/'. $user->avatar)}}" width="128px"/>
	@else
	No avatar
	@endif
	<br>
	<br>
		<b>Email :</b> {{$user->email}}
		<br>
	<br>
		<b>Phone number :</b> {{$user->phone}}
	<br><br>
		<b>Address :</b> {{$user->address}}
	<br>
	<br>
		<b>Roles :</b>
		@foreach (json_decode($user->roles) as $role)
		&middot; {{$role}} <br>
		@endforeach
		</div>
	</div>
	<div style="margin: 5px"><a href="{{route('users.index')}}" class="btn btn-info"><span class="oi oi-action-undo"></span> Back</a></div>
</div>
@endsection