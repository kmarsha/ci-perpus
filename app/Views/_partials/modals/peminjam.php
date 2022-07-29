<?php
  $url = (isset($peminjam)) ? route_to('update-peminjam', $peminjam->peminjam_id) : route_to('create-peminjam');
  $method = (isset($peminjam)) ? 'PUT' : 'POST';
  $title = (isset($peminjam)) ? 'Update Data Peminjam' : 'Pinjam Buku';
  $value = isset($peminjam)
    ? [
      'peminjam' => $peminjam->nama,
      'buku' => $peminjam->judul_buku,
      'tgl_pinjam' => $peminjam->tgl_pinjam,
      'tgl_kembali' => $peminjam->tgl_kembali,
      'ket' => $peminjam->ket,
    ]
    : [
      'peminjam' => '',
      'buku' => '',
      'tgl_pinjam' => '',
      'tgl_kembali' => '',
      'ket' => '',
    ];
?>

<div class="modal fade" id="modalPeminjam" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"><?= $title ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      <div class="modal-body">
        <div class="container-fluid">
          <form action="" name="form-peminjam" onsubmit="return false;" id="form-peminjam" method="post">
            <div class="d-none" id="method"><?= $method ?></div>
            <?php
              if (isset($peminjam)) {
                ?>
                  <input type="hidden" id="peminjam_id" name="peminjam_id" value="<?= $peminjam->peminjam_id ?>">
                <?php
              }
            ?>
            
            <div class="form-group mb-3">
              <label for="peminjam" class="form-label">Peminjam</label>
              <input class="form-control" list="studentDataListOptions" name="peminjam" id="peminjam" value="<?= $value['peminjam'] ?>" placeholder="Type to search...">
              <datalist id="studentDataListOptions">
                <?php
                  foreach ($students as $student) {
                    ?>
                      <option value="<?= $student->nama ?>" class="datalist-student" id="<?= $student->student_id ?>">
                    <?php
                  }
                ?>
              </datalist>
            </div>
            <div class="form-group mb-3">
              <label for="buku" class="form-label">Buku</label>
              <input class="form-control" list="bookDataListOptions" name="buku" id="buku" value="<?= $value['buku'] ?>" placeholder="Type to search...">
              <datalist id="bookDataListOptions">
                <?php
                  foreach ($books as $book) {
                    ?>
                      <option value="<?= $book->judul ?>" class="datalist-book" id="<?= $book->buku_id ?>">
                    <?php
                  }
                ?>
              </datalist>
            </div>
            <div class="form-group mb-3">
              <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
              <input type="date" name="tgl_pinjam" id="tgl_pinjam" value="<?= $value['tgl_pinjam'] ?>" class="form-control" placeholder="Masukkan Tanggal Pinjam . . ." aria-describedby="helpId">
              <!-- <small id="helpId" class="text-muted">Help text</small> -->
            </div>
            <div class="form-group mb-3">
              <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
              <input type="date" name="tgl_kembali" id="tgl_kembali" value="<?= $value['tgl_kembali'] ?>" class="form-control" placeholder="Masukkan Tanggal Kembali . . ." aria-describedby="helpId">
              <!-- <small id="helpId" class="text-muted">Help text</small> -->
            </div>
            <div class="form-group mb-3">
              <label for="ket" class="form-label">Keterangan</label>
              <select class="form-control" name="ket" id="ket">
                <?php
                  if (isset($peminjam)) {
                    if ($peminjam->ket == 'kembali') {
                      ?>
                      <option value="kembali">Sudah Kembali</option>
                      <?php
                    } else {
                      ?>
                      <option value="belum">Belum Kembali</option>
                    <?php
                    }
                    ?>
                    <option disabled></option>
                    <?php
                  } 
                ?>
                <option value="belum">Belum Kembali</option>
                <option value="kembali">Sudah Kembali</option>
              </select>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="send_form" form="form-peminjam">Save</button>
      </div>
    </div>
  </div>
</div>