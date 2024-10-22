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
            <h2>Hello, welcome back to <span class="movieSpan">Movie</span>List</h2>
            @error("authError")
                <p class="alert alert-danger">
                    {{ $message }}
                </p>
            @enderror
            
            <form action={{url('/login')}} method="POST" enctype="multipart/form-data">
                @csrf
                {{-- pengen fieldsetnya jadi item tapi nanti aja dah --}}
                <div class="mb-3">
                    <input name="email" type="email" placeholder="Email address" class="form-control text-white bg-dark border border-secondary" id="exampleInputEmail1" aria-describedby="emailHelp" value={{ Cookie::get('cookie_email') ? Cookie::get('cookie_email') : "" }}>
                </div>
                <div class="mb-3">
                    <input name="password" type="password" placeholder="Password" class="form-control text-white bg-dark border border-secondary" id="exampleInputPassword1" value={{ Cookie::get('cookie_password') ? Cookie::get('cookie_password') : "" }}>
                </div>
                <div class="mb-3 form-check">
                    <input name="remember_me" type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                </div>
                <div class="d-grid">
                    <button class="btn btn-danger" type="submit">Login</button>
                </div>
            </form>
            <p>Don't have an account? <a href={{url('/register')}}><span class="movieSpan">Register Here!</span></a></p>
        </div>
    </div>
@endsection


