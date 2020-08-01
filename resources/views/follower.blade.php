@extends('layouts.master')

@section('title', 'Follower')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6 mx-auto my-5">
			@if($follower->isEmpty())
			<h4 class="text-center my-4">You have no follower</h4>
			@else
			<h1 class="text-center mb-4">Following</h1>
			@foreach($follower as $user)
			<div class="card my-2">
				<div class="card-body">
					<div class="row">
						@if($user->profile()->get()->isEmpty())
						<div class="col-md-2"><img src="{{ asset('img/blank-profile-picture.png') }}" alt="Avatar" class="avatar"></div>
						<div class="col-md-10">
							<h4><a href="#">{{$user->name}}</a></h4><small>This person haven't create profile yet</small>
						</div>
						@else
						<div class="col-md-2"><img src="{{ asset('img/profiles/' . $user->profile->photo) }}" alt="Avatar" class="avatar"></div>
						<div class="col-md-10">
							<h4><a href="{{ route('profile.user.show', ['profile' => $user->profile->id]) }}">{{$user->name}}</a></h4>{{ $user->profile->bio }}
						</div>
						@endif
					</div>
				</div>
			</div>
			@endforeach
			@endif
		</div>
	</div>
</div>

@endsection