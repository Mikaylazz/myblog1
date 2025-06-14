<?php include_once(__DIR__ . '/../../template/header.php'); ?>

<h2 class="mt-4 mb-4"><i class="fas fa-info-circle"></i> Kategori Produk</h2>

  <div class="row">
    <div class="col">
        <div class="mb-2">
            <a href="page/kategori-produk/tambah-kategori.php" class="btn btn-sm btn-info">
                <i class="fa fa-plus"></i> Tambah Kategori Produk
            </a>
        </div>
        <table class="table  table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Pengiriman</th>
                    <th>Perusahaan</th>
                    <th>Jenis Kategori</th>
                    <th>Status</th>
                    <th width="5%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once($_SERVER['DOCUMENT_ROOT'] . '/myblog.com/model/Kategori.php');
                    $kategori = new Kategori();
                    $kategoris = $kategori->getAll();
                    

                    $nomor = 1;
                    foreach($kategoris as $row){
                    ?>
                        <tr>
                            <td><?=$nomor++;?></td>
                             <td><?=$row['tanggal'];?></td>
                              <td><?=$row['perusahaan_produksi'];?></td>
                               <td><?=$row['jenis_produk'];?></td>
                                 <td><?=$row['status'];?></td>
                                    <td class="text-center">
                                        <a href="page/kategori-produk/detail-kategori.php?id=<?=$row['id_kategori'];?>">
                                        <a href="page/kategori-produk/edit-kategori.php?id=<?=$row['id_kategori'];?>"><i class="fa fa-edit text-warning"></i></a>
                                        <a href="page/kategori-produk/hapus-kategori.php?id=<?=$row['id_kategori'];?>" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa fa-trash text-danger"></i></a>
                                    </td>
                       </tr>
                    <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
  </div>
  <?php include_once(__DIR__ . '/../../template/footer.php'); ?>
