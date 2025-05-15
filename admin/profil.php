<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include '../koneksi.php'; // pastikan koneksi DB

$id = $_SESSION['admin']; // ambil ID admin yang login

// Ambil data admin dari database
$sql = "SELECT * FROM admin WHERE id = $id";
$result = $conn->query($sql);
$data = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profil Admin</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body class="container mt-5">
  <h2>Profil Saya</h2>
  <form method="POST" action="update-profil.php">
    <input type="hidden" name="id" value="<?= $data['id']; ?>">
    <div class="form-group">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control" value="<?= $data['nama']; ?>">
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" class="form-control" value="<?= $data['email']; ?>">
    </div>
    <div class="form-group">
      <label>Password Baru (opsional)</label>
      <input type="password" name="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
  </form>
</body>
</html>
