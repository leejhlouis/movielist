@extends('layouts.app')

@section('style')
<style>
    .movieSpan{
        color: var(--bs-danger);
    }

    .isi{
        width: 100%;
        max-width: 640px;
        margin: 0 auto;
        margin-top: 3%;
    }
    .parent>.isi>h2{
        text-align: center;
        margin-bottom: 5%;
    }
    .parent>.isi>p{
        text-align: center;
        margin-top: 5%;
    }
    .parent>.isi>p>a{
        text-decoration: none;
    }
</style>
@endsection

@section('content')
    <div class="container parent">
        <div class="isi">
            <h2>Hello, welcome to <span class="movieSpan">Movie</span>List</h2>
            <form action={{url('/register')}} method="POST" enctype="multipart/form-data">
                @csrf
                {{-- pengen fieldsetnya jadi item tapi nanti aja dah --}}
                <div class="mb-3">
                    <input name="username" type="text" placeholder="Username" class="form-control text-white bg-dark border border-secondary" id="exampleInputUsername1" aria-describedby="usernamelHelp">
                    @error('username')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input name="email" type="email" placeholder="Email address" class="form-control text-white bg-dark border border-secondary" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('email')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input name="password" type="password" placeholder="Password" class="form-control text-white bg-dark border border-secondary" id="exampleInputPassword1">
                    @error('password')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input name="password_confirmation" type="password" placeholder="Confirm password" class="form-control text-white bg-dark border border-secondary" id="exampleInputConPassword1">
                    @error('conPassword')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="d-grid">
                    <button class="btn btn-danger" type="submit">Register</button>
                </div>
            </form>
            <p>Already have an account? <a href={{url('/login')}}><span class="movieSpan">Login Here!</span></a></p>
        </div>
    </div>
@endsection


