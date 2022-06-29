<nav class="navbar navbar-expand-lg navbar-light fixed-top">
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
      </ul>
      <ul class="navbar-nav ms-auto">
          @auth
          <li class="nav-item m-1">
            <a href="/akun/deposit"><button class="btn btn-warning">Saldo {{ auth()->user()->saldo }}</button></a>
          </li>
          <li class="nav-item m-1">
            <a href="/akun"><button class="btn btn-info">{{ auth()->user()->name }}</button></a>
          </li>
          <li class="nav-item m-1">
            
            <form action="/auth/logout" method="post">
              @csrf
            <button type="submit" class="btn btn-dark">Logout</button>
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