<table id="peminjam-table" class="table table-striped">
  <thead class="thead-inverse">
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Buku</th>
      <th>Tanggal Pinjam</th>
      <th>Tanggal Kembali</th>
      <th>Keterangan</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $no = 1;
      foreach ($peminjams as $peminjam) {
        ?>
          <tr>
            <td scope="row"><?= $no++ ?></td>
            <td><?= $peminjam->nama ?></td>
            <td><?= $peminjam->judul_buku ?></td>
            <td><?= $peminjam->tgl_pinjam ?></td>
            <?php
              if ($peminjam->tgl_kembali != '0000-00-00') {
                ?>
                  <td><?= $peminjam->tgl_kembali ?></td>
                <?php
              } else {
                ?>
                  <td>-</td>
                <?php
              }
            ?>
            <?php
              if ($peminjam->ket == 'kembali') {
                ?>
                <td>Sudah Kembali</td>
                <?php
              } else if ($peminjam->ket == 'belum')  {
                ?>
                <td>Belum Kembali</td>
              <?php
              }
            ?>
            <td class="row justify-content-around">
              <button class="btn btn-warning" onclick="editPeminjam('<?= $peminjam->peminjam_id ?>')">Edit</button>
              <button class="btn btn-danger" onclick="return (confirm('Yakin Hapus Data Peminjam <?= $peminjam->nama ?> (<?= $peminjam->judul_buku ?>) ?')) ? deletePeminjam('<?= $peminjam->peminjam_id ?>') : '' ">Hapus</button>
            </td>
          </tr>
        <?php
      }
    ?>
  </tbody>
</table>