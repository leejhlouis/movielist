@extends('layouts.app')

@section('style')
<style>
    .isi{
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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
@endsection

@section('content')
    <div class="isi container">
        <h3 class="mb-5"><b>Add Movie</b></h3>
        <form action={{ url('/movies/insert') }} method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-1">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                    @error('title')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    @error('description')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-3 add">
                    <label for="genre" class="form-label">Genre</label>
                    <br>
                    <select id="genre" name="genres[]" multiple data-actions-box="true" class="selectpicker">
                        @foreach ($genres as $g)
                            <option value="{{ $g->id }}">{{ $g->name }}</option>
                        @endforeach
                    </select>
                    @error('genres')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Actors</label>
                    <div class="container" id="container">
                        <div class="row">
                            <div class="col-6">
                                <label class="turunwoi" for="actor[0][id]">Actor</label>
                                <select name="actor[0][id]" class="form-select" aria-label="Default select example">
                                    <option selected disabled>Open this selected menu</option>
                                    @foreach ($actors as $a)
                                        <option value="{{$a->id}}">{{$a->name}}</option>
                                    @endforeach
                                </select>
                                @error('actor.*.id')
                                    <p class="text-danger">
                                        The actor field cannot be empty.
                                    </p>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="turunwoi" for="actor[0][character_name]" class="form-label">Character Name</label>
                                <input type="text" class="form-control" name="actor[0][character_name]">
                                @error('actor.*.character_name')
                                    <p class="text-danger">
                                        The character name field cannot be empty.
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" id="addMore" class="btn btn-danger">Add More</button>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="director" class="form-label">Director</label>
                    <input type="text" class="form-control" id="director" name="director">
                    @error('director')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Release Date</label>
                    <input type="date" class="form-control" id="date" name="date">
                    @error('date')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image Url</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @error('image')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="background" class="form-label">Background Url</label>
                    <input type="file" class="form-control" id="background" name="background">
                    @error('background')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="d-grid">
                    <input class="btn btn-danger" type="submit">
                </div>
            </div>
        </form>

    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            var count = 1;
            $('#addMore').on('click', function(){
                $('#container').append(`
                <div class="row">
                    <div class="col-6">
                        <label class="turunwoi" for="actor[` + count + `][id]">Actor</label>
                        <select name="actor[` + count + `][id]" class="form-select" aria-label="Default select example">
                            <option selected disabled>Open this selected menu</option>
                            @foreach ($actors as $a)
                                <option value="{{$a->id}}">{{$a->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="turunwoi" for="actor[` + count + `][character_name]" class="form-label">Character Name</label>
                        <input type="text" class="form-control" name="actor[` + count + `][character_name]">
                    </div>
                </div>
            `);
                count++;
            })
        });
    </script>
@endsection