<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="/home" style="padding-right: 120px">BCV I</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          <li class="nav-item">
            <a class="nav-link <?php echo e(($title === "Home") ? 'active' : ''); ?> " href="/home" style="padding-right: 50px">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo e(($title === "About") ? 'active' : ''); ?> " href="/about" style="padding-right: 50px">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo e(($title === "Lokasi") ? 'active' : ''); ?> " href="/lokasi" style="padding-right: 50px">Lokasi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo e(($title === "Kontak") ? 'active' : ''); ?> " href="/kontak" style="padding-right: 50px">Kontak</a>
          </li>
          </li>
        </ul>
        
        <ul class="navbar-nav ms-auto">
            <li class ="nav-item">
              <?php if($title !== "Dashboard"): ?>
                <a href="/login" class = "btn  bg-warning" type="submit "> Sign In</a>
              <?php endif; ?>
            </li>
        </ul>
      </div>
    </div>
  </nav><?php /**PATH C:\Users\muham\Documents\GitHub\TA-Project\Web Development\Back End\bcv1\resources\views/partials/navbar.blade.php ENDPATH**/ ?>