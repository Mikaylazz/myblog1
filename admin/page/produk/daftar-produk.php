 <h2 class="mt-4 mb-4"><i class="fas fa-layer-group"></i> Produk</h2>

 <?php
require_once(__DIR__ . '/../../../model/Koneksi.php');


$db = new Koneksi();
$conn = $db->getConnection();

$query = "SELECT * FROM produk";
$result = $conn->query($query);
?>

<div class="mb-2">
    <a href="#" class="btn btn-sm btn-info"><i class = "fa fa-plus"></i>Tambah Produk</a>
</div>

<div class="row">
  <?php while($row = $result->fetch_assoc()) { ?>
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img src="/MYBLOG.COM/img/download.jpeg" class="card-img-top" alt="<?= $row['nama_produk']; ?>">
        <div class="card-body">
          <h5 class="card-title"><?= $row['nama_produk']; ?></h5>
          <p class="card-text"><strong>Merk:</strong> <?= $row['merk_produk']; ?></p>
          <p class="card-text text-danger"><strong>Rp<?= number_format($row['harga'], 0, ',', '.'); ?></strong></p>
        </div>
        <div class="card-footer text-center bg-white">
          <a href="dashboard.php?module=produk&page=detail-produk&id=<?= $row['id_produk']; ?>" class="btn btn-primary btn-sm">
            Lihat Detail
          </a>
        </div>
      </div>
    </div>
  <?php } ?>
</div>

