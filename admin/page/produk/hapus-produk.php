<?php
require_once(__DIR__ . '/../../../model/Koneksi.php');

$db = new Koneksi();
$conn = $db->getConnection();

$id = $_GET['id'];

// Hapus gambar dulu jika ada
$conn->query("DELETE FROM gambar_produk WHERE id_produk = $id");

// Lalu hapus produk
$conn->query("DELETE FROM produk WHERE id_produk = $id");

header("Location: dashboard.php?module=produk&page=daftar-produk");
exit;
