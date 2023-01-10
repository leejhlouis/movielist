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
        margin-bottom: 0.4%;
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
        <h3 class="mb-5"><b>Add Actor</b></h3>
        <form action={{url('/actors/insert')}} method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-1">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                    @error('name')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="turunwoi" for="gender">Gender</label>
                        <select name="gender" class="form-select" aria-label="Default select example">
                            <option selected disabled>Open this selected menu</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        @error('gender')
                            <p class="text-danger">
                                {{$message}}
                            </p>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="biography" class="form-label">Biography</label>
                    <textarea class="form-control" id="biography" name="biography" rows="3"></textarea>
                    @error('biography')
                    <p class="text-danger">
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
                    @error('date_of_birth')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="place_of_birth" class="form-label">Place of Birth</label>
                    <input type="text" class="form-control" id="place_of_birth" name="place_of_birth">
                    @error('place_of_birth')
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
                    <label for="popularity" class="form-label">Popularity</label>
                    <input type="text" class="form-control" id="popularity" name="popularity">
                    @error('popularity')
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

