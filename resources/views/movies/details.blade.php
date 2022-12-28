@extends('layouts.app')

@section('style')
    <style>
        .top-section{
            min-height: calc(100vh - 64px);
            width: 100%;
            background: url({{ url('/storage/movies/background/'.$movie->background) }}) no-repeat center;
            background-size: cover;
        }

        .backdrop{
            width: 100%;
            height: 100vh;
            backdrop-filter: brightness(36%);
        }

        .text-shadow{
            text-shadow: 2px 2px 16px #000;
        }
        

        .pill{
            border-radius: 1rem;
            border: 1px solid white;
            padding: 0 1.25rem;
            margin-right: 1rem;
            cursor: pointer;
        }

        #movieCard:hover,
        .actor-card:hover {
            opacity: 0.75;
        }
        
        a.text-white:hover{
            opacity: 0.75;
        }
    </style>
@endsection

@section('content')
    <div class="top-section">
        <div class="backdrop d-flex justify-content-center align-items-center">
            <div class="container d-flex gap-5">
                <div class="w-25">
                    <img class="w-100 shadow-lg" src="{{ url('/storage/movies/thumbnail/'.$movie->thumbnail) }}" alt="">
                </div>
                <div class="w-75 ps-3">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <h1 class="text-shadow fw-bold">{{ $movie->title }}</h1>
                        @if (Auth::user() && Auth::user()->is_admin)
                            <div class="d-flex">
                                <a href="/movies/update/{{ $movie->id }}" class="text-white">
                                    <i class="bi bi-pencil-square me-3 fs-5"></i>
                                </a>
                                <a href="/movies/delete/{{ $movie->id }}" class="text-white">
                                    <i class="bi bi-trash fs-5"></i>
                                </a>
                            </div>
                        @endif
                    </div>
                    
                    <ul class="d-flex list-unstyled mt-3">
                        @foreach ($movie->movie_genres as $movie_genre)
                            <li class="d-inline pill">{{ $movie_genre->genre->name }}</li>
                        @endforeach
                    </ul>

                    <p class="mt-4 mb-1 text-shadow">Release date</p>
                    <p class="fw-bold text-shadow">{{ date('Y', strtotime($movie->release_date)) }}</p>
                    
                    <p class="mt-4 mb-1 text-shadow">Director</p>
                    <p class="fw-bold text-shadow">{{ $movie->director }}</p>
                    
                    <p class="mt-4 mb-1 text-shadow fw-bold">Storyline</p>
                    <p class="text-shadow">{{ $movie->description }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="mb-5">
            <h2 class="h3 border-start border-danger border-4 ps-3 mb-4">Cast</h2>

            <div class="row row-cols-1 row-cols-md-5 g-4">
                @foreach ($movie->movie_actors as $movie_actor)
                    <a href="/actors/{{ $movie_actor->actor->id }}" class="card actor-card bg-dark border-0 text-decoration-none text-white">
                        <div class="w-100 bg-gray overflow-hidden">
                            <img class="w-100" src="{{ url('storage/actors/'.$movie_actor->actor->image_url) }}" alt="" style="height: 180px; object-fit: cover;">
                        </div>
                        <div class="bg-danger p-3 rounded-bottom rounded-5">
                            <div>
                                <p class="h6 fw-bold mb-1">{{ $movie_actor->actor->name }}</p>
                                <p>{{ $movie_actor->character_name }}</p>
                            </div>
                        </div>
                    </a>
                    
                @endforeach
            </div>
        </div>

        <div>
            <h2 class="h3 border-start border-danger border-4 ps-3 mb-4">More</h2>
            
            <div class="row row-cols-1 row-cols-md-5 g-4">
                @foreach ($movies as $movie)
                    <div class="card bg-dark border-0 text-decoration-none">
                        <a id="movieCard" href="/movies/{{ $movie->id }}">
                            <img class="w-100" src="{{ url('/storage/movies/thumbnail/'.$movie->thumbnail) }}" }}" alt="">
                        </a>
                        <div class="pt-2 d-flex justify-content-between">
                            <div style="width: 85%;">
                                <h3 class="h6 overflow-hidden w-100 dot-overflow text-white">{{ $movie->title }}</h3>
                                <p class="text-muted">{{ date('Y', strtotime($movie->release_date)) }}</p>
                            </div>
                            <div>
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
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection