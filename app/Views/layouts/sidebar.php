<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?= base_url() ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url() ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?= base_url() . route_to('home') ?>" class="nav-link <?= ($page == 'home') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Home
            </p>
          </a>
        </li>
        <?php
          if (logged_in()) {
            ?>
              <div class="nav-header">PAGES</div>
                <?php
                  if (in_groups('admin')) {
                    ?>
                      <li class="nav-item <?= ($page == 'rayon' || $page == 'rombel' || $page == 'student') ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link <?= ($page == 'rayon' || $page == 'rombel' || $page == 'student') ? 'active' : '' ?>">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                            Students
                            <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="<?= base_url() .route_to('rayon') ?>" class="nav-link <?= ($page == 'rayon') ? 'active' : '' ?>">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Rayon</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?= base_url() . route_to('rombel') ?>" class="nav-link <?= ($page == 'rombel') ? 'active' : '' ?>">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Rombel</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?= base_url() . route_to('student') ?>" class="nav-link <?= ($page == 'student') ? 'active' : '' ?>">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Student</p>
                            </a>
                          </li>
                        </ul>
                      </li>
                      <li class="nav-item <?= ($page == 'book' || $page == 'penerbit' || $page == 'peminjam') ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link <?= ($page == 'book' || $page == 'penerbit' || $page == 'peminjam') ? 'active' : '' ?>">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                            Buku
                            <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="<?= base_url() .route_to('penerbit') ?>" class="nav-link <?= ($page == 'penerbit') ? 'active' : '' ?>">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Penerbit</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?= base_url() . route_to('book') ?>" class="nav-link <?= ($page == 'book') ? 'active' : '' ?>">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Buku</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?= base_url() . route_to('peminjam') ?>" class="nav-link <?= ($page == 'peminjam') ? 'active' : '' ?>">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Peminjam</p>
                            </a>
                          </li>
                        </ul>
                      </li>
                    <?php
                  } else {
                    ?>
                      <li class="nav-item">
                        <a href="<?= base_url() . route_to('student-books') ?>" class="nav-link <?= ($page == 'buku') ? 'active' : '' ?>">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                            Buku
                          </p>
                        </a>
                      </li>
                    <?php
                  }
          }
        ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>