@extends('layouts.app')

@section('style')
    <style>
        .bg-gray{
            background: #3f3f3f;
        }

        .dot-overflow{
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .actor-card:hover {
            opacity: 0.75;
        }
    </style>
@endsection

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between mb-4">
            <h1 class="h2 text-danger">Actors</h1>
            <div>
                <form class="d-flex">
                    <input class="form-control me-2 bg-gray border-0" type="search" placeholder="Search actors..." aria-label="Search">
                  </form>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-5 g-4">
            @foreach ($actors as $actor)
                <a href="/actors/{{ $actor->id }}" class="card bg-dark border-0 text-decoration-none text-white actor-card">
                    <div class="w-100 bg-gray overflow-hidden">
                        <img class="w-100" src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Tom_Holland_by_Gage_Skidmore.jpg/1200px-Tom_Holland_by_Gage_Skidmore.jpg" alt="" style="height: 180px; object-fit: cover;">
                    </div>
                    <div class="bg-gray p-3 rounded-bottom rounded-5">
                        <div>
                            <p class="h6 fw-bold mb-2">{{ $actor->name }}</p>
                            <p class="mb-0 dot-overflow overflow-hidden">
                                @foreach ($actor->movie_actors as $movie_actor)
                                    {{ $movie_actor->movie->title }}@if (!$loop->last), @endif
                                @endforeach
                            </p>
                        </div>
                    </div>
                </a>
                
            @endforeach
        </div>
    </div>
@endsection