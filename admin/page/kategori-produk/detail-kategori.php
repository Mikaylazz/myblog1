<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/myblog.com/model/Kategori.php');
$kategori = new Kategori();

$id = $_GET['id'];
$data = $kategori->getById($id);
?>

<h4 class="mt-4 mb-4"><i class="fas fa-info-circle"></i> Detail Kategori</h4>
<p><strong>Tanggal:</strong> <?=$data['tanggal'];?></p>
<p><strong>Perusahaan:</strong> <?=$data['perusahaan_produksi'];?></p>
<p><strong>Jenis Produk:</strong> <?=$data['jenis_produk'];?></p>
<p><strong>Status:</strong> <?=$data['status'];?></p>
