@extends('layouts.main')
@section('content')
    <section id="welcome-1">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-5">
                    <img src="/img/welcome/undraw_quitting_time_re_1whp.svg" alt="undraw_quitting_time">
                </div>
                <div class="col-md-5 text-center">
                    <p><strong style="color: yellow;">Vixiloc</strong><br>Tempatnya beli produk digital dengan harga murah
                        dan
                        dijamin aman.</p></br>
                    <div class="row justify-content-center">
                        <div class="col-4">
                            <div class="welcome-btn">
                                <a href="#explore"><i class="bi bi-compass text-light fs-5">Explore</i></a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="welcome-btn">
                                <a href="https://github.com/rizky201008/vixiloc"><i class="bi bi-github text-light fs-5">Source</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <svg id="explore" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#F872A3" fill-opacity="1"
                d="M0,256L17.1,245.3C34.3,235,69,213,103,213.3C137.1,213,171,235,206,208C240,181,274,107,309,112C342.9,117,377,203,411,218.7C445.7,235,480,181,514,154.7C548.6,128,583,128,617,122.7C651.4,117,686,107,720,128C754.3,149,789,203,823,192C857.1,181,891,107,926,112C960,117,994,203,1029,213.3C1062.9,224,1097,160,1131,154.7C1165.7,149,1200,203,1234,202.7C1268.6,203,1303,149,1337,144C1371.4,139,1406,181,1423,202.7L1440,224L1440,320L1422.9,320C1405.7,320,1371,320,1337,320C1302.9,320,1269,320,1234,320C1200,320,1166,320,1131,320C1097.1,320,1063,320,1029,320C994.3,320,960,320,926,320C891.4,320,857,320,823,320C788.6,320,754,320,720,320C685.7,320,651,320,617,320C582.9,320,549,320,514,320C480,320,446,320,411,320C377.1,320,343,320,309,320C274.3,320,240,320,206,320C171.4,320,137,320,103,320C68.6,320,34,320,17,320L0,320Z">
            </path>
        </svg>
    </section>

    <section id="welcome-2">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-5">
                    <img src="/img/welcome/undraw_authentication_re_svpt.svg" alt="undraw_authentication_re_svpt">
                </div>
                <div class="col-md-5">
                    <p><strong>PT. VIXILOC BERKAH SELALU</strong></p>
                    <p>Vixiloc telah terdaftar secara resmi di pemerintahan Republik Indonesia dan telah legal beroperasi
                        sebagai bisnis
                        yang berjalan di bidang penjualan pulsa dan produk sejenis.</p>

                    <p>No. : AHU-023773.AH.01.30.Tahun 2022</p>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#E50053" fill-opacity="1"
                d="M0,256L17.1,245.3C34.3,235,69,213,103,213.3C137.1,213,171,235,206,208C240,181,274,107,309,112C342.9,117,377,203,411,218.7C445.7,235,480,181,514,154.7C548.6,128,583,128,617,122.7C651.4,117,686,107,720,128C754.3,149,789,203,823,192C857.1,181,891,107,926,112C960,117,994,203,1029,213.3C1062.9,224,1097,160,1131,154.7C1165.7,149,1200,203,1234,202.7C1268.6,203,1303,149,1337,144C1371.4,139,1406,181,1423,202.7L1440,224L1440,320L1422.9,320C1405.7,320,1371,320,1337,320C1302.9,320,1269,320,1234,320C1200,320,1166,320,1131,320C1097.1,320,1063,320,1029,320C994.3,320,960,320,926,320C891.4,320,857,320,823,320C788.6,320,754,320,720,320C685.7,320,651,320,617,320C582.9,320,549,320,514,320C480,320,446,320,411,320C377.1,320,343,320,309,320C274.3,320,240,320,206,320C171.4,320,137,320,103,320C68.6,320,34,320,17,320L0,320Z">
            </path>
        </svg>
    </section>

    <section id="welcome-3">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-5">
                    <img src="/img/welcome/undraw_join_re_w1lh.svg" alt="undraw_join_re_w1lh">
                </div>
                <div class="col-md-5">
                    <p>Yakin dengan legalitas kami? Yuk daftar sekarang</p>
                    <div class="row justify-content-center">
                        <div class="col-5">
                            <div class="welcome-btn">
                                <a href="/auth/register"><i class="bi bi-check2-circle fs-5 text-light">Daftar
                                        Sekarang</i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
