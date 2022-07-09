@extends('layouts.main')
@section('content')
    <section id="head-content">
        <h3 class="txt-welcome text-center text-light">Selamat Datang Di Vixiloc</h3>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffff" fill-opacity="1"
                d="M0,160L21.8,165.3C43.6,171,87,181,131,170.7C174.5,160,218,128,262,138.7C305.5,149,349,203,393,186.7C436.4,171,480,85,524,74.7C567.3,64,611,128,655,160C698.2,192,742,192,785,176C829.1,160,873,128,916,117.3C960,107,1004,117,1047,144C1090.9,171,1135,213,1178,202.7C1221.8,192,1265,128,1309,101.3C1352.7,75,1396,85,1418,90.7L1440,96L1440,320L1418.2,320C1396.4,320,1353,320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z">
            </path>
        </svg>
    </section>
    <div class="container">
        <div class="row justify-content-center text-center">
            <h1 class="cat-game mb-5">Game</h1>
            @foreach ($game as $games)
                <div class="col-4">
                    <div class="container">
                        <a href="/product/{{ $games->slug }}"><img class="category-img mb-2" src="{{ $games->img }}"
                                alt="{{ $games->name }}"></a>
                        <p class="category-txt">{{ $games->name }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center text-center">
            <h1 class="mb-5">Voucher</h1>
            @foreach ($voucher as $vouchers)
                <div class="col-4">
                    <div class="container">
                        <a href="/product/{{ $vouchers->slug }}"><img class="category-img mb-2"
                                src="{{ $vouchers->img }}" alt="{{ $vouchers->name }}"></a>
                        <p class="category-txt">{{ $vouchers->name }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
