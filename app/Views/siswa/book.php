<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>
  Data Buku
<?= $this->endSection() ?>

<?= $this->section('page-header') ?>
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Buku </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Buku</li>
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
              <h2 class="card-title" style="font-size: 2em;">Data Buku</h2>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-wrapper">
                <div id="load-book"></div>
              </div>
            </div>
          </div>
          <div class="card text-center">
            <div class="card-header">
              <h2 class="card-title" style="font-size: 2em;">Data Buku Pinjaman</h2>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="table-wrapper">
                <table class="table table-striped book-table">
                  <thead class="thead-inverse">
                    <tr>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Penulis</th>
                      <th>Tanggal Pinjam</th>
                      <th>Tanggal Kembali</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no = 1;
                      foreach ($buku_pinjams as $buku_pinjam) {
                        ?>
                          <tr>
                            <td scope="row"><?= $no++ ?></td>
                            <td><?= $buku_pinjam->judul_buku ?></td>
                            <td><?= $buku_pinjam->penulis ?></td>
                            <td><?= $buku_pinjam->tgl_pinjam ?></td>
                            <?php
                              if ($buku_pinjam->ket != 'belum') {
                                ?>
                                  <td><?= $buku_pinjam->tgl_kembali ?></td>
                                <?php
                              } else {
                                ?>
                                  <td>-</td>
                                <?php
                              }
                            ?>
                            <?php
                              if ($buku_pinjam->ket == 'kembali') {
                                ?>
                                <td>Sudah Kembali</td>
                                <?php
                              } else if ($buku_pinjam->ket == 'belum')  {
                                ?>
                                <td>Belum Kembali</td>
                              <?php
                              }
                            ?>
                          </tr>
                        <?php
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
<?= $this->endSection() ?>

<?= $this->section('modal') ?>
  <div class="modal fade" id="modalPinjam" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-center">Pinjam Buku</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p id="modal-msg"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-dark" id="btnPinjam" onclick="btnPinjam()">Pinjam</button>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
  <script>
    $(function() {
      getBooks()
    })

    async function getBooks() {
      try {
        var sectionData = $('#load-book')
        url = '<?= base_url() ?>/books'
        const response = await HitData(url, null, "GET")
        sectionData.html(response)
        
        $(".book-table").DataTable({
          'pageLength': 4,
          "responsive": true, "lengthChange": false, "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#book-table-wrapper');
      } catch (error) {
        errorNotif('Error ' . error)
      }
    }

    function pinjamBuku(id, buku, penulis) {
      $('#modalPinjam').modal('show')
      $('#modal-msg').text(`Pinjam Buku ${buku} (${penulis})?`)
      $('#btnPinjam').attr('data-buku-id', id)
    }

    async function btnPinjam() {
      var buku_id = $('#btnPinjam').attr('data-buku-id')
      var today = '<?= date('Y-m-d') ?>'
      var url = `<?= base_url() . route_to('create-peminjam') ?>`
      var data = {
        buku: buku_id,
        tgl_pinjam: today,
        tgl_kembali: null,
      }
      const response = await HitData(url, data, 'POST')
      console.log(response)
    }
  </script>
<?= $this->endSection() ?>