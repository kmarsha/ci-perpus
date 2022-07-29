<table id="book-table" class="table table-striped">
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
            <td><?= $book->judul ?></td>
            <td><?= $book->penulis ?></td>
            <?php
              foreach ($penerbits as $penerbit) {
                if ($penerbit->penerbit_id == $book->penerbit_id) {
                  ?>
                    <td><?= $penerbit->nama ?></td>
                  <?php
                }
              }
            ?>
            <td><?= $book->tahun_terbit ?></td>
            <td class="row justify-content-around">
              <button class="btn btn-warning" onclick="editBook('<?= $book->buku_id ?>')">Edit</button>
              <button class="btn btn-danger" onclick="return (confirm('Yakin Hapus Data Buku <?= $book->judul ?> ?')) ? deleteBook('<?= $book->buku_id ?>') : '' ">Hapus</button>
            </td>
          </tr>
        <?php
      }
    ?>
  </tbody>
</table>