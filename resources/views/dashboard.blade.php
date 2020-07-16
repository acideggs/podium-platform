@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')  

<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto my-4">

      @foreach($articles as $key => $value)
      <div class="post-preview">
        <a href="{{ route('article.show', ['article' => $value->id]) }}">
          <h6 class="post-title">
            {{ $value->title }}
          </h6>
          <h6 class="post-subtitle">

            {{  strlen(strip_tags($value->content)) > 80 ? substr(strip_tags($value->content),0,80)."..." : strip_tags($value->content) }}

          </h6>
        </a>
        <p class="post-meta">Posted by
          <a href="#">{{ $value->user->name }}</a> {{date_format(date_create($value->updated_at),'F, d Y ')}} , <i class="fa fa-tag"></i> &nbsp; @foreach($value->tags as $key => $tag) <a href="{{ route('article.tag', ['tagId' => $tag->id]) }}"><span class="badge badge-success">{{$tag->name}}</span></a> @endforeach
        </p>
      </div>
      @endforeach

      @if($articles->isEmpty())

      <div class="card mt-5">
        <div class="card-body">

          <h4 class="text-center">Tidak ada postingan</h4>

        </div>
      </div>

      @endif

    </div>
  </div>
</div>

@endsection