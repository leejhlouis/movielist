@extends('layouts.app')

@section('style')
    <style>
        #movieCard:hover{
            opacity: 0.75;
        }
    </style>
@endsection

@section('content')
    <div class="container my-5 d-flex gap-5">
        <div class="w-25" style="height: 300px">
            <img class="w-100 h-100 border-white border rounded-5" src="{{ url('storage/actors/'.$actor->image_url) }}" alt="" style="object-fit: cover;">

            <div class="mt-4">
                <p class="h4 mb-4">Personal info</p>
                
                <p class="h6 fw-bold">Popularity</p>
                <p class="mb-4">{{ $actor->popularity }}</p>
                
                <p class="h6 fw-bold">Gender</p>
                <p class="mb-4">{{ $actor->gender }}</p>
                
                <p class="h6 fw-bold">Date of birth</p>
                <p class="mb-4">{{ date('Y-m-d', strtotime($actor->dob)) }}</p>
                
                <p class="h6 fw-bold">Place of birth</p>
                <p class="mb-4">{{ $actor->place_of_birth }}</p>
            </div>
        </div>
        <div class="w-75">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1 class="mb-4">{{ $actor->name }}</h1>
                <div class="d-flex">
                    <i class="bi bi-pencil-square me-3 fs-5"></i>
                    <i class="bi bi-trash fs-5"></i>
                </div>
            </div>
            
            <div class="pb-3">
                <p class="h4 mb-3">Biography</p>
                <p>{{ $actor->biography }}</p>
            </div>
            
            <p class="h4 mb-3">Known for</p>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                @foreach ($actor->movie_actors as $movie_actor)
                    <a id="movieCard" href="/movies/{{ $movie_actor->movie->id }}" class="card bg-dark border-0 text-decoration-none">
                        <img src="{{ url('/storage/movies/thumbnail/'.$movie_actor->movie->thumbnail) }}" alt="">
                        <div class="card-body px-0">
                            <h3 class="h6 overflow-hidden w-100 dot-overflow text-white">{{ $movie_actor->movie->title }}</h3>
                            <p class="text-muted ">{{ date('Y', strtotime($movie_actor->movie->release_date)) }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection