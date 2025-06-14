<?php
// ===== FILE: daftar-produk.php =====
require_once(__DIR__ . '/../../../model/Koneksi.php');

$db = new Koneksi();
$conn = $db->getConnection();

$query = "
    SELECT p.*, s.merk_subkategori, g.nama_file 
    FROM produk p
    JOIN sub_kategori s ON p.id_sub_kategori = s.id_sub_kategori
    LEFT JOIN (
        SELECT gp1.*
        FROM gambar_produk gp1
        INNER JOIN (
            SELECT id_produk, MIN(id_gambar) AS min_id_gambar
            FROM gambar_produk
            GROUP BY id_produk
        ) gp2 ON gp1.id_produk = gp2.id_produk AND gp1.id_gambar = gp2.min_id_gambar
    ) g ON p.id_produk = g.id_produk
";

$result = $conn->query($query);
?>

<h2 class="mt-4 mb-4"><i class="fas fa-layer-group"></i> Produk</h2>

<div class="mb-2">
    <a href="dashboard.php?module=produk&page=tambah-produk" class="btn btn-sm btn-info">
        <i class="fa fa-plus"></i> Tambah Produk
    </a>
</div>

<div class="row">
  <?php while($row = $result->fetch_assoc()) { ?>
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="/MYBLOG.COM/img/<?= $row['nama_file'] ? $row['nama_file'] : 'default.jpg'; ?>" class="card-img-top" alt="<?= $row['nama_produk']; ?>">
        <div class="card-body">
          <h5 class="card-title"><?= $row['nama_produk']; ?></h5>
          <p class="card-text"><strong>Merk:</strong> <?= $row['merk_subkategori']; ?></p>
          <p class="card-text text-danger"><strong>Rp<?= number_format($row['harga'], 0, ',', '.'); ?></strong></p>
        </div>
        <div class="card-footer text-center bg-white">
          <a href="dashboard.php?module=produk&page=detail-produk&id=<?= $row['id_produk']; ?>" class="btn btn-primary btn-sm">Lihat Detail</a>
          <a href="dashboard.php?module=produk&page=edit-produk&id=<?= $row['id_produk']; ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="dashboard.php?module=produk&page=hapus-produk&id=<?= $row['id_produk']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?');">Hapus</a>
        </div>
      </div>
    </div>
  <?php } ?>
</div>


