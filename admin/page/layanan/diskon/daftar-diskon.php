<?php
require_once(__DIR__ . '/../../../../model/Koneksi.php');
$db = new Koneksi();
$conn = $db->getConnection();

$result = $conn->query("SELECT * FROM diskon");
?>

<h2><i class="fas fa-tags"></i> Daftar Diskon</h2>
<a href="page/layanan/diskon/tambah-diskon.php" class="btn btn-primary mb-3">Tambah Diskon</a>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Gambar</th>
      <th>Deskripsi</th>
      <th>Tanggal Aktif</th>
      <th>Status</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; while ($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nama_diskon'] ?></td>
        <td>
          <?php if (!empty($row['gambar'])): ?>
            <img src="assets/img/<?= $row['gambar'] ?>" width="100">
          <?php else: ?>
            <em>Tidak ada gambar</em>
          <?php endif; ?>
        </td>
        <td><?= $row['deskripsi'] ?></td>
        <td><?= $row['tanggal_aktif'] ?></td>
        <td><?= $row['status'] ?></td>
        <td>
          <a href="page/layanan/diskon/edit-diskon.php?id=<?= $row['id_diskon'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="page/layanan/diskon/hapus-diskon.php?id=<?= $row['id_diskon'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
