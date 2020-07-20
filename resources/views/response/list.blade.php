@extends('layouts.master')

@section('title', 'Your Response')

@section('content')  

<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

      @foreach($responses as $response)
      <div class="post-preview">

        @guest

        @else
        @if($response->user_id == Auth::id())
        <div class="action float-right">
          <form action="{{ route('response.edit', ['response' => $response->id]) }}" method="GET">
            @csrf
            <button type="submit" class="btn" ><i class="fas fa-pencil-alt" style="font-size: 20px;"></i></button>
          </form>
          <form action="{{ route('response.destroy', ['response' => $response->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn" onclick="return confirm('Delete this Response?')"><i class='fas fa-trash-alt' style="font-size: 20px;"></i></button>
          </form>
        </div>
        @endif
        @endguest

        <a href="{{ route('article.show', ['article' => $response->article->id]) }}">
          <h6 class="post-title">
            {{ $response->article->title }} 
          </h6>
        </a>
        
        <h6 class="post-subtitle" style="font-weight: normal;">

          {{  strlen(strip_tags($response->response)) > 80 ? substr(strip_tags($response->response),0,80)."..." : strip_tags($response->response) }}

        </h6>
        
        <p class="post-meta">Posted by
          <a href="#">{{ $response->user->name }}</a> {{date_format(date_create($response->updated_at),'F, d Y ')}}
        </p>
      </div>

      <hr>

      @endforeach

      @if($responses->isEmpty())

      <div class="card mt-5">
        <div class="card-body">

          <h4 class="text-center">You have'nt any response</h4>

        </div>
      </div>

      @endif

    </div>
  </div>
</div>

@endsection