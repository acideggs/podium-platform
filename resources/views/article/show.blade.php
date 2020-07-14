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
					@foreach($article->tags as $key => $tag) <a href="#"><span class="badge badge-success">{{$tag->name}}</span></a> @endforeach
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">

				{!! $article->content !!}

			</div>
		</div>
	</div>
</article>

@endsection