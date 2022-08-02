<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>
  Home
<?= $this->endSection() ?>

<?= $this->section('page-header') ?>
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Home </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">CI Library</a></li>
            <li class="breadcrumb-item active">Home</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-10">
          <div class="card text-center">
            <div class="card-body">
              <h1 class="display-3">Library Management</h1>
              <h2 class="display-4">Codeigniter4</h2>
              <?php
                if (logged_in()) {
                  if (in_groups('admin')) {
                    ?>
                      <div class="row mt-4 justify-content-around">
                        <a href="<?= base_url() . route_to('student') ?>" class="btn btn-primary">Student</a>
                        <a href="<?= base_url() . route_to('book') ?>" class="btn btn-success">Buku</a>
                        <a href="<?= base_url() . route_to('peminjam') ?>" class="btn btn-info">Peminjaman Buku</a>
                      </div>
                    <?php
                  } elseif (in_groups('student')) {
                    ?>
                      <div class="row mt-4 justify-content-center">
                        <a href="<?= base_url() . route_to('student-books') ?>" class="btn btn-primary mx-4">Buku</a>
                        <a href="#" onclick="newPeminjam()" class="btn btn-success mx-4">Pinjam Buku</a>
                      </div>
                    <?php
                  }
                } else {
                  ?>
                    <div class="row mt-4 justify-content-center">
                      <a href="<?= base_url() . route_to('login') ?>" class="btn btn-primary mx-4">Login</a>
                      <a href="<?= base_url() . route_to('register') ?>" class="btn btn-info mx-4">Register</a>
                    </div>
                  <?php
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?= $this->endSection() ?>