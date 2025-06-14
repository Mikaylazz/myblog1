<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/myblog.com/model/Kategori.php');
$kategori = new Kategori();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = $_POST['tanggal'];
    $perusahaan = $_POST['perusahaan'];
    $jenis = $_POST['jenis'];
    $status = $_POST['status'];

    $kategori->tambah($tanggal, $perusahaan, $jenis, $status);

    
    header("Location: daftar-detailproduk.php");
    exit;
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<div class="container my-4">
    <h4 class="mb-4"><i class="fa fa-plus-circle"></i> Tambah Kategori Produk</h4>
    <form method="POST" class="row g-3 align-items-center">
        <div class="col-md-3">
            <label for="tanggal" class="form-label">Tanggal Pengiriman</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <div class="col-md-3">
            <label for="perusahaan" class="form-label">Perusahaan</label>
            <input type="text" class="form-control" id="perusahaan" name="perusahaan" placeholder="Nama Perusahaan" required>
        </div>
        <div class="col-md-3">
            <label for="jenis" class="form-label">Jenis Produk</label>
            <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Contoh: Skincare" required>
        </div>
        <div class="col-md-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="aktif">Aktif</option>
                <option value="non-aktif">Non-Aktif</option>
            </select>
        </div>

        <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
            <a href="daftar-detailproduk.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
    </form>
</div>

