@extends('layouts.master')

@section('title', 'Edit Response')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto my-4">

			<p>
				Article Title : <a href="{{ route('article.show', ['article' => $response->article->id]) }}">{{ $response->article->title }}</a>
			</p>

			<form action="{{ route('response.update', ['response' => $response->id]) }}" method="POST">

				@csrf

				@method('PUT')

				<input type="hidden" name="user_id" value="{{ Auth::id() }}">
				<input type="hidden" name="article_id" value="{{ $response->article->id }}">

				<div class="form-group">
					<label for="content">Your Response</label>
					<textarea name="response" class="form-control">{{ $response->response }}</textarea>
				</div>

				<button type="submit" class="btn btn-primary btn-flat">Update Your Response</button>

			</form>

		</div>
	</div>
</div>
@endsection