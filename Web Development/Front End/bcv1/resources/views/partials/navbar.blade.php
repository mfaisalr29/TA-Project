<nav class="navbar navbar-expand-lg navbar-dark">
  @php
    $exceptions = ["Dashboard", "Admin Dashboard"];
  @endphp
    <div class="container">
      <a class="navbar-brand" href="/home" style="padding-right: 120px">BCV I</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Home") ? 'active' : ''}} " href="/home" style="padding-right: 50px">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "About") ? 'active' : ''}} " href="/about" style="padding-right: 50px">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Lokasi") ? 'active' : ''}} " href="/lokasi" style="padding-right: 50px">Lokasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Kontak") ? 'active' : ''}} " href="/kontak" style="padding-right: 50px">Kontak</a>
          </li>
          </li>
        </ul>
        
        <ul class="navbar-nav ms-auto">
            <li class ="nav-item">
              @unless (in_array($title, $exceptions))
                <a href="/login" class = "btn" type="submit" style="color : black; background: #FE8660"> Sign In</a>
              @endunless
            </li>
        </ul>
      </div>
    </div>
  </nav>