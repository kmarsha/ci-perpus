<?php
  $url = (isset($peminjam)) ? route_to('update-peminjam', $peminjam->peminjam_id) : route_to('create-peminjam');
  $method = (isset($peminjam)) ? 'PUT' : 'POST';
  $title = (isset($peminjam)) ? 'Update Data Peminjam' : 'Pinjam Buku';
  $value = isset($peminjam)
    ? [
      'peminjam' => $peminjam->student_id,
      'buku' => $peminjam->buku_id,
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

<div class="modal fade" id="modalPeminjam" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                  <input type="hidden" id="student_id" name="student_id" value="<?= $peminjam->student_id ?>">
                  <input type="hidden" id="buku_id" name="buku_id" value="<?= $peminjam->buku_id ?>">
                <?php
              }
            ?>
            
            <?php
              if ($method == 'POST') {
                ?>
                  <?php
                    if (in_groups('admin')) {
                      ?>
                        <div class="form-group mb-3">
                          <label for="peminjam" class="form-label">Nama Peminjam</label>
                          <select class="form-control select2" style="width: 100%;" name="peminjam" id="peminjam">
                            <?php
                              if (isset($peminjam)) {
                                foreach ($students as $student) {
                                  if ($student->student_id == $peminjam->student_id) {
                                  ?>
                                    <option value="<?= $peminjam->student_id ?>" selected><?= $student->nama_siswa ?></option>
                                  <?php
                                  }
                                }
                                ?>
                                <option disabled></option>
                                <?php
                              } 
                              ?>
                              <?php
                              foreach ($students as $student) {
                                ?>
                                  <option value="<?= $student->student_id ?>"><?= $student->nama_siswa ?></option>
                                <?php
                              }
                            ?>
                          </select>
                        </div>
                      <?php
                    }
                  ?>

                  <div class="form-group mb-3">
                    <label for="buku" class="form-label">Buku</label>
                    <select class="form-control select2" style="width: 100%;" name="buku" id="buku">
                      <?php
                        if (isset($peminjam)) {
                          foreach ($books as $book) {
                            if ($book->buku_id == $peminjam->buku_id) {
                            ?>
                              <option value="<?= $peminjam->buku_id ?>" selected><?= $book->judul_buku ?></option>
                            <?php
                            }
                          }
                          ?>
                          <option disabled></option>
                          <?php
                        } 
                        ?>
                        <?php
                        foreach ($books as $book) {
                          ?>
                            <option value="<?= $book->buku_id ?>"><?= $book->judul_buku ?></option>
                          <?php
                        }
                      ?>
                    </select>
                  </div>
                <?php
              } 
            ?>

            <?php
              if (in_groups('admin')) {
                ?>
                  <div class="form-group">
                    <label>Tanggal Pinjam:</label>
                      <div class="input-group date datepickers" id="tglPinjam" data-target-input="nearest">
                          <input type="text" name="tgl_pinjam" id="tgl_pinjam" value="<?= $value['tgl_pinjam'] ?>" class="form-control datetimepicker-input" data-target="#tglPinjam" autocomplete="off"/>
                          <div class="input-group-append" data-target="#tglPinjam" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Kembali:</label>
                      <div class="input-group date datepickers" id="tglKembali" data-target-input="nearest">
                          <input type="text" name="tgl_kembali" id="tgl_kembali" value="<?= $value['tgl_kembali'] ?>" class="form-control datetimepicker-input" data-target="#tglKembali" autocomplete="off"/>
                          <div class="input-group-append" data-target="#tglKembali" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                  </div>
                <?php
              } elseif (in_groups('student')) {
                ?>
                  <div class="form-group">
                    <label>Tanggal Pinjam:</label>
                      <div class="input-group date datepickers" id="tglPinjam" data-target-input="nearest">
                          <input type="text" name="tgl_pinjam" id="tgl_pinjam" value="<?= date('Y-m-d') ?>" class="form-control datetimepicker-input" data-target="#tglPinjam" autocomplete="off"/>
                          <div class="input-group-append" data-target="#tglPinjam" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                  </div>
                <?php
              }
            ?>

            <!-- <div class="form-group mb-3">
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
            </div> -->
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