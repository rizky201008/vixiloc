@extends('layouts.main')
@section('content')
    <section id="login" style="min-height: 1000px;">
        <div class="container" style="padding-top: 10rem; height: 600px">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Yes!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Oh No!</strong> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="/auth/login" method="post">
                        @csrf
                        <label class="form-label" for="email">Masukkan Email</label>
                        <input class="form-control mb-3 @error('email') is-invalid @enderror" type="email" id="email"
                            name="email" placeholder="example@example.com" autofocus required>
                        @error('email')
                            <div class="invalid-feedback mb-3">
                                {{ $message }}
                            </div>
                        @enderror
                        <label class="form-label" for="password">
                            Masukkan Password
                        </label>
                        <input class="form-control mb-3 @error('password') is-invalid @enderror" type="password"
                            name="password" id="password" placeholder="Passwordmu rahasiamu" required>
                        @error('password')
                            <div class="invalid-feedback mb-3">
                                {{ $message }}
                            </div>
                        @enderror
                        <button class="btn btn-primary w-100 mb-3">Masuk</button>
                    </form>
                    <h6 class="text-center">Belum punya akun? <a href="/auth/register">Daftar</a></h6>
                </div>
            </div>
        </div>
    </section>
@endsection
