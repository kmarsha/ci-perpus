<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
  <div class="container">
    <a href="<?= base_url() ?>/index3.html" class="navbar-brand">
      <img src="<?= base_url() ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() . route_to('home') ?>" class="nav-link <?= ($page == 'home') ? 'active' : '' ?>">Home</a>
        </li>
        <?php
          if (logged_in()) {
            ?>
            <?php
              if (in_groups('admin')) {
                ?>
                  <li class="nav-item">
                    <a href="#" onclick="newPeminjam()" class="nav-link">Pinjam Buku</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link  <?= ($page == 'rayon' || $page == 'rombel' || $page == 'student') ? 'active' : '' ?> dropdown-toggle">Student</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                      <li><a href="<?= base_url() .route_to('rayon') ?>" class="dropdown-item">Rayon</a></li>
                      <li><a href="<?= base_url() . route_to('rombel') ?>" class="dropdown-item">Rombel</a></li>
          
                      <li class="dropdown-divider"></li>
          
                      <li><a href="<?= base_url() . route_to('student') ?>" class="dropdown-item">Data Student</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link <?= ($page == 'penerbit' || $page == 'book' || $page == 'peminjam') ? 'active' : '' ?> dropdown-toggle">Books</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                      <li><a href="<?= base_url() . route_to('penerbit') ?>" class="dropdown-item">Penerbit</a></li>
                      <li><a href="<?= base_url() . route_to('book') ?>" class="dropdown-item">Buku</a></li>
          
                      <li class="dropdown-divider"></li>
                      
                      <li><a href="<?= base_url() . route_to('peminjam') ?>" class="dropdown-item">Peminjam</a></li>
                    </ul>
                  </li>
                <?php
              } elseif (in_groups('student')) {
                ?>
                  <li class="nav-item">
                    <a href="<?= base_url() . route_to('student-books') ?>" class="nav-link <?= ($page == 'buku') ? 'active' : '' ?>">Buku</a>
                  </li>
                <?php
              }
          }
        ?>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-0 ml-md-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
    </div>

    <!-- Right navbar links -->
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a id="dropdownMenuLogout" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link" role="button">
          <i class="fas fa-user-circle"></i>
        </a>
          <ul aria-labelledby="dropdownMenuLogout" class="dropdown-menu dropdown-menu-right border-0 shadow">
            <?php
              if (logged_in()) {
                ?>
                  <li><a href="<?= base_url() . route_to('logout') ?>" class="dropdown-item">Logout</a></li>
                <?php
              } else {
                ?>
                  <li><a href="<?= base_url() . route_to('login') ?>" class="dropdown-item">Login</a></li>
                  <li><a href="<?= base_url() . route_to('register') ?>" class="dropdown-item">Register</a></li>
                <?php
              }
            ?>
          </ul>
      </li>
    </ul>
  </div>
</nav>
<!-- /.navbar -->