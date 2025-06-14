<?php
require_once(__DIR__ . '/../../../../model/Koneksi.php');
$db = new Koneksi();
$conn = $db->getConnection();

$id = $_GET['id'];

$conn->query("DELETE FROM diskon WHERE id_diskon = $id");

header("Location: daftar-diskon.php");
exit;
