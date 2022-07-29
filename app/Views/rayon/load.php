<table id="rayon-table" class="table table-striped">
  <thead class="thead-inverse">
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Jumlah Siswa</th>
      <th>Pembimbing</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $no = 1;
      foreach ($rayons as $rayon) {
        ?>
          <tr>
            <td scope="row"><?= $no++ ?></td>
            <td><?= $rayon->nama ?></td>
            <td><?= $rayon->jumlah_siswa ?></td>
            <td><?= $rayon->pembimbing ?></td>
            <td class="row justify-content-around">
              <button class="btn btn-warning" onclick="editRayon('<?= $rayon->rayon_id ?>')">Edit</button>
              <button class="btn btn-danger" onclick="return (confirm('Yakin Hapus Data Rayon <?= $rayon->nama ?> ?')) ? deleteRayon('<?= $rayon->rayon_id ?>') : '' ">Hapus</button>
            </td>
          </tr>
        <?php
      }
    ?>
  </tbody>
</table>