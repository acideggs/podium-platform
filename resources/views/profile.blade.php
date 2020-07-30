@extends('layouts.master')

@section('title', 'Profile')

@section('content')

<div class="container my-5">
	<h3 class="text-center mb-4">Your Profile</h3>
	<div class="card">
		<div class="card-body">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif

			@if(auth()->user()->profile()->first() == null)
			<form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<img src="{{ asset('img/blank-profile-picture.png') }}" alt="avatar" class="avatar-lg mb-4">
				<div class="form-group">
					<input type="file" name="photo" id="photo">
				</div>
				<div class="form-group">
					<label for="bio">Bio</label>
					<textarea name="bio" id="bio" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label for="instagram">Instagram</label>
					<input type="text" name="instagram" id="instagram" class="form-control">
				</div>
				<div class="form-group">
					<label for="twitter">Twitter</label>
					<input type="text" name="twitter" id="twitter" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary btn-flat">Save</button>
			</form>
			@else
			<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
				@method('PUT')
				@csrf
				@if($profile['photo'] == "")
				<img src="{{ asset('img/blank-profile-picture.png') }}" alt="avatar" class="avatar-lg mb-4">
				@else
				<img src="{{ asset('img/profiles/' . $profile['photo']) }}" alt="avatar" class="avatar-lg mb-4">
				@endif
				<div class="form-group">
					<input type="file" name="photo" id="photo">
				</div>
				<div class="form-group">
					<label for="bio">Bio</label>
					<textarea name="bio" id="bio" class="form-control">{{ $profile['bio'] }}</textarea>
				</div>
				<div class="form-group">
					<label for="instagram">Instagram</label>
					<input type="text" name="instagram" id="instagram" class="form-control" value="{{ $profile['instagram'] }}">
				</div>
				<div class="form-group">
					<label for="twitter">Twitter</label>
					<input type="text" name="twitter" id="twitter" class="form-control" value="{{ $profile['twitter'] }}">
				</div>
				<button type="submit" class="btn btn-success btn-flat">Update</button>
			</form>
			@endif
			
		</div>
	</div>
</div>

@endsection