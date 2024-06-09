<nav class="navbar navbar-dark navbar-expand-lg bg-primary">
    <div class="container flex justify-content-between">
      <a class="navbar-link" href="#">
        <img class="h-32px" src="{{ url('assets/img/logo-white.png') }}" alt="Barangku Logo" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse flex justify-content-between ms-2" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Pengajuan Barang</a>
          </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{ Route::currentRouteName() === 'login' ? 'active' : '' }}" aria-current="page" href="#">Login</a>
            </li>
          </ul>
      </div>
    </div>
</nav>