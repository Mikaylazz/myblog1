<?php
session_start();
session_destroy(); // Hapus session
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/all.min.css">
    <title>::. Login Administrator .::</title>
  </head>
  <body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="col-md-4">
                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger">Email atau password salah!</div>
                <?php endif; ?>
                <form action="proses-login.php" method="post" autocomplete="off">
                    <!-- Hidden trap field -->
                    <input type="text" name="fakeuser" style="display:none">
                    <input type="password" name="fakepass" style="display:none">

                    <div class="form-group">
                        <label for="user_login">Email</label>
                        <input type="email" name="u" id="user_login" class="form-control" placeholder="Masukan Email"
                               autocomplete="new-email" required>
                    </div>

                    <div class="form-group">
                        <label for="pass_login">Password</label>
                        <input type="password" name="p" id="pass_login" class="form-control" placeholder="Masukan Password"
                               autocomplete="new-password" required>
                    </div>

                    <button type="submit" name="login" class="btn btn-primary">
                        <i class="fa fa-user-lock"></i> Login</button>
                    <button type="reset" name="batal" class="btn btn-warning">
                        <i class="fa fa-rotate-left"></i> Batal</button>
                </form>
            </div>
        </div>
    </div>

    <script src="../assets/js/jquery-3.4.1.slim.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script>
        const params = new URLSearchParams(window.location.search);
        if (params.has('logout')) {
            document.getElementById('user_login').value = '';
            document.getElementById('pass_login').value = '';
        }
    </script>
  </body>
</html>
