@extends('layouts.master')

@section('title', 'Create New Article')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto my-4">

			<form action="{{ route('article.store') }}" method="POST">

				@csrf

				<input type="hidden" name="user_id" value="{{ Auth::id() }}">

				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" class="form-control" id="title" name="title">
				</div>

				<div class="form-group">
					<label for="content">Content</label>
					<textarea name="content" id="content" rows="10" cols="80"></textarea>
				</div>

				<div class="form-group">
					<label for="tag">Tag*</label>
					<input type="text" class="form-control" id="tag" name="tag" aria-describedby="taghelper">
					<small id="taghelper" class="form-text text-muted">*Use comma (,) to separate each tag</small>
				</div>

				<button type="submit" class="btn btn-primary btn-flat">Submit</button>

			</form>

		</div>
	</div>
</div>


@endsection

@push('scripts')

<script type="text/javascript">
	
	CKEDITOR.replace( 'content' );

</script>

@endpush