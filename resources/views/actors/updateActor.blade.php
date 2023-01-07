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
        <h3><b>Update Actor for {{$actors->name}}</b></h3>
        <form action={{url('/actors/update/'.$actors->id)}} method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-1">
                <div class="mb-3">
                    <label for="nama" class="form-label">Name</label>
                    <input value="{{$actors->name}}" type="text" class="form-control" id="nama" name="nama">
                    @error('nama')
                        {{$message}}
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="turunwoi" for="gender">Gender</label>
                        <select name="gender" class="form-select" aria-label="Default select example">
                            {{-- <option value="Male">Male</option>
                            <option value="Female">Female</option> --}}
                            @if ($actors->gender == 'Male')
                            <option selected value="Male">Male</option>
                            <option value="Female">Female</option>
                            @else
                            <option value="Male">Male</option>
                            <option selected value="Female">Female</option>
                            @endif
                        </select>
                </div>
                <div class="mb-3">
                    <label for="bio" class="form-label">Biography</label>
                    <textarea class="form-control" id="bio" name="bio" rows="3">{{$actors->biography}}</textarea>
                    @error('bio')
                        {{$message}}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input value="{{date('Y-m-d',strtotime($actors->dob))}}" type="date" class="form-control" id="dob" name="dob">
                    @error('dob')
                        {{$message}}
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pob" class="form-label">Place of Birth</label>
                    <input value="{{$actors->place_of_birth}}" type="text" class="form-control" id="pob" name="pob">
                    @error('pob')
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
                    <label for="popularity" class="form-label">Popularity</label>
                    <input value="{{$actors->popularity}}" type="text" class="form-control" id="popularity" name="popularity">
                    @error('popularity')
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

