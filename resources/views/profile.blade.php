@extends('layouts.app')

@section('style')
<style>
    .merah{
        color: var(--bs-danger);
    }

    .gap-lg{
        gap: 8rem;
    }

    .avatar{
        min-width: 50%;
        max-width: 65%;
    }
</style>
@endsection

@section('content')
<div class="container my-4">
    <div class="d-lg-flex align-items-center gap-lg">
        <div class="w-25">
            <h2 class="fw-bold text-center mb-5">My <span class="merah">Profile</span></h2>
            <div class="text-center">
                <a href="#" role="button" data-bs-toggle="modal" data-bs-target="#modal">
                    <img class="avatar rounded-circle border border-danger shadow-lg" src="{{ Auth::user()->img_url ? Auth::user()->img_url : url('/storage/avatars/default.png') }}" alt="">
                </a>
                <h5 class="mt-3">{{ Auth::user()->username }}</h5>
                <p class="text-muted">{{ Auth::user()->email }}</p>
            </div>
        </div>
        <div class="w-75">
            <br>
            <h2 class="fw-bold merah mb-4">Update Profile</h2>
            <form action="{{url('/profile')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    @auth
                        <input value="{{Auth::user()->username}}" type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    @endauth
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    @auth
                        <input value="{{Auth::user()->email}}" type="text" class="form-control" id="email" name="email" placeholder="example@mail.com">
                        @error('email')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    @endauth
                </div>
                <div class="mb-3">
                    <label for="date_of_birth" class="form-label">Date of birth</label>
                    @auth
                        <input value="{{ Auth::user()->dob ? date('Y-m-d',strtotime(Auth::user()->dob)) : "" }}" type="date" class="form-control" id="date_of_birth" name="date_of_birth" >
                        @error('date_of_birth')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    @endauth
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    @auth
                        <input value="{{Auth::user()->phone}}" type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
                        @error('phone')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    @endauth
                </div>
                <div class="d-grid">
                    <br>
                    <input class="btn btn-danger" type="submit">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-dark">
        <form method="POST" action="{{ url('profile/updatePicture') }}">
          {{ method_field('PUT') }}
          @csrf
          <fieldset>
            <div class="modal-header border-0">
              <label for="status" class="h1 modal-title fs-5" id="modalLabel">Update profile picture</label>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="image_URL" class="form-label">Email address</label>
                    <input type="text" class="form-control bg-gray" id="image_URL" name="image_URL" placeholder="Your image URL">
                  </div>
                  <p class="text-muted">Please upload your image to a cloud storage first and paste the URL here!</p>
            </div>
            <div class="modal-footer border-0">
              @csrf
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger">Save changes</button>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
@endsection
