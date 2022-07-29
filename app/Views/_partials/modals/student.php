<?php
  $url = (isset($student)) ? route_to('update-student', $student->student_id) : route_to('create-student');
  $method = (isset($student)) ? 'PUT' : 'POST';
  $title = (isset($student)) ? 'Update Data Student' : 'New Student';
  $value = isset($student)
    ? [
      'nis_siswa' => $student->nis,
      'nama_siswa' => $student->nama,
      'rayon_id' => $student->rayon_id,
      'rombel_id' => $student->rombel_id,
    ]
    : [
      'nis_siswa' => '',
      'nama_siswa' => '',
      'rayon_id' => '',
      'rombel_id' => '',
    ];
?>

<div class="modal fade" id="modalStudent" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
          <form action="" name="form-student" onsubmit="return false;" id="form-student" method="post">
            <div class="d-none" id="method"><?= $method ?></div>
            <?php
              if (isset($student)) {
                ?>
                  <input type="hidden" id="student_id" name="student_id" value="<?= $student->student_id ?>">
                <?php
              }
            ?>
            <div class="form-group mb-3">
              <label for="nis_siswa" class="form-label">NIS Siswa</label>
              <input type="text" name="nis_siswa" id="nis_siswa" value="<?= $value['nis_siswa'] ?>" class="form-control" placeholder="Masukkan NIS Siswa . . ." aria-describedby="helpId">
              <!-- <small id="helpId" class="text-muted">Help text</small> -->
            </div>
            <div class="form-group mb-3">
              <label for="nama_siswa" class="form-label">Nama Siswa</label>
              <input type="text" name="nama_siswa" id="nama_siswa" value="<?= $value['nama_siswa'] ?>" class="form-control" placeholder="Masukkan Nama Siswa . . ." aria-describedby="helpId">
              <!-- <small id="helpId" class="text-muted">Help text</small> -->
            </div>
            <div class="form-group mb-3">
              <label for="rayon" class="form-label">Rayon</label>
              <select class="form-control" name="rayon" id="rayon">
                <?php
                  if (isset($student)) {
                    foreach ($rayons as $rayon) {
                      if ($rayon->rayon_id == $student->rayon_id) {
                      ?>
                        <option value="<?= $student->rayon_id ?>" selected><?= $rayon->nama ?></option>
                      <?php
                      }
                    }
                    ?>
                    <option disabled></option>
                    <?php
                  } 
                  ?>
                  <?php
                  foreach ($rayons as $rayon) {
                    ?>
                      <option value="<?= $rayon->rayon_id ?>"><?= $rayon->nama ?></option>
                    <?php
                  }
                ?>
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="rombel" class="form-label">Rombel</label>
              <select class="form-control" name="rombel" id="rombel">
                <?php
                  if (isset($student)) {
                    foreach ($rombels as $rombel) {
                      if ($rombel->rombel_id == $student->rombel_id) {
                      ?>
                        <option value="<?= $student->rombel_id ?>" selected><?= $rombel->nama ?></option>
                      <?php
                      }
                    }
                    ?>
                    <option disabled></option>
                    <?php
                  } 
                ?>
                <?php
                  foreach ($rombels as $rombel) {
                    ?>
                      <option value="<?= $rombel->rombel_id ?>"><?= $rombel->nama ?></option>
                    <?php
                  }
                ?>
              </select>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="send_form" form="form-student">Save</button>
      </div>
    </div>
  </div>
</div>