<nav class="navbar navbar-expand-lg navbar-light  fixed-top">
    <div class="container">
        <a class="navbar-brand" href="@auth/home @else/ @endauth">Vixiloc</a>        
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Help' ? 'active' : '' }}" href="/help">Bantuan</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a href="/account/deposit" class="nav-link">Saldo: Rp.{{ auth()->user()->saldo }}</a>
                    </li>
                @endauth
                @auth
                    <li class="nav-item">
                        <a href="/account" class="nav-link">Halo! {{ auth()->user()->name }}</a>
                    </li>
                    <li class="nav-item">

                        <form action="/auth/logout" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger"><i class="bi bi-box-arrow-left"></i> Log
                                Out</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ $title === 'Login' ? 'active' : '' }}" href="/auth/login">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
