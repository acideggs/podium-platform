@extends('layouts.master')

@section('title', 'Article List By Tag')

@section('content')  

<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

      @foreach($tag->articles as $article)
      <div class="post-preview">

        <a href="{{ route('article.show', ['article' => $article->id]) }}">
          <h6 class="post-title">
            {{ $article->title }} 
          </h6>
        </a>
        
        <h6 class="post-subtitle" style="font-weight: normal;">

          {{  strlen(strip_tags($article->content)) > 80 ? substr(strip_tags($article->content),0,80)."..." : strip_tags($article->content) }}

        </h6>
        
        <p class="post-meta">Posted by
          <a href="#">{{ $article->user->name }}</a> {{date_format(date_create($article->updated_at),'F, d Y ')}} , <i class="fa fa-tag"></i> &nbsp; @foreach($article->tags as $tagItem) <a href="{{ route('article.tag', ['tagId' => $tagItem->id]) }}"><span class="badge badge-success">{{$tagItem->name}}</span></a> @endforeach
        </p>
      </div>

      <hr>
      
      @endforeach

      @if($tag->articles->isEmpty())

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