<table id="student-table" class="table table-striped">
  <thead class="thead-inverse">
    <tr>
      <th>No</th>
      <th>NIS</th>
      <th>Nama</th>
      <th>Rayon</th>
      <th>Rombel</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $no = 1;
      foreach ($students as $student) {
        ?>
          <tr>
            <td scope="row"><?= $no++ ?></td>
            <td><?= $student->nis ?></td>
            <td><?= $student->nama ?></td>
            <?php
              foreach ($rayons as $rayon) {
                if ($rayon->rayon_id == $student->rayon_id) {
                  ?>
                    <td><?= $rayon->nama ?></td>
                  <?php
                }
              }
            ?>
            <?php
              foreach ($rombels as $rombel) {
                if ($rombel->rombel_id == $student->rombel_id) {
                  ?>
                    <td><?= $rombel->nama ?></td>
                  <?php
                }
              }
            ?>
            <td class="row justify-content-around">
              <button class="btn btn-warning" onclick="editStudent('<?= $student->student_id ?>')">Edit</button>
              <button class="btn btn-danger" onclick="return (confirm('Yakin Hapus Data Siswa <?= $student->nama ?> ?')) ? deleteStudent('<?= $student->student_id ?>') : '' ">Hapus</button>
            </td>
          </tr>
        <?php
      }
    ?>
  </tbody>
</table>