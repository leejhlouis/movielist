@extends('layouts.app')

@section('style')
<style>
    .carousel-item img{
        height: calc(100vh - 64px);
        object-fit: cover;
        filter: brightness(60%);
    }

    .carousel-caption{
        top: 35%;
        bottom: auto;
        right: auto;
        text-align: left;
        width: 70%;
    }

    .text-shadow{
        text-shadow: 2px 2px 16px #000;
    }

    .dot-overflow{
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .bg-gray{
        background: #3f3f3f;
    }

    .pill{
        border-radius: 1rem;
        background: #3f3f3f;
        cursor: pointer;
    }

    #movieCard:hover{
        opacity: 0.75;
    }

    input[type="radio"]{
        cursor: pointer;
    }

    input[type="radio"]:checked + .pill{
        border: 2px solid var(--bs-danger);
    }

    .appearance-none{
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }
</style>
@endsection

@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        @foreach ($featuredMovies as $movie)
            <div class="carousel-item backdrop @if ($loop->first) active @endif">
                <img src="{{ url('/storage/movies/background/'.$movie->background) }}" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <div class="d-flex">
                        @foreach ($movie->movie_genres as $movie_genre)
                            <p class="mb-2 text-shadow"> @if (!$loop->first), @endif{{ $movie_genre->genre->name }}</p>
                        @endforeach
                        <p class="ps-3 mb-2 text-shadow">|</p>
                        <p class="ps-3 mb-2 text-shadow">{{ date('Y', strtotime($movie->release_date)) }}</p>
                    </div>
                    <h1 class="mb-3 text-shadow fw-bold">{{ $movie->title }}</h1>
                    <p class="text-shadow d-none d-md-block">{{ $movie->description }}</p>

                    @if (Auth::user() && !Auth::user()->is_admin)
                        @if(DB::table('watchlists')->where([['movie_id', '=', $movie->id], ['user_id', '=', Auth::user()->id]])->get()->isEmpty())
                            <a href="/watchlist/add/{{ $movie->id }}" class="btn btn-danger d-flex px-4" style="width: fit-content;">
                                <i class="bi bi-plus me-2"></i>
                                <p class="mb-0">Add to Watchlist</p>
                            </a>
                        @else
                            <a href="/watchlist/remove/{{ $movie->id }}" class="btn btn-secondary d-flex px-4" style="width: fit-content;">
                                <i class="bi bi-dash me-2"></i>
                                <p class="mb-0">Remove from Watchlist</p>
                            </a>
                        @endif
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container">
    <div class="my-5">
        <h2 class="d-flex align-items-center mb-4">
            <i class="bi bi-fire me-3"></i>
            <p class="mb-0 h3">Popular</p>
        </h2>
        <div class="row row-cols-1 row-cols-md-5 g-4">
            @foreach ($popularMovies as $movie)
                <div class="card bg-dark border-0 text-decoration-none">
                    <a id="movieCard" href="/movies/{{ $movie->id }}">
                        <img class="w-100" src="{{ url('/storage/movies/thumbnail/'.$movie->thumbnail) }}" alt="">
                    </a>
                    <div class="pt-2 d-flex justify-content-between">
                        <div style="width: 85%;">
                            <h3 class="h6 overflow-hidden w-100 dot-overflow text-white">{{ $movie->title }}</h3>
                            <p class="text-muted">{{ date('Y', strtotime($movie->release_date)) }}</p>
                        </div>
                        @if (Auth::user() && !Auth::user()->is_admin)
                            @if (DB::table('watchlists')->where([['movie_id', '=', $movie->id], ['user_id', '=', Auth::user()->id]])->get()->isEmpty())
                                <a href="/watchlist/add/{{ $movie->id }}">
                                    <i class="bi bi-plus text-danger fs-4" style="cursor: pointer; z-index:100;"></i>
                                </a>
                            @else
                                <a href="/watchlist/remove/{{ $movie->id }}">
                                    <i class="bi bi-check text-success fs-4" style="cursor: pointer; z-index:100;"></i>
                                </a>
                            @endif
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="my-5">
        <div class="d-flex justify-content-between">
            <h2 class="d-flex align-items-center mb-3">
                <i class="bi bi-film me-3"></i>
                <p class="mb-0 h3">Show</p>
            </h2>
            <div>
                <form class="d-flex" method="GET" action="{{ url('') }}">
                    <input class="form-control me-2 bg-gray border-0" name="search" type="search" placeholder="Search movie..." aria-label="Search movie">
                    <button class="btn btn-outline-danger" type="submit">Search</button>
                  </form>
            </div>
        </div>

        <form id="customizeListForm" class="mt-3" method="GET" action="{{ url('/') }}">
            <fieldset>
                <ul class="d-flex list-unstyled w-100 flex-wrap mb-4 gap-3 align-items-center">
                    @foreach ($genres as $genre)
                        <li class="d-inline position-relative">
                            <input type="radio" id="genre" name="genre" value="{{ $genre->id }}" class="appearance-none position-absolute w-100 h-100 top-0 left-0">
                            <label for="genre" class="pill px-4">{{ $genre->name }}</label>
                        </li>
                    @endforeach
                </ul>

                <div class="d-flex mb-4">
                    <p class="me-4" style="white-space: nowrap;">Sort by</p>
                    <ul class="d-flex list-unstyled w-100 flex-wrap mb-4 gap-3 align-items-center">
                        <li class="d-inline position-relative">
                            <input type="radio" id="sortby" name="sortby" value="latest" class="appearance-none position-absolute w-100 h-100 top-0 left-0">
                            <label for="genre" class="pill px-4">Latest</label>
                        </li>
                        <li class="d-inline position-relative">
                            <input type="radio" id="sortby" name="sortby" value="asc" class="appearance-none position-absolute w-100 h-100 top-0 left-0">
                            <label for="genre" class="pill px-4">A-Z</label>
                        </li>
                        <li class="d-inline position-relative">
                            <input type="radio" id="sortby" name="sortby" value="desc" class="appearance-none position-absolute w-100 h-100 top-0 left-0">
                            <label for="genre" class="pill px-4">Z-A</label>
                        </li>
                    </ul>
                </div>
            </fieldset>
        </form>

        @if (Auth::user() && Auth::user()->is_admin)
            <div class="d-flex justify-content-end mb-4">
                <a href="/insert" class="btn btn-danger d-flex">
                    <i class="bi bi-plus me-2"></i>
                    <p class="mb-0">Add Movie</p>
                </a>
            </div>
        @endif

        <div class="row row-cols-1 row-cols-md-5 g-4">

            @forelse ($movies as $movie)
                <div class="card bg-dark border-0 text-decoration-none">
                    <a id="movieCard" href="/movies/{{ $movie->id }}">
                        <img class="w-100" src="{{ url('/storage/movies/thumbnail/'.$movie->thumbnail) }}" alt="">
                    </a>
                    <div class="pt-2 d-flex justify-content-between">
                        <div style="width: 85%;">
                            <h3 class="h6 overflow-hidden w-100 dot-overflow text-white">{{ $movie->title }}</h3>
                            <p class="text-muted">{{ date('Y', strtotime($movie->release_date)) }}</p>
                        </div>
                        @if (Auth::user() && !Auth::user()->is_admin)
                            @if (DB::table('watchlists')->where([['movie_id', '=', $movie->id], ['user_id', '=', Auth::user()->id]])->get()->isEmpty())
                                <a href="/watchlist/add/{{ $movie->id }}">
                                    <i class="bi bi-plus text-danger fs-4" style="cursor: pointer; z-index:100;"></i>
                                </a>
                            @else
                                <a href="/watchlist/remove/{{ $movie->id }}">
                                    <i class="bi bi-check text-success fs-4" style="cursor: pointer; z-index:100;"></i>
                                </a>
                            @endif
                        @endif
                    </div>
                </div>
            @empty
                <div class="alert alert-dark w-100 text-center">
                    No movies found.
                </div>
            @endforelse
        </div>
    </div>
</div>


</div>

@endsection

@section('script')
<script>
    document.querySelectorAll('input[type="radio"]').forEach(element =>{
        element.addEventListener("click", ()=>{
            document.getElementById('customizeListForm').submit();
        });
    })
</script>
@endsection
