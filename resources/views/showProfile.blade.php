@extends('layouts.master')

@section('title', 'Show Profile')

@section('content')

<div class="container my-5">
	<h3 class="text-center mb-4">{{$profile->user->name}}</h3>
	<div class="row">
		<div class="col-md-6 mx-auto">
			<div class="card">
				<div class="card-body">
					<img src="{{ asset('img/profiles/' . $profile->photo) }}" alt="Photo" class="avatar-lg">
					<p>Bio : {{ $profile->bio }}</p>
					Social Media :
					<ul>
						<li>Instagram : {{ $profile->instagram }}</li>
						<li>Twitter : {{ $profile->twitter }}</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection