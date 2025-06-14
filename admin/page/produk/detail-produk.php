<?php
// ===== FILE: detail-produk.php (tidak berubah, tapi tambahkan keamanan ID)
require_once(__DIR__ . '/../../../model/Koneksi.php');

$db = new Koneksi();
$conn = $db->getConnection();

$id = intval($_GET['id']);
$query = "SELECT produk.*, sub_kategori.merk_subkategori, gambar_produk.nama_file 
          FROM produk 
          JOIN sub_kategori ON produk.id_sub_kategori = sub_kategori.id_sub_kategori
          LEFT JOIN gambar_produk ON produk.id_produk = gambar_produk.id_produk AND gambar_produk.id_gambar = 1
          WHERE produk.id_produk = $id";

$result = $conn->query($query);
$row = $result->fetch_assoc();
?>

<h2 class="mt-4 mb-4"><i class="fas fa-box-open"></i> Detail Produk</h2>

<div class="row">
  <div class="col-md-5">
    <img src="/MYBLOG.COM/img/<?= $row['nama_file'] ? $row['nama_file'] : 'default.jpg'; ?>" class="card-img-top" alt="<?= $row['nama_produk']; ?>">
  </div>
  <div class="col-md-7">
    <h3><?= $row['nama_produk']; ?></h3>
    <p><strong>Merk:</strong> <?= $row['merk_subkategori']; ?></p>
    <p><strong>Harga:</strong> Rp<?= number_format($row['harga'], 0, ',', '.'); ?></p>
    <p><strong>Stok:</strong> <?= $row['stok']; ?></p>
    <p><?= $row['deskripsi']; ?></p>
    <a href="dashboard.php?module=produk&page=daftar-produk" class="btn btn-secondary">Kembali</a>
  </div>
</div>
