<?php
require_once(__DIR__ . '/../../../../model/Koneksi.php');
$db = new Koneksi();
$conn = $db->getConnection();

$result = $conn->query("SELECT * FROM diskon");
?>

<h2><i class="fas fa-tags"></i> Daftar Voucher</h2>