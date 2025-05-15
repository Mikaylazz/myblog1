<?php
session_start();
include '../koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];

if (!empty($password)) {
    // Hash password jika diisi
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE admin SET nama='$nama', email='$email', password='$password' WHERE id=$id";
} else {
    $sql = "UPDATE admin SET nama='$nama', email='$email' WHERE id=$id";
}

if ($conn->query($sql) === TRUE) {
    $_SESSION['pesan'] = "Profil berhasil diperbarui.";
} else {
    $_SESSION['pesan'] = "Gagal memperbarui profil.";
}

header("Location: profil.php");
