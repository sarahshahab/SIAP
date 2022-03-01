<nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <div class="container">
          <a class="navbar-brand">
          <img src="img/logo_perumda.png" alt="Logo Perumda" width="50px">
        </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link {{ ($title === "Antrian Online Pelayanan Pelanggan PDAM Tirta Khatulistiwa Pontianak") ? 'active' : ''}} " href="/">Beranda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  {{ ($title === "Info Pelayanan Pelanggan") ? 'active' : ''}} " href="/info-pelayanan-pelanggan">Info Pelayanan Pelanggan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link  {{ ($title === "Profil") ? 'active' : ''}} " href="/profile">Profil</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>