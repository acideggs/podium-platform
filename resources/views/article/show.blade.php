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
				<div class="response float-left">
					<a href="#"><i class='far fa-heart mr-3' style="font-size:24px;"></i></a>
					<a href="#"><i class='far fa-comment mr-3' style='font-size:24px'></i></a>
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
				<div class="feed float-right">
					<a href="#" class="btn btn-outline-primary mt-2">Follow</a>
				</div>
			</div>
		</div>
	</div>
</article>

@endsection