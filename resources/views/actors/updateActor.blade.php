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
    <div class="isi container">
        <h3 class="mb-5"><b>Edit Actor</b></h3>
        <form action={{url('/actors/update/'.$actors->id)}} method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-1">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{$actors->name}}" type="text" class="form-control" id="name" name="name">
                    @error('name')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="turunwoi" for="gender">Gender</label>
                        <select name="gender" class="form-select" aria-label="Default select example">
                            @if ($actors->gender == 'Male')
                                <option selected value="Male">Male</option>
                                <option value="Female">Female</option>
                            @else
                                <option value="Male">Male</option>
                                <option selected value="Female">Female</option>
                            @endif
                        </select>
                        @error('gender')
                            <p class="text-danger">
                                {{$message}}
                            </p>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="biography" class="form-label">Biography</label>
                    <textarea class="form-control" id="biography" name="biography" rows="3">{{$actors->biography}}</textarea>
                    @error('biography')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                    <input value="{{date('Y-m-d',strtotime($actors->date_of_birth))}}" type="date" class="form-control" id="date_of_birth" name="date_of_birth">
                    @error('date_of_birth')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="place_of_birth" class="form-label">Place of Birth</label>
                    <input value="{{$actors->place_of_birth}}" type="text" class="form-control" id="place_of_birth" name="place_of_birth">
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
                    <input value="{{$actors->popularity}}" type="text" class="form-control" id="popularity" name="popularity">
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

