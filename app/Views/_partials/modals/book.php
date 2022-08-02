<?php
  $url = (isset($book)) ? route_to('update-book', $book->buku_id) : route_to('create-book');
  $method = (isset($book)) ? 'PUT' : 'POST';
  $title = (isset($book)) ? 'Update Data Buku' : 'New Buku';
  $value = isset($book)
    ? [
      'judul_buku' => $book->judul_buku,
      'penulis_buku' => $book->penulis,
      'penerbit_id' => $book->penerbit_id,
      'tahun_terbit' => $book->tahun_terbit,
      'jumlah_buku' => $book->jumlah,
    ]
    : [
      'judul_buku' => '',
      'penulis_buku' => '',
      'penerbit_id' => '',
      'tahun_terbit' => '',
      'jumlah_buku' => '',
    ];
?>

<div class="modal fade" id="modalBuku" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
          <form action="" name="form-book" onsubmit="return false;" id="form-book" method="post">
            <div class="d-none" id="method"><?= $method ?></div>
            <?php
              if (isset($book)) {
                ?>
                  <input type="hidden" id="buku_id" name="buku_id" value="<?= $book->buku_id ?>">
                <?php
              }
            ?>
            <div class="form-group mb-3">
              <label for="judul_buku" class="form-label">Judul Buku</label>
              <input type="text" name="judul_buku" id="judul_buku" value="<?= $value['judul_buku'] ?>" class="form-control" placeholder="Masukkan Judul Buku . . ." aria-describedby="helpId">
              <!-- <small id="helpId" class="text-muted">Help text</small> -->
            </div>
            <div class="form-group mb-3">
              <label for="penulis_buku" class="form-label">Penulis Buku</label>
              <input type="text" name="penulis_buku" id="penulis_buku" value="<?= $value['penulis_buku'] ?>" class="form-control" placeholder="Masukkan Penulis Buku . . ." aria-describedby="helpId">
              <!-- <small id="helpId" class="text-muted">Help text</small> -->
            </div>
            <div class="form-group mb-3">
              <label for="penerbit" class="form-label">Penerbit</label>
              <select class="form-control select2" style="width: 100%;" name="penerbit" id="penerbit">
                <?php
                  if (isset($book)) {
                    foreach ($penerbits as $penerbit) {
                      if ($penerbit->penerbit_id == $book->penerbit_id) {
                      ?>
                        <option value="<?= $book->penerbit_id ?>" selected><?= $penerbit->nama_penerbit ?></option>
                      <?php
                      }
                    }
                    ?>
                    <option disabled></option>
                    <?php
                  } 
                  ?>
                  <?php
                  foreach ($penerbits as $penerbit) {
                    ?>
                      <option value="<?= $penerbit->penerbit_id ?>"><?= $penerbit->nama_penerbit ?></option>
                    <?php
                  }
                ?>
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
              <input type="text" name="tahun_terbit" id="tahun_terbit" value="<?= $value['tahun_terbit'] ?>" class="form-control" placeholder="Masukkan Tahun Terbit . . ." aria-describedby="helpId">
              <!-- <small id="helpId" class="text-muted">Help text</small> -->
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="send_form" form="form-book">Save</button>
      </div>
    </div>
  </div>
</div>