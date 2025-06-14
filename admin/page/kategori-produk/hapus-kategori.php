<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/myblog.com/model/Kategori.php');

$id = $_GET['id'];
$kategori = new Kategori();
$kategori->delete($id);

header("Location: daftar-detailproduk.php");
exit;
