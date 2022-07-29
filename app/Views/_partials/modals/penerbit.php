<?php
  $url = (isset($penerbit)) ? route_to('update-penerbit', $penerbit->penerbit_id) : route_to('create-penerbit');
  $method = (isset($penerbit)) ? 'PUT' : 'POST';
  $title = (isset($penerbit)) ? 'Update Data Penerbit' : 'New Penerbit';
  $value = isset($penerbit)
    ? [
      'nama_penerbit' => $penerbit->nama,
      'perusahaan' => $penerbit->perusahaan,
    ]
    : [
      'nama_penerbit' => '',
      'perusahaan' => '',
    ];
?>

<div class="modal fade" id="modalPenerbit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
          <form action="" name="form-penerbit" onsubmit="return false;" id="form-penerbit" method="post">
            <div class="d-none" id="method"><?= $method ?></div>
            <?php
              if (isset($penerbit)) {
                ?>
                  <input type="hidden" id="penerbit_id" name="penerbit_id" value="<?= $penerbit->penerbit_id ?>">
                <?php
              }
            ?>
            <div class="form-group mb-3">
              <label for="nama_penerbit" class="form-label">Nama penerbit</label>
              <input type="text" name="nama_penerbit" id="nama_penerbit" value="<?= $value['nama_penerbit'] ?>" class="form-control" placeholder="Masukkan Nama penerbit . . ." aria-describedby="helpId">
              <!-- <small id="helpId" class="text-muted">Help text</small> -->
            </div>
            <div class="form-group mb-3">
              <label for="perusahaan" class="form-label">Perusahaan</label>
              <input type="text" name="perusahaan" id="perusahaan" value="<?= $value['perusahaan'] ?>" class="form-control" placeholder="Masukkan Nama Perusahaan . . ." aria-describedby="helpId">
              <!-- <small id="helpId" class="text-muted">Help text</small> -->
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="send_form" form="form-penerbit">Save</button>
      </div>
    </div>
  </div>
</div>