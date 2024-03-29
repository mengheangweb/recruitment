<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <script>
      window.user = {
        id: {{ auth()->user() ? auth()->user()->id : null}}
      }
    </script>
</head>
<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                  <img src="/icon/logo.png" width="50"/>
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/home">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact Us</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Action</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a href="/lang/km" class="nav-link text-danger">KM</a>
                  </li>
                  <li>
                    <a href="/lang/en" class="nav-link text-success">EN</a>
                  </li>
                </ul>
                @auth
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Hi!, {{ auth()->user()->name }}
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/notification">Notification</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="/my-listing">Your Ads</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                      </ul>
                    </li>
                  </ul>
                @endauth
                @guest
                  <a href="/register" class="btn btn-success mx-2">Register</a>
                  <a href="/login" class="btn btn-danger mx-2">Login</a>
                @endguest
                <form action="/listing" method="get" class="d-flex" role="search">
                  <input name="keyword" value="{{ request()->has('keyword') ? request()->get('keyword') : '' }}" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
              </div>
            </div>
        </nav>

        @if(session()->has('message'))
          <div class="alert alert-primary mt-3" role="alert">
             {{ session()->get('message') }}
          </div>
        @endif
        @if(session()->has('error'))
          <div class="alert alert-danger mt-3" role="alert">
             {{ session()->get('error') }}
          </div>
        @endif

        @yield('content')

        <footer class="pt-3 mt-4 text-muted border-top">
        © 2022
        </footer>
    </div>
    
</body>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- include summernote css/js -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="{{ asset('/js/app.js') }}"></script>
<script>
  $(document).ready(function() {
    $('.summernote').summernote();
  });
</script>
</html>