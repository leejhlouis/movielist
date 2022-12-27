@extends('layouts.app')

@section('style')
<style>
    .movieSpan{
            color: red;
    }

    .isi{
        width: 50%;
        /* background-color: orange; */
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
    <div class="parent">
        <div class="isi">
            <h2>Hello, Welcome back to <span class="movieSpan">Movie</span>List</h2>
            <form action={{url('/login')}} method="POST" enctype="multipart/form-data">
                @csrf
                {{-- pengen fieldsetnya jadi item tapi nanti aja dah --}}
                <div class="mb-3">
                    <input name="email" type="email" placeholder="Email address" class="form-control text-white bg-dark border border-secondary" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('username')
                        {{$message}}
                    @enderror
                </div>
                <div class="mb-3">
                    <input name="password" type="password" placeholder="Password" class="form-control text-white bg-dark border border-secondary" id="exampleInputPassword1">
                    @error('password')
                        {{$message}}
                    @enderror
                </div>
                <div class="mb-3 form-check">
                    <input name="remember_me" type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                </div>
                <div class="d-grid">
                    <button class="btn btn-danger" type="submit">Log In</button>
                </div>
            </form>
            <p>Don't have an account? <a href={{url('/register')}}><span class="movieSpan">Register Here!</span></a></p>
        </div>
    </div>
@endsection


