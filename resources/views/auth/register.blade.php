@extends('layouts.main')
@section('content')
    <div class="container" style="padding-top: 10rem; height: 600px">
        <div class="row justify-content-center">
            <div class="col-md-5">
            <form action="/auth/register" method="post">
            @csrf
            <label class="form-label" for="email">Masukkan Email</label>
            <input class="form-control mb-3 @error('email') is-invalid @enderror" name="email" type="text" id="email" placeholder="example@example.com" required>
             @error('email')
            <div class="invalid-feedback mb-3">
                {{ $message }}
            </div>
            @enderror
            <label class="form-label" for="password">
                Masukkan Password
            </label> 
            <input class="form-control mb-3 @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="dajk" required>
           @error('password')
            <div class="invalid-feedback mb-3">
                {{ $message }}
            </div>
            @enderror
            <label class="form-label" for="name">
                Siapa Nama Anda?
            </label>
            <input class="form-control mb-3 @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="John doe" required>
            <button class="btn btn-primary w-100 mb-3">Daftar</button>
        </form>
        <h6 class="text-center">Sudah punya akun? <a href="/auth/login">Login</a></h6>
            </div>
        </div>
    </div>
@endsection