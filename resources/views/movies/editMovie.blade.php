@extends('layouts.app')
{{-- masi ngebug, pas di klik submit malah /update, pdhal expect /movies/update/{id} --}}

@section('style')
<style>
    .isi{
        width: 85%;
        /* background-color: orange; */
        margin: 0 auto;
        margin-top: 3%;
    }

    .form1{
        margin-top: 4%;
    }

    .turunwoi{
        margin-top: 2%;
    }

    #addMore{
        margin-top: 5%;
    }

    .d-grid{
        margin-top: 3%;
    }


</style>

@endsection

@section('jquery')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
@endsection
@php
    $i = 1;
@endphp
@section('content')
    <div class="isi">
        <h3><b>Add Movie</b></h3>
        <form action={{url('/movies/update/'.$movie->id)}} method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-1">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" value="{{$movie->title}}" class="form-control" id="title" name="title">
                    @error('title')
                        {{$message}}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Description</label>
                    <textarea class="form-control" id="desc" name="desc" rows="3">{{$movie->description}}</textarea>
                    @error('desc')
                        {{$message}}
                    @enderror
                </div>
                <div class="mb-3 add">
                    <label for="genre" class="form-label">Genre</label>
                    <br>
                    <select id="genre" name="genres[]" multiple data-actions-box="true" class="selectpicker">
                        @foreach ($movieGenre as $g)
                            <option value="{{$g->id}}">{{$g->name}}</option>
                        @endforeach
                    </select>
                    @error('genre')
                        {{$message}}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Actors</label>
                    {{-- disini buat isi actor dan nambahin actor pake button --}}
                    <div class="container" id="container">
                        @foreach ($movie->movie_actors as $item)
                            {{-- tinggal ubah name actor/1 nya jadi apa gitu biar berubah sesuai loop --}}
                            <div class="row">
                                <div class="col-6">
                                    {{-- pengen masukin nama actornya ke inserrt trs pake tag select tapi gimana ya wkwk --}}
                                    <label class="turunwoi" for="actor/{{$i}}">Actor</label>
                                    <select name="actor/{{$i}}" class="form-select" aria-label="Default select example">
                                        <option value="{{$item->actor->id}}" selected>{{$item->actor->name}}</option>
                                        @foreach ($movieActor as $a)
                                            @if ($a->name != $item->actor->name)
                                                <option value="{{$a->id}}">{{$a->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="turunwoi" for="character_{{$i}}" class="form-label">Character Name</label>
                                    <input value="{{$item->character_name}}" type="text" class="form-control" id="character_{{$i}}" name="character_{{$i}}">
                                </div>
                            </div>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                        {{-- <div class="row">
                            <div class="col-6"> --}}
                                {{-- pengen masukin nama actornya ke inserrt trs pake tag select tapi gimana ya wkwk --}}
                                {{-- <label class="turunwoi" for="actor/1">Actor</label>
                                <select name="actor/1" class="form-select" aria-label="Default select example">
                                    <option selected disabled>Open this selected menu</option>
                                    @foreach ($movieActor as $a)
                                        <option value="{{$a->name}}">{{$a->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="turunwoi" for="character_1" class="form-label">Character Name</label>
                                <input type="text" class="form-control" id="character_1" name="character_1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"> --}}
                                {{-- pengen masukin nama actornya ke inserrt trs pake tag select tapi gimana ya wkwk --}}
                                {{-- <label class="turunwoi" for="actor/2">Actor</label>
                                <select name="actor/2" class="form-select" aria-label="Default select example">
                                    <option selected disabled>Open this selected menu</option>
                                    @foreach ($movieActor as $a)
                                        <option value="{{$a->name}}">{{$a->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="turunwoi" for="character_2" class="form-label">Character Name</label>
                                <input type="text" class="form-control" id="character_2" name="character_2">
                            </div>
                        </div> --}}
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" id="addMore" class="btn btn-primary">Add More</button>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="director" class="form-label">Director</label>
                    <input value="{{$movie->director}}" type="text" class="form-control" id="director" name="director">
                    @error('director')
                        {{$message}}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Release Date</label>
                    <input value="{{date('Y-m-d',strtotime($movie->release_date))}}" type="date" class="form-control" id="date" name="date">
                    @error('date')
                        {{$message}}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Image Url</label>
                    <input type="file" class="form-control" id="img" name="img">
                    @error('img')
                        {{$message}}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="background" class="form-label">Background Url</label>
                    <input type="file" class="form-control" id="background" name="background">
                    @error('background')
                        {{$message}}
                    @enderror
                </div>
                <div class="d-grid">
                    <input class="btn btn-danger" type="submit"></input>
                </div>
            </div>
        </form>

    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            var count = {{$i}};
            $('#addMore').on('click', function(){
                $('#container').append(`
                <div class="row">
                    <div class="col-6">
                        <label class="turunwoi" for="actor/` + count + `">Actor</label>
                        <select name="actor/` + count + `" class="form-select" aria-label="Default select example">
                            <option selected disabled>Open this selected menu</option>
                                @foreach ($movieActor as $a)
                                    <option value="{{$a->id}}">{{$a->name}}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="turunwoi" for="character_` + count + `" class="form-label">Character Name</label>
                        <input type="text" class="form-control" id="character_` + count + `"name="character_` + count + `">
                    </div>
                </div>
            `);
                count++;
            })
        });
    </script>
@endsection
