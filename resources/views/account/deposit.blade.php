@extends('layouts.main')
@section('content')
    <div class="container" style="margin-top: 5rem;">
        <div class="row text-center justify-content-center">
            <div class="col-md-9">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card-title">
                            <h1>Silahkan lakukan pembayaran ke rekening dibawah ini</h1>
                            <i>
                                <p>Pengisian saldo dilakukan secara manual oleh admin <strong>pada jam deposit</strong>. Minimal isi
                                    saldo adalah <strong>10.000</strong> untuk bank dan <strong>5.000</strong> untuk ewallet dengan biaya 0 rupiah. Saldo yang
                                    di deposit kan hanya dapat ditarik dalam bentuk produk seperti voucher game, ewallet dll
                                    dan kami tidak menyediakan opsi penarikan ke bank atau ewallet secara langsung.</p>
                            </i>
                            <b>
                                <p>Jam deposit 09.00-22.00 WIB</p>
                            </b>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <h5>BCA</h5>
                                <p>6170661913</p>
                            </li>
                            <li class="list-group-item">
                                <h5>Mandiri</h5>
                                <p>1410019703008</p>
                            </li>
                            <li class="list-group-item">
                                <h5>Bank Jago</h5>
                                <p>106635300122 (rizkyjago123)</p>
                            </li>
                            <li class="list-group-item">
                                <h5>Dana</h5>
                                <p>081232435871</p>
                            </li>
                        </ul>
                        <a href="/account/deposit/konfirmasi"><button class="btn btn-primary w-100 mt-3">Konfirmasi Deposit</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
