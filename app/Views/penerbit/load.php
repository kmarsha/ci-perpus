<table id="penerbit-table" class="table table-striped">
  <thead class="thead-inverse">
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Perusahaan</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $no = 1;
      foreach ($penerbits as $penerbit) {
        ?>
          <tr>
            <td scope="row"><?= $no++ ?></td>
            <td><?= $penerbit->nama_penerbit ?></td>
            <td><?= $penerbit->perusahaan ?></td>
            <td class="row justify-content-around">
              <button class="btn btn-warning" onclick="editPenerbit('<?= $penerbit->penerbit_id ?>')">Edit</button>
              <button class="btn btn-danger" onclick="return (confirm('Yakin Hapus Data Penerbit <?= $penerbit->nama_penerbit ?> ?')) ? deletePenerbit('<?= $penerbit->penerbit_id ?>') : '' ">Hapus</button>
            </td>
          </tr>
        <?php
      }
    ?>
  </tbody>
</table>