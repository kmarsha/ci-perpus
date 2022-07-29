<?php
  $url = (isset($rayon)) ? route_to('update-rayon', $rayon->rayon_id) : route_to('create-rayon');
  $method = (isset($rayon)) ? 'PUT' : 'POST';
  $title = (isset($rayon)) ? 'Update Data Rayon' : 'New Rayon';
  $value = isset($rayon)
    ? [
      'nama_rayon' => $rayon->nama,
      'jumlah_siswa' => $rayon->jumlah_siswa,
      'pembimbing' => $rayon->pembimbing,
    ]
    : [
      'nama_rayon' => '',
      'jumlah_siswa' => '',
      'pembimbing' => '',
    ];
?>

<div class="modal fade" id="modalRayon" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
          <form action="" name="form-rayon" onsubmit="return false;" id="form-rayon" method="post">
            <div class="d-none" id="method"><?= $method ?></div>
            <?php
              if (isset($rayon)) {
                ?>
                  <input type="hidden" id="rayon_id" name="rayon_id" value="<?= $rayon->rayon_id ?>">
                <?php
              }
            ?>
            <div class="form-group mb-3">
              <label for="nama_rayon" class="form-label">Nama Rayon</label>
              <input type="text" name="nama_rayon" id="nama_rayon" value="<?= $value['nama_rayon'] ?>" class="form-control" placeholder="Masukkan Nama Rayon . . ." aria-describedby="helpId">
              <!-- <small id="helpId" class="text-muted">Help text</small> -->
            </div>
            <div class="form-group mb-3">
              <label for="jumlah_siswa" class="form-label">Jumlah Siswa</label>
              <input type="number" name="jumlah_siswa" id="jumlah_siswa" value="<?= $value['jumlah_siswa'] ?>" class="form-control" placeholder="Masukkan Jumlah Siswa . . ." aria-describedby="helpId">
              <!-- <small id="helpId" class="text-muted">Help text</small> -->
            </div>
            <div class="form-group mb-3">
              <label for="pembimbing" class="form-label">Pembimbing Rayon</label>
              <input type="text" name="pembimbing" id="pembimbing" value="<?= $value['pembimbing'] ?>" class="form-control" placeholder="Masukkan Pembimbing Rayon . . ." aria-describedby="helpId">
              <!-- <small id="helpId" class="text-muted">Help text</small> -->
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="send_form" form="form-rayon">Save</button>
      </div>
    </div>
  </div>
</div>