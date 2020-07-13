<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Podium - Tell Us Everything</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-dark navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="/">Podium</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link btn btn-success btn-flat" data-toggle="modal" data-target="#signInModal" href="#">Get Started</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  

  <!-- Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Podium</h1>
            <span class="subheading">Feel Free to Write Anything</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <p class="text-center">There are many topics you can write in</p>
        <div class="content-tag text-center">
          <button type="button" class="btn btn-outline-success mb-1">Success</button>
          <button type="button" class="btn btn-outline-danger mb-1">Danger</button>
          <button type="button" class="btn btn-outline-success mb-1">Success</button>
          <button type="button" class="btn btn-outline-danger mb-1">Danger</button>
          <button type="button" class="btn btn-outline-success mb-1">Success</button>
          <button type="button" class="btn btn-outline-danger mb-1">Danger</button>
          <button type="button" class="btn btn-outline-success mb-1">Success</button>
          <button type="button" class="btn btn-outline-danger mb-1">Danger</button>
          <button type="button" class="btn btn-outline-success mb-1">Success</button>
          <button type="button" class="btn btn-outline-danger mb-1">Danger</button>
          <button type="button" class="btn btn-outline-success mb-1">Success</button>
          <button type="button" class="btn btn-outline-danger mb-1">Danger</button>
          <button type="button" class="btn btn-outline-success mb-1">Success</button>
          <button type="button" class="btn btn-outline-danger mb-1">Danger</button>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 mt-4 mx-auto">
        <div class="content-tag text-center">
          <button class="btn btn-lg btn-success btn-flat" data-toggle="modal" data-target="#signInModal">Get Started</button>
          <p>
            <small>Already have an account?<br><a href="#">Sign In</a></small>
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="signInModal" tabindex="-1" role="dialog" aria-labelledby="signInModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-body text-center p-4">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

          <h5>Join Podium</h5>

          <p>Sign in to write and share your knowledge into many people</p>

          <p>
            <a href="{{ route('register') }}" class="btn btn-primary btn-flat mb-3">Sign Up</a><br>
            <a href="{{ route('login') }}" class="btn btn-success btn-flat">Sign In</a>
          </p>

          <p class="text-muted">
            <small>
              To make Podium work, we log user data and share it with service providers. Click “Sign Up” above to accept Medium’s Terms of Service & Privacy Policy.
            </small>
          </p>

        </div>
      </div>
    </div>
  </div>



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

</body>

</html>
