<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <title>MovieList</title>
    <style>
        nav{
            height: 64px;
        }

        .movieSpan{
            color: var(--bs-danger);
        }

        footer{
            min-height: 10vh;
            padding: 2em;
            margin-top: auto;
            text-align: center;
        }


    </style>
    @yield('style')
  </head>
  <body class="bg-dark text-light">
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="{{url('/')}}"><span class="movieSpan">Movie</span>List</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        {{-- nanti activenya dipindahin setiap halaman --}}
                        <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">Movies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/actors')}}">Actors</a>
                    </li>
                </ul>
                <form class="d-flex">
                    @auth()
                        {{ Auth::user()->username }}
                        {{-- dropdown --}}
                    @else
                        <a href="{{url('/register')}}" class="btn btn-outline-primary me-2">Register</a>
                        <a href="{{url('/login')}}" class="btn btn-primary" type="submit">Log In</a>
                    @endauth
                </form>
            </div>
        </div>
    </nav>

    @yield('content')

    {{-- Footer --}}
    <footer>
        <hr>
        <h4 class="fw-bold">
            <span class="movieSpan">Movie</span>List
        </h4>
        <p>
            <strong class="fw-bold"><span class="movieSpan">Movie</span>List</strong> is a Website that contains list of movies.
        </p>
        <p class="mb-0">
            Copyright &copy; 2022 <span class="movieSpan">Movie</span>List All Rights Reserved
        </p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @yield('script')
  </body>
</html>
