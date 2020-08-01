<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Podium - @yield('title')</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/clean-blog.min.css') }}" rel="stylesheet">

  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>


</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top" id="mainNav">

    <div class="container">
      <a class="navbar-brand" href="{{ route('article.index') }}">Podium</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

          <form class="form-inline" action="{{ route('article.search') }}" method="POST">
            @csrf
            <input class="form-control mr-5" name="keyword" style="border-radius:0;" type="search" placeholder="Search" aria-label="Search">
          </form>

          @guest

          <li class="nav-item">
            <a href="{{ route('login') }}" class="btn btn-outline-success btn-flat">Login</a>
          </li>

          @else


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              @if(auth()->user()->profile()->first() === null )
              <img src="{{ asset('img/blank-profile-picture.png') }}" alt="avatar" class="avatar ml-4">
              @else
              <img src="{{ asset('img/profiles/' . auth()->user()->profile()->first()->photo) }}" alt="avatar" class="avatar ml-4">
              @endif
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('article.create') }}">New Article</a>
              <a class="dropdown-item" href="{{ route('article.list', ['id' => Auth::id()]) }}">Your Article</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('following') }}">Following</a>
              <a class="dropdown-item" href="{{ route('follower') }}">Follower</a>
              <a class="dropdown-item" href="{{ route('response.list', ['id' => Auth::id()]) }}">Your Response</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }} </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>

          </li>
          @endguest

        </ul>

      </div>
    </div>

  </nav>

  @yield('content')

  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-linkedin-in fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Podium 2020</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{ asset('js/clean-blog.min.js') }}"></script>

  @stack('scripts')

</body>

</html>
