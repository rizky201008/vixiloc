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
                        <a href="/deposit"><button class="btn btn-info w-100 mb-2"><i
                                    class="bi bi-wallet-fill"></i>Deposit</button></a>
                        <a href="/help"><button class="btn btn-info w-100 mb-2"><i
                                    class="bi bi-headset"></i>Bantuan</button></a>
                        <form action="/auth/logout" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100"><i class="bi bi-box-arrow-left"></i>
                                Log Out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h5>Pesanan</h5>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Ref Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($pesanan as $order)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $order->product_name }}</td>
                                        <td>{{ $order->price }}</td>
                                        <td>{{ $order->ref }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection