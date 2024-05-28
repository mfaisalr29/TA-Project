
<nav class="navbar navbar-expand-lg navbar-dark">
  @php
    $exceptions1 = ["Dashboard", "Admin Dashboard", "Profile Warga", "Profile Admin", "Input Tagihan IPL", "Lihat Tagihan IPL", "Kondisi Air dan Alat", "Tagihan IPL Warga", "Daftar Akun Warga"];
    $exceptions2 = ["Home"];
  @endphp
  <div class="container">
    <a class="navbar-brand" href="/" style="padding-right: 120px">BCV I</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ ($title === "Home") ? 'active' : ''}}" href="/" style="padding-right: 50px">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === "About") ? 'active' : ''}}" href="/about" style="padding-right: 50px">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === "Lokasi") ? 'active' : ''}}" href="/lokasi" style="padding-right: 50px">Lokasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($title === "Kontak") ? 'active' : ''}}" href="/kontak" style="padding-right: 50px">Kontak</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          @unless (in_array($title, $exceptions1))
            <a href="/login" class="btn" type="submit" style="color: black; background: #FE8660">Sign In</a>
          @endunless
        </li>
        @unless (in_array($title, $exceptions2))
          <li class="nav-item">
            <div class="d-flex">
              <form action="" method="get">
                <div class="input-group">
                  <input
                    name="q"
                    type="text"
                    class="form-control"
                    placeholder="Search..."
                    aria-label="Search"
                    aria-describedby="searchBtn"
                  />
                  <button class="btn main-nav search-btn" type="submit" id="searchBtn">
                    <i class="bi bi-search"></i>
                  </button>
                </div>
              </form>
              <a href="#" class="btn person-btn"><i class="bi bi-person"></i></a>
            </div>
          </li>
        @endunless
        
      </ul>
    </div>
  </div>
</nav>