<?php
session_start();
require_once('auth.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['u'] ?? '';
    $password = $_POST['p'] ?? '';

    $auth = new Auth();
    $id_admin = $auth->login($email, $password);

    if ($id_admin) {
        $_SESSION['admin_id'] = $id_admin;
        header('Location: dashboard.php'); // ganti jika dashboard pakai nama lain
        exit;
    } else {
        header('Location: login.php?error=1');
        exit;
    }
}
?>
