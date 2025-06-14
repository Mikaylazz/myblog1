<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/myblog.com/model/Kategori.php');

$id = $_GET['id'];
$kategori = new Kategori();
$data = $kategori->getById($id); // fungsi ini harus ada di class Kategori

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['status'];
    $kategori->updateStatus($id, $status);
    header("Location: daftar-detailproduk.php");
    exit;
}
?>

<h2>Edit Status Kategori</h2>
<form method="POST">
    <label>Status:</label>
    <select name="status" class="form-control">
        <option value="aktif" <?= $data['status'] == 'aktif' ? 'selected' : '' ?>>Aktif</option>
        <option value="tidak aktif" <?= $data['status'] == 'tidak aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
    </select>
    <br>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="daftar-detailproduk.php" class="btn btn-secondary">Kembali</a>
</form>
