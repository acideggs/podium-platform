@extends('layouts.master')

@section('title', $article->title)

@section('content')

<article>
	<div class="container my-5">
		<div class="row mb-4">
			<div class="col-lg-8 col-md-10 mx-auto text-center">
				<h1>{{ $article->title }}</h1>
				<p>
					<small>By : {{ $article->user->name }} - {{date_format(date_create($article->updated_at),'F, d Y ')}}</small><br>
					<i class="fa fa-tag"></i>
					@foreach($article->tags as $key => $tag) <a href="{{ route('article.tag', ['tagId' => $tag->id]) }}"><span class="badge badge-success">{{$tag->name}}</span></a> @endforeach
				</p>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">

				{!! $article->content !!}

			</div>
		</div>

		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto my-4">
				@foreach($article->tags as $key => $tag) <a href="{{ route('article.tag', ['tagId' => $tag->id]) }}" class="btn btn-outline-success btn-flat btn-sm">{{$tag->name}}</a> @endforeach
			</div>
		</div>

		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="response float-left ">
					<form style="display: inline;">
						<button type="submit" class="btn btn-flat btn-small"><i class='far fa-heart mr-3' style="font-size:24px;"></i></button>
					</form>
					<button class="btn btn-flat btn-small" data-toggle="modal" data-target="#responseModal"><i class='far fa-comment mr-3' style='font-size:24px'></i></button>
				</div>
				<div class="feed float-right">
					<a href="#"><i class="fab fa-twitter mr-3" style="font-size:24px"></i></a>
					<a href="#"><i class="fab fa-github mr-3" style="font-size:24px"></i></a>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="response float-left">
					<small>Written By :</small>
					<h3>{{ $article->user->name }}</h3>
				</div>
				@if($article->user->id !== Auth::id())
				<div class="feed float-right">
					@if(Auth::user()->follow()->first() != null)
					<button type="submit" class="btn btn-outline-primary mt-3" disabled>Followed</button>
					@else
					<form action="{{route('follow')}}" method="POST">
						@csrf
						<input type="hidden" name="user_id" value="{{Auth::id()}}">
						<input type="hidden" name="article_id" value="{{$article->id}}">
						<input type="hidden" name="user_followed_id" value="{{$article->user->id}}">
						<button type="submit" class="btn btn-outline-primary mt-3">Follow</button>
					</form>
					@endif
				</div>
				@endif
			</div>
		</div>
	</div>
</article>

<div class="modal fade" id="responseModal" tabindex="-1" role="dialog" aria-labelledby="responseModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">

			<div class="modal-body p-4">

				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

				@guest
				<small>Log in to write your response</small>
				@else
				<small>Write Your Response</small>
				<form class="my-3" action="{{ route('response.store') }}" method="POST">
					@csrf
					<input type="hidden" name="user_id" value="{{ Auth::id() }}">
					<input type="hidden" name="article_id" value="{{ $article->id }}">
					<textarea class="form-control mb-3" name="response"></textarea>
					<button type="submit" class="btn btn-primary btn-flat">Send Response</button>
				</form>
				@endguest

				<hr>

				<h5 class="text-center mb-3">Responses</h5>

				@if($article->responses->isEmpty())
				<p class="font-italic text-center"><small>Nobody send their response</small></p>
				@else
				@foreach($article->responses as $response)
				<div class="card m-2">
					<div class="card-body text-left">
						{{ $response->response }}<br>
						<small>By : {{$response->user->name}} at {{date_format(date_create($response->updated_at),'F, d Y ')}}</small>
					</div>
				</div>
				@endforeach
				@endif

				<hr>

			</div>
		</div>
	</div>
</div>

@endsection