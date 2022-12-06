@extends('layouts.app')

@section('style')
<style>
    .carousel-item img{
        height: 100vh;
        object-fit: cover;
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
        padding: 0 1.25rem;
        margin-right: 1rem;
        cursor: pointer;
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
        @foreach ($selectMovies as $movie)
            <div class="carousel-item @if ($loop->first) active @endif">
                <img src="https://variety.com/wp-content/uploads/2021/12/OSX1440_comp_v005_300DPI.1003-copy.jpg?w=681&h=383&crop=1" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <div class="d-flex">
                        @foreach ($movie->movie_genres as $movie_genre)
                            <p class="mb-2 text-shadow"> @if (!$loop->first), @endif{{ $movie_genre->genre->name }}</p>
                        @endforeach
                        <p class="ps-3 mb-2 text-shadow">|</p>
                        <p class="ps-3 mb-2 text-shadow">{{ date('Y', strtotime($movie->release_date))
                        }}</p>
                    </div>
                    <h1 class="mb-3 text-shadow fw-bold">{{ $movie->title }}</h1>
                    <p class="text-shadow">{{ $movie->description }}</p>
                    
                    <button type="button" class="btn btn-danger d-flex px-4">
                        <i class="bi bi-plus me-2"></i>
                        <p class="mb-0">Add to Watchlist</p>
                    </button>
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
            @foreach ($movies as $movie)
                <div class="card bg-dark border-0">
                    <img src="https://m.media-amazon.com/images/M/MV5BZWMyYzFjYTYtNTRjYi00OGExLWE2YzgtOGRmYjAxZTU3NzBiXkEyXkFqcGdeQXVyMzQ0MzA0NTM@._V1_FMjpg_UX1000_.jpg" alt="">
                    <div class="card-body px-0">
                        <h3 class="h6 overflow-hidden w-100 dot-overflow">{{ $movie->title }}</h3>
                        <p class="text-muted">{{ date('Y', strtotime($movie->release_date)) }}</p>
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
                <form class="d-flex">
                    <input class="form-control me-2 bg-gray border-0" type="search" placeholder="Search movie..." aria-label="Search">
                    {{-- <button class="btn btn-outline-success" type="submit">Search</button> --}}
                  </form>
            </div>
        </div>
        
        <ul class="d-flex list-unstyled w-100 flex-wrap mb-4">
            @foreach ($genres as $genre)
                <li class="d-inline pill mt-3">{{ $genre->name }}</li>
            @endforeach
        </ul>

        <div class="d-flex mb-4">
            <p class="me-4">Sort by</p>
            <ul class="d-flex list-unstyled">
                <li class="d-inline pill">Latest</li>
                <li class="d-inline pill">A-Z</li>
                <li class="d-inline pill">Z-A</li>
            </ul>
        </div>

        <div class="d-flex justify-content-end mb-4">
            <button type="button" class="btn btn-danger d-flex">
                <i class="bi bi-plus me-2"></i>
                <p class="mb-0">Add Movie</p>
            </button>
        </div>

        <div class="row row-cols-1 row-cols-md-5 g-4">
            @foreach ($movies as $movie)
                <div class="card bg-dark border-0">
                    <img src="https://m.media-amazon.com/images/M/MV5BZWMyYzFjYTYtNTRjYi00OGExLWE2YzgtOGRmYjAxZTU3NzBiXkEyXkFqcGdeQXVyMzQ0MzA0NTM@._V1_FMjpg_UX1000_.jpg" alt="">
                    <div class="pt-2 d-flex justify-content-between">
                        <div style="width: 85%;">
                            <h3 class="h6 overflow-hidden w-100 dot-overflow">{{ $movie->title }}</h3>
                            <p class="text-muted">{{ date('Y', strtotime($movie->release_date)) }}</p>
                        </div>
                        <div>
                            <i class="bi bi-plus text-danger fs-4" style="cursor: pointer;"></i>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
    

</div>

@endsection

@section('script')
<script>

</script>
@endsection