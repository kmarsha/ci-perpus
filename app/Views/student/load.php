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
        <td><?= $student->nama_siswa ?></td>
        <?php
        foreach ($rayons as $rayon) {
          if ($rayon->rayon_id == $student->rayon_id) {
        ?>
            <td><?= $rayon->nama_rayon ?></td>
        <?php
          }
        }
        ?>
        <?php
        foreach ($rombels as $rombel) {
          if ($rombel->rombel_id == $student->rombel_id) {
        ?>
            <td><?= $rombel->nama_rombel ?></td>
        <?php
          }
        }
        ?>
        <td class="row justify-content-around">
          <button class="btn btn-warning" onclick="editStudent('<?= $student->student_id ?>')">Edit</button>
          <button class="btn btn-danger" onclick="return (confirm('Yakin Hapus Data Siswa <?= $student->nama_siswa ?> ?')) ? deleteStudent('<?= $student->student_id ?>') : '' ">Hapus</button>
        </td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>