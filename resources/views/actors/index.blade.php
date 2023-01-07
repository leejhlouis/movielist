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
                <div class="d-flex">
                    <form class="d-flex" action="{{ url('/actors') }}">
                        <input class="form-control me-2 bg-gray border-0" name="search" type="search" placeholder="Search actors..." aria-label="Search actors">
                    </form>
                    @if (Auth::user() && Auth::user()->is_admin)
                        <a href="/actors/insertactor" class="btn btn-danger d-flex ms-3">
                            <i class="bi bi-plus me-2"></i>
                            <p class="mb-0">Add Actor</p>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-5 g-4">
            @foreach ($actors as $actor)
                <a href="/actors/{{ $actor->id }}" class="card bg-dark border-0 text-decoration-none text-white actor-card">
                    <div class="w-100 bg-gray overflow-hidden">
                        <img class="w-100" src="{{ url('storage/actors/'.$actor->image_url) }}" alt="" style="height: 180px; object-fit: cover;">
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
