<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>
  Data Rayon
<?= $this->endSection() ?>

<?= $this->section('page-header') ?>
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Student Rayon</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Student</a></li>
            <li class="breadcrumb-item active">Rayon</li>
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
              <h2 class="text-center">Data Rayon</h2>
            </div>
            <div class="card-body">
              <div class="text-right mb-3">
                <button type="button" class="btn btn-primary" onclick="newRayon()">+ Rayon</button>
              </div>
              <div class="table-wrapper">
                <div id="load-rayon"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
<?= $this->endSection() ?>

<?= $this->include('_partials/crudRayon') ;?>