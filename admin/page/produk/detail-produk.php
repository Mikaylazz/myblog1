<?php
require_once(__DIR__ . '/../../../model/Koneksi.php');


$db = new Koneksi();
$conn = $db->getConnection();

$id = $_GET['id'];
$query = "SELECT * FROM produk WHERE id_produk = $id";
$result = $conn->query($query);
$row = $result->fetch_assoc();
?>

<h2 class="mt-4 mb-4"><i class="fas fa-box-open"></i> Detail Produk</h2>

<div class="row">
  <div class="col-md-5">
    <img src="/img/pensil.jpeg" class="card-img-top" alt="<?= $row['nama_produk']; ?>">
  </div>
  <div class="col-md-7">
    <h3><?= $row['nama_produk']; ?></h3>
    <p><strong>Merk:</strong> <?= $row['merk_produk']; ?></p>
    <p><strong>Harga:</strong> Rp<?= number_format($row['harga'], 0, ',', '.'); ?></p>
    <p><strong>Stok:</strong> <?= $row['stok']; ?></p>
    <p><?= $row['deskripsi']; ?></p>
    <a href="dashboard.php?module=produk&page=daftar-produk" class="btn btn-secondary">Kembali</a>
  </div>
</div>
