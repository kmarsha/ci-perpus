<table id="rombel-table" class="table table-striped">
  <thead class="thead-inverse">
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Tingkat</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $no = 1;
      foreach ($rombels as $rombel) {
        ?>
          <tr>
            <td scope="row"><?= $no++ ?></td>
            <td class="text-left"><?= $rombel->nama ?></td>
            <td><?= $rombel->tingkat ?></td>
            <td class="row justify-content-around">
              <button class="btn btn-warning" onclick="editRombel('<?= $rombel->rombel_id ?>')">Edit</button>
              <button class="btn btn-danger" onclick="return (confirm('Yakin Hapus Data Rombel <?= $rombel->nama ?> ?')) ? deleteRombel('<?= $rombel->rombel_id ?>') : '' ">Hapus</button>
            </td>
          </tr>
        <?php
      }
    ?>
  </tbody>
</table>