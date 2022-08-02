<table id="book-table" class="table table-striped">
  <thead class="thead-inverse">
    <tr>
      <th>No</th>
      <th>Judul</th>
      <th>Penulis</th>
      <th>Penerbit</th>
      <th>Tahun Terbit</th>
      <th>Status</th>
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
            <td class="text-capitalize"><?= $book->status ?></td>
            <td class="row justify-content-around">
              <button class="btn btn-warning" onclick="editBook('<?= $book->buku_id ?>')">Edit</button>
              <button class="btn btn-danger" onclick="return (confirm('Yakin Hapus Data Buku <?= $book->judul_buku ?> ?')) ? deleteBook('<?= $book->buku_id ?>') : '' ">Hapus</button>
            </td>
          </tr>
        <?php
      }
    ?>
  </tbody>
</table>