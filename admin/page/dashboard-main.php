<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="container mt-4">
  <h2 class="mb-4"><i class="fas fa-tachometer-alt"></i> Dashboard</h2>

  <div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>Hi,</strong> Selamat Datang Mikayla
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

  <div class="row g-4">

    <!-- Kategori Produk -->
    <div class="col-12 col-md-6 col-xl-4">
      <a href="dashboard.php?module=kategori-produk&page=daftar-detailproduk" class="text-decoration-none">
        <div class="card bg-primary text-white shadow h-100 p-4" style="min-height: 160px;">
          <div class="d-flex justify-content-between align-items-center h-100">
            <div>
              <div class="h5 fw-bold mb-0">Kategori Produk</div>
            </div>
            <i class="fas fa-info-circle fa-3x"></i>
          </div>
        </div>
      </a>
    </div>

    <!-- Produk -->
    <div class="col-12 col-md-6 col-xl-4">
      <a href="dashboard.php?module=produk&page=daftar-produk" class="text-decoration-none">
        <div class="card bg-warning text-white shadow h-100 p-4" style="min-height: 160px;">
          <div class="d-flex justify-content-between align-items-center h-100">
            <div>
              <div class="h5 fw-bold mb-0">Produk</div>
            </div>
            <i class="fas fa-layer-group fa-3x"></i>
          </div>
        </div>
      </a>
    </div>

    <!-- Layanan -->
    <div class="col-12 col-md-6 col-xl-4">
      <a href="dashboard.php?module=layanan&page=layanan-customer" class="text-decoration-none">
        <div class="card bg-success text-white shadow h-100 p-4" style="min-height: 160px;">
          <div class="d-flex justify-content-between align-items-center h-100">
            <div>
              <div class="h5 fw-bold mb-0">Layanan</div>
            </div>
            <i class="fas fa-wrench fa-3x"></i>
          </div>
        </div>
      </a>
    </div>

    <!-- Kontak -->
    <div class="col-12 col-md-6 col-xl-4">
      <a href="dashboard.php?module=kontak&page=kontak-detail" class="text-decoration-none">
        <div class="card bg-danger text-white shadow h-100 p-4" style="min-height: 160px;">
          <div class="d-flex justify-content-between align-items-center h-100">
            <div>
              <div class="h5 fw-bold mb-0">Kontak</div>
            </div>
            <i class="fas fa-id-card-alt fa-3x"></i>
          </div>
        </div>
      </a>
    </div>

  </div>
</div>
