@extends('layouts.app')

@section('style')
<style>
    .merah{
        color: var(--bs-danger);
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            <br> <br>
            <h3 class="merah">My Profile</h3>
        </div>
        <div class="col-8">
            <br>
            <h2 class="merah">Update Profile</h2>
            <form action="{{url('/profile')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Name</label>
                    @auth
                        <input value="{{Auth::user()->username}}" type="text" class="form-control" id="nama" name="nama">
                        @error('nama')
                            {{$message}}
                        @enderror
                    @endauth
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    @auth
                        <input value="{{Auth::user()->email}}" type="text" class="form-control" id="email" name="email">
                        @error('email')
                            {{$message}}
                        @enderror
                    @endauth
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">DOB</label>
                    @auth
                        <input value="{{date('Y-m-d',strtotime(Auth::user()->dob))}}" type="date" class="form-control" id="dob" name="dob">
                        @error('dob')
                            {{$message}}
                        @enderror
                    @endauth
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    @auth
                        <input value="{{Auth::user()->phone}}" type="text" class="form-control" id="phone" name="phone">
                        @error('phone')
                            {{$message}}
                        @enderror
                    @endauth
                </div>
                <div class="d-grid">
                    <br>
                    <input class="btn btn-danger" type="submit"></input>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
