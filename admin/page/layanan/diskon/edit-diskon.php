<?php
require_once(__DIR__ . '/../../../../model/Koneksi.php');
$db = new Koneksi();
$conn = $db->getConnection();

$id = $_GET['id'];
$data = $conn->query("SELECT * FROM diskon WHERE id_diskon = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    if (!empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($tmp, __DIR__ . '/../../../../assets/img/' . $gambar);
        $conn->query("UPDATE diskon SET nama_diskon='$nama', deskripsi='$deskripsi', tanggal_aktif='$tanggal', status='$status', gambar='$gambar' WHERE id_diskon=$id");
    } else {
        $conn->query("UPDATE diskon SET nama_diskon='$nama', deskripsi='$deskripsi', tanggal_aktif='$tanggal', status='$status' WHERE id_diskon=$id");
    }

    header("Location: daftar-diskon.php");
    exit;
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container my-4">
    <h4 class="mb-4"><i class="fa fa-edit"></i> Edit Diskon</h4>
    <form method="POST" enctype="multipart/form-data" class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Nama Diskon</label>
            <input type="text" class="form-control" name="nama" value="<?= $data['nama_diskon'] ?>" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Tanggal Aktif</label>
            <input type="date" class="form-control" name="tanggal" value="<?= $data['tanggal_aktif'] ?>" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Status</label>
            <select class="form-select" name="status" required>
                <option value="Aktif" <?= $data['status'] == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                <option value="Nonaktif" <?= $data['status'] == 'Nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label">Gambar (kosongkan jika tidak ingin mengubah)</label>
            <input type="file" class="form-control" name="gambar">
            <small class="text-muted">Gambar saat ini: <?= $data['gambar'] ?></small>
        </div>
        <div class="col-12">
            <label class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" rows="3"><?= $data['deskripsi'] ?></textarea>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Update</button>
            <a href="daftar-diskon.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
    </form>
</div>