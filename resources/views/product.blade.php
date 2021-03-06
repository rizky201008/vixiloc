@extends('layouts.main')
@section('content')
    <div class="container" style="padding-top: 10rem; min-height: 700px;">
        <div class="row">
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
            @if (session()->has('saldo'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oh No!</strong> {{ session('saldo') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            @if ($category->product->count())
                <form action="" method="post">
                    @csrf
                    <label for="dest" class="form-label">Masukkan ID user</label>
                    <input type="text" id="dest" class="form-control mb-3" placeholder="Masukkan id user"
                        name="destinasi">
                    <label for="ref" class="form-label">Kode Transaksi</label>
                    <input type="text" class="form-control mb-3" id="ref" readonly
                        value="{{ 'tx' . rand(0, 9999) }}" name="ref">

                    <label for="produk">Pilih Produk</label>
                    <select class="form-select mb-3" id="produk" name="sku">
                        @foreach ($category->product as $product)
                            <option value="{{ $product->sku }}">{{ $product->name }}
                                {{ 'Rp. ' . number_format($product->price, 0, ',', '.') }}</option>
                        @endforeach
                    </select>

                    <button class="btn btn-primary w-100" type="submit">Konfirmasi</button>
                </form>
            @else
                <h1>Produk Kosong</h1>
            @endif
        </div>
    </div>
@endsection
