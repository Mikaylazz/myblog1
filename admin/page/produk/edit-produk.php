<?php
require_once(__DIR__ . '/../../../model/Koneksi.php');

$db = new Koneksi();
$conn = $db->getConnection();
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $deskripsi = $_POST['deskripsi'];
    $id_sub_kategori = $_POST['id_sub_kategori'];

    // Update produk
    $query = "UPDATE produk SET nama_produk=?, harga=?, stok=?, deskripsi=?, id_sub_kategori=? WHERE id_produk=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("siisii", $nama, $harga, $stok, $deskripsi, $id_sub_kategori, $id);
    $stmt->execute();

    // Cek jika gambar baru diupload
if (!empty($_FILES['gambar_baru']['name'])) {
    $nama_file = $_FILES['gambar_baru']['name'];
    $tmp = $_FILES['gambar_baru']['tmp_name'];
    $lokasi = __DIR__ . '/../../../img/' . $nama_file;

    move_uploaded_file($tmp, $lokasi);

    // Cek apakah gambar sudah ada
    $cek = $conn->query("SELECT * FROM gambar_produk WHERE id_produk=$id");
    if ($cek->num_rows > 0) {
        $conn->query("UPDATE gambar_produk SET nama_file='$nama_file' WHERE id_produk=$id");
    } else {
        // Tanpa id_gambar agar auto_increment berjalan
        $conn->query("INSERT INTO gambar_produk (id_produk, nama_file) VALUES ($id, '$nama_file')");
    }
}


    header("Location: dashboard.php?module=produk&page=daftar-produk");
    exit;
}

// Ambil data produk
$result = $conn->query("SELECT produk.*, gambar_produk.nama_file 
                        FROM produk 
                        LEFT JOIN gambar_produk ON produk.id_produk = gambar_produk.id_produk AND gambar_produk.id_gambar = 1 
                        WHERE produk.id_produk = $id");
$row = $result->fetch_assoc();

// Ambil sub kategori
$subkategori = $conn->query("SELECT * FROM sub_kategori");
?>

<h2><i class="fa fa-edit"></i> Edit Produk</h2>
<form method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label>Nama Produk</label>
    <input type="text" name="nama_produk" class="form-control" value="<?= $row['nama_produk']; ?>" required>
  </div>
  <div class="mb-3">
    <label>Harga</label>
    <input type="number" name="harga" class="form-control" value="<?= $row['harga']; ?>" required>
  </div>
  <div class="mb-3">
    <label>Stok</label>
    <input type="number" name="stok" class="form-control" value="<?= $row['stok']; ?>" required>
  </div>
  <div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control" required><?= $row['deskripsi']; ?></textarea>
  </div>
  <div class="mb-3">
    <label>Sub Kategori</label>
    <select name="id_sub_kategori" class="form-control" required>
      <?php while($s = $subkategori->fetch_assoc()) { ?>
        <option value="<?= $s['id_sub_kategori']; ?>" <?= $s['id_sub_kategori'] == $row['id_sub_kategori'] ? 'selected' : ''; ?>>
          <?= $s['merk_subkategori']; ?>
        </option>
      <?php } ?>
    </select>
  </div>

  <div class="mb-3">
    <label>Gambar Saat Ini</label><br>
    <img src="/MYBLOG.COM/img/<?= $row['nama_file'] ?: 'default.jpg'; ?>" width="150" alt="Gambar Produk">
  </div>
  <div class="mb-3">
    <label>Ganti Gambar Produk (optional)</label>
    <input type="file" name="gambar_baru" class="form-control">
  </div>

  <button type="submit" class="btn btn-primary">Update</button>
  <a href="dashboard.php?module=produk&page=daftar-produk" class="btn btn-secondary">Batal</a>
</form>
