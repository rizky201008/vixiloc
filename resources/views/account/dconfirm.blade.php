@extends('layouts.main')
@section('content')
    <section id="form-confirm">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Yes 🎉🎉🎉</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="" method="post">
                        @csrf
                        <label class="form-label" for="nama">Nama Pemilik Rekening</label>
                        <input class="form-control" type="text" id="nama" name="nama" required>
                        <label class="form-label" for="norek">Nomor Rekening / Ewallet</label>
                        <input class="form-control" type="number" id="norek" name="norek" required>
                        <label class="form-label" for="nominal">Nominal Yang Anda Kirim</label>
                        <input class="form-control mb-3" type="number" id="nominal" name="nominal" required>
                        <label class="form-label" for="bank">Metode Pembayaran</label>
                        <div class="form-check mb-3">
                            <label class="form-check-label" for="bank1">
                                BCA
                            </label>
                            <input class="form-check-input" type="radio" name="bank" value="BCA" id="bank1" required><br>
                            <label class="form-check-label" for="bank2">
                                Mandiri
                            </label>
                            <input class="form-check-input" type="radio" name="bank" value="Mandiri" id="bank2" required><br>
                            <label class="form-check-label" for="bank3">
                                Bank Jago
                            </label>
                            <input class="form-check-input" type="radio" name="bank" value="Bank Jago" id="bank3" required><br>
                            <label class="form-check-label" for="bank4">
                                Dana
                            </label>
                            <input class="form-check-input" type="radio" name="bank" value="Dana" id="bank4" required>
                        </div>
                        <button class="btn btn-primary w-100">Konfirmasi Data</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
