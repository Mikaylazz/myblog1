<?php
require_once(__DIR__ . '/../../../../model/Koneksi.php');
$db = new Koneksi();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    if (!empty($gambar)) {
        move_uploaded_file($tmp, __DIR__ . '/../../../../assets/img/' . $gambar);
    }

    $query = "INSERT INTO diskon (nama_diskon, deskripsi, tanggal_aktif, status, gambar) 
              VALUES ('$nama', '$deskripsi', '$tanggal', '$status', '$gambar')";
    $conn->query($query);
    header("Location: daftar-diskon.php");
    exit;
}
?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container my-4">
    <h4 class="mb-4"><i class="fa fa-plus-circle"></i> Tambah Diskon</h4>
    <form method="POST" enctype="multipart/form-data" class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Nama Diskon</label>
            <input type="text" class="form-control" name="nama" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Tanggal Aktif</label>
            <input type="date" class="form-control" name="tanggal" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Status</label>
            <select class="form-select" name="status" required>
                <option value="Aktif">Aktif</option>
                <option value="Nonaktif">Nonaktif</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label">Gambar</label>
            <input type="file" class="form-control" name="gambar" required>
        </div>
        <div class="col-12">
            <label class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" rows="3" required></textarea>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
            <a href="daftar-diskon.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
    </form>
</div>
