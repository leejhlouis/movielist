@extends('layouts.app')

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

@section('content')
    <div class="isi">
        <h3><b>Add Movie</b></h3>
        <form action="">
            <div class="form-1">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Description</label>
                    <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label">Genre</label>
                    <select name="genre" class="form-select" aria-label="Default select example">
                        <option selected disabled>Select the genre</option>
                        <option value="Action">Action</option>
                        <option value="Adventure">Adventure</option>
                        <option value="Sci-fi">Sci-fi</option>
                        <option value="Drama">Drama</option>
                        <option value="Romance">Romance</option>
                        <option value="Thriller">Thriller</option>
                        <option value="Horror">Horror</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Actors</label>
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                {{-- pengen masukin nama actornya ke inserrt trs pake tag select tapi gimana ya wkwk --}}
                                <label class="turunwoi" for="actor/1">Actor</label>
                                <select name="actor/1" class="form-select" aria-label="Default select example">
                                    <option selected disabled>Open this selected menu</option>
                                    @foreach ($actors as $a)
                                        <option value="{{$a->name}}">{{$a->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="turunwoi" for="character_name" class="form-label">Character Name</label>
                                <input type="text" class="form-control" id="character_name" name="character_name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                {{-- pengen masukin nama actornya ke inserrt trs pake tag select tapi gimana ya wkwk --}}
                                <label class="turunwoi" for="actor/2">Actor</label>
                                <select name="actor/2" class="form-select" aria-label="Default select example">
                                    <option selected disabled>Open this selected menu</option>
                                    @foreach ($actors as $a)
                                        <option value="{{$a->name}}">{{$a->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="turunwoi" for="character_name2" class="form-label">Character Name</label>
                                <input type="text" class="form-control" id="character_name2" name="character_name2">
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" id="addMore" class="btn btn-primary">Add More</button>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="director" class="form-label">Director</label>
                    <input type="text" class="form-control" id="director" name="director">
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Release Date</label>
                    <input type="date" class="form-control" id="date" name="date">
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Image Url</label>
                    <input type="file" class="form-control" id="img" name="img">
                </div>
                <div class="mb-3">
                    <label for="background" class="form-label">Background Url</label>
                    <input type="file" class="form-control" id="background" name="background">
                </div>
                <div class="d-grid">
                    <input class="btn btn-danger" type="submit"></input>
                </div>
            </div>
        </form>

    </div>
@endsection
