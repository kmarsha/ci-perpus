<table class="table table-striped book-table">
  <thead class="thead-inverse">
    <tr>
      <th>No</th>
      <th>Judul</th>
      <th>Penulis</th>
      <th>Penerbit</th>
      <th>Tahun Terbit</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $no = 1;
      foreach ($books as $book) {
        ?>
          <tr>
            <td scope="row"><?= $no++ ?></td>
            <td><?= $book->judul_buku ?></td>
            <td><?= $book->penulis ?></td>
            <td><?= $book->nama_penerbit ?></td>
            <td><?= $book->tahun_terbit ?></td>
            <td class="row justify-content-around">
              <button class="btn btn-success" onclick="pinjamBuku('<?= $book->buku_id ?>', '<?= $book->judul_buku ?>', '<?= $book->penulis ?>')" <?= ($book->status == 'tersedia') ? '' : 'disabled' ?> >Pinjam</button>
            </td>
          </tr>
        <?php
      }
    ?>
  </tbody>
</table>