<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>
  Data Peminjam
<?= $this->endSection() ?>

<?= $this->section('page-header') ?>
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Peminjam </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Buku</a></li>
            <li class="breadcrumb-item active">Peminjam</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <div class="container">
    <div class="content">
      <div class="row">
        <div class="col-12">
          <div class="card text-center">
            <div class="card-header">
              <h2 class="text-center">Data Peminjam</h2>
            </div>
            <div class="card-body">
              <div class="text-right mb-3">
                <button type="button" class="btn btn-primary" onclick="newPeminjam()">+ Peminjam</button>
              </div>
              <div class="table-wrapper">
                <div id="load-peminjam"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
<?= $this->endSection() ?>

<?= $this->include('_partials/crudPeminjam') ;?>