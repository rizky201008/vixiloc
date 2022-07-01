@extends('layouts.main')
@section('content')
    <div class="container" style="min-height: 40rem;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3" style="margin-top: 5rem;">
                    <div class="card-body">
                        <div class="card-title">
                           <h1>Halo! {{ auth()->user()->name }}</h1>
                        </div>
                        <div class="card-text mb-1">
                            <p>Saldo: Rp {{ number_format(auth()->user()->saldo) }}</p>
                        </div>
                        <a href="#"><button class="btn btn-info w-100 mb-2"><i class="bi bi-wallet-fill"></i>Deposit</button></a>
                        <a href="#"><button class="btn btn-info w-100 mb-2"><i class="bi bi-headset"></i>Bantuan</button></a>
                        <a href="#"><button class="btn btn-danger w-100"><i class="bi bi-arrow-bar-left"></i>Log Out</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
