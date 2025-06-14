<?php
require_once(__DIR__ . '/../../../model/Koneksi.php');

$db = new Koneksi();
$conn = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];
    $id_sub_kategori = $_POST['id_sub_kategori'];

    $query = "INSERT INTO produk (nama_produk, harga, stok, deskripsi, id_sub_kategori) 
              VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("siisi", $nama, $harga, $stok, $deskripsi, $id_sub_kategori);

    if ($stmt->execute()) {
        header("Location: dashboard.php?module=produk&page=daftar-produk");
        exit;
    } else {
        echo "Gagal menambahkan produk.";
    }
}

// Ambil data sub kategori untuk dropdown
$subkategori = $conn->query("SELECT * FROM sub_kategori");
?>

<h2><i class="fa fa-plus"></i> Tambah Produk</h2>
<form method="POST">
  <div class="mb-3">
    <label>Nama Produk</label>
    <input type="text" name="nama_produk" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Harga</label>
    <input type="number" name="harga" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Stok</label>
    <input type="number" name="stok" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control" required></textarea>
  </div>
  <div class="mb-3">
    <label>Sub Kategori</label>
    <select name="id_sub_kategori" class="form-control" required>
      <?php while($s = $subkategori->fetch_assoc()) { ?>
        <option value="<?= $s['id_sub_kategori']; ?>"><?= $s['merk_subkategori']; ?></option>
      <?php } ?>
    </select>
  </div>
  <button type="submit" class="btn btn-success">Simpan</button>
  <a href="dashboard.php?module=produk&page=daftar-produk" class="btn btn-secondary">Batal</a>
</form>
