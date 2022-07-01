<nav class="navbar navbar-expand-lg navbar-light  fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Vixiloc</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ ($title==='Dashboard') ? 'active' : '' }}" href="/dashboard">Dashboard</a>
        </li>
        @auth
        <li class="nav-item">
          <a href="/akun/deposit" class="nav-link text-warning">Saldo: Rp.{{ auth()->user()->saldo }}</a>
        </li>
        @endauth
      </ul>
      <ul class="navbar-nav ms-auto">
          @auth
          <li class="nav-item">
            <a href="/akun" class="nav-link">Halo! {{ auth()->user()->name }}</a>
          </li>
          <li class="nav-item">
            
            <form action="/auth/logout" method="post">
              @csrf
            <button type="submit" class="btn btn-danger"><i class="bi bi-box-arrow-left"></i> Logout</button>
            </form>
          </li>
          @else
                  <li class="nav-item">
                    <a class="nav-link {{ ($title==='Login') ? 'active' : '' }}" href="/auth/login">Login</a>
                  </li>
                  @endauth
                </ul>
    </div>
  </div>
</nav>