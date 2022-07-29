<?php
  $url = (isset($rombel)) ? route_to('update-rombel', $rombel->rombel_id) : route_to('create-rombel');
  $method = (isset($rombel)) ? 'PUT' : 'POST';
  $title = (isset($rombel)) ? 'Update Data Rombel' : 'New Rombel';
  $value = isset($rombel)
    ? [
      'nama_rombel' => $rombel->nama,
      'tingkat' => $rombel->tingkat,
    ]
    : [
      'nama_rombel' => '',
      'tingkat' => '',
    ];
?>


<div class="modal fade" id="modalRombel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
          <form action="" name="form-rombel" onsubmit="return false;" id="form-rombel" method="post">
            <div class="d-none" id="method"><?= $method ?></div>
            <?php
              if (isset($rombel)) {
                ?>
                  <input type="hidden" id="rombel_id" name="rombel_id" value="<?= $rombel->rombel_id ?>">
                <?php
              }
            ?>
            <div class="form-group mb-3">
              <label for="nama_rombel" class="form-label">Nama Rombel</label>
              <input type="text" name="nama_rombel" id="nama_rombel" value="<?= $value['nama_rombel'] ?>" class="form-control" placeholder="Masukkan Nama Rombel . . ." aria-describedby="helpId">
              <!-- <small id="helpId" class="text-muted">Help text</small> -->
            </div>
            <div class="form-group mb-3">
              <label for="tingkat" class="form-label">Tingkat</label>
              <input type="number" name="tingkat" id="tingkat" value="<?= $value['tingkat'] ?>" class="form-control" placeholder="Masukkan Tingkat . . ." aria-describedby="helpId">
              <small id="helpId" class="text-muted">Tingkat berarti Kelas (contoh. Tingkat 12)</small>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="send_form" form="form-rombel">Save</button>
      </div>
    </div>
  </div>
</div>