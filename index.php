<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>LittleShopping</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

</head>
<body>
    <header class="header">
        <div class="nav-left">
            <div class="logo">LITTLE<span>SHOP</span></div>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Cari produk untuk bisnis Anda...">
            <button><i class="fa fa-search"></i></button>
        </div>
        <div class="nav-right">
            <a href="admin/login.php" class="login-btn"><i class="fa fa-user-lock"></i> Login</a>
            <a href="#"><i class="fa fa-shopping-cart cart-icon"></i></a>
        </div>
    </header>

    <nav class="top-menu">
        <a href="#">Produk Terlaris</a>
        <a href="#">Penuhi Kebutuhan</a>
    </nav>

    <section class="carousel">
        <div class="slide-wrapper">
            <img src="img/slide1.png" alt="Slide 1" class="slide active">
            <img src="img/slide2.png" alt="Slide 2" class="slide">
            <img src="img/slide3.png" alt="Slide 3" class="slide">
        </div>
    </section>

    <section class="flash-sale">
    <div class="flash-sale-header">
        <h2>Semua Yang Kamu Butuhkan Ada Disini</h2>
        <button class="btn-all-products">BELANJA SEMUA PRODUK</button>
    </div>

<div class="flash-sale-products">
<?php
require_once(__DIR__ . '/model/Koneksi.php');
$db = new Koneksi();
$conn = $db->getConnection();

// Ambil data produk dan gambar
$query = "SELECT p.id_produk, p.nama_produk, p.harga, g.nama_file 
          FROM produk p 
          LEFT JOIN gambar_produk g ON p.id_produk = g.id_produk 
          ORDER BY p.id_produk DESC LIMIT 8";
$result = $conn->query($query);

while ($produk = $result->fetch_assoc()) {
    $gambar = !empty($produk['nama_file']) ? 'img/' . $produk['nama_file'] : 'img/default.jpg'; // default jika tidak ada gambar
    ?>
    <div class="product-card">
        <img src="<?= $gambar; ?>" alt="<?= htmlspecialchars($produk['nama_produk']); ?>">
        <div class="product-info">
            <p class="product-title"><?= htmlspecialchars($produk['nama_produk']); ?></p>
            <p class="product-price">Rp<?= number_format($produk['harga'], 0, ',', '.'); ?></p>
        </div>
    </div>
    <?php
}
?>
</div>
</section>

<section class="kategori">
    <h2>Kategori</h2>
    <div class="kategori-container">
        <?php
        require_once(__DIR__ . '/model/Koneksi.php');
        $db = new Koneksi();
        $conn = $db->getConnection();

        $query = "SELECT id_kategori, jenis_produk FROM kategori_produk";
        $result = $conn->query($query);

        while ($kategori_produk = $result->fetch_assoc()) {
            ?>
            <div class="kategori-item">
                <p class="kategori-nama"><?= htmlspecialchars($kategori_produk['jenis_produk']); ?></p>
            </div>
            <?php
        }
        ?>
    </div>
</section>


    <script>
        let current = 0;
        const slides = document.querySelectorAll('.slide');
        setInterval(() => {
            slides[current].classList.remove('active');
            current = (current + 1) % slides.length;
            slides[current].classList.add('active');
        }, 4000);
    </script>

    <footer>
    <div class="footer-container">
        <div class="footer-column">
            <h4>Bantuan</h4>
            <p>Telepon<br><strong>08**-1***-87*</strong></p>
            <p>Email<br><a href="mailto:customer.care@littleshopping.com">customer.care@LittleShopping.com</a></p>
            <p><a href="#">Halaman Bantuan</a></p>
            <p><a href="#">LSwithCare</a></p>
            <p>Layanan Pengaduan Konsumen<br>
                Direktorat Jenderal Perlindungan Konsumen dan Tertib Niaga<br>
                Kementerian Perdagangan RI
            </p>
            <p>WhatsApp<br><strong>08**-11**-10**</strong></p>
        </div>

        <div class="footer-column">
            <h4>Info LittleShopping</h4>
            <ul>
                <li><a href="#">Tentang Little Shopping</a></li>
                <li><a href="#">Website Little Shopping Friends</a></li>
                <li><a href="#">Siaran Pers</a></li>
                <li><a href="#">Kabar Terbaru</a></li>
                <li><a href="#">Karir</a></li>
                <li><a href="#">Kebijakan Privasi</a></li>
                <li><a href="#">Your Friends</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h4>Kerja Sama</h4>
            <ul>
                <li><a href="#">Affiliate Program</a></li>
                <li><a href="#">Jual di Little Shopping</a></li>
                <li><a href="#">LS Program</a></li>
            </ul>
            <h4>LittleShopping Family</h4>
            <p>voucher.com</p>
            <p>diskon.com</p>
        </div>

        <div class="footer-column">
            <h4>Download Aplikasi</h4>
            <img src="img/googleplay.jpg" alt="Google Play" class="store-badge">
            <img src="img/appstore.jpg" alt="App Store" class="store-badge">
            <img src="img/appgalery.png" alt="AppGallery" class="store-badge">

            <h4>Ikuti Kami</h4>
            <div class="sosmed-icons">
                <i class="fab fa-facebook-square"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-youtube"></i>
            </div>
        </div>
    </div>
    </footer>

</body>
</html>
