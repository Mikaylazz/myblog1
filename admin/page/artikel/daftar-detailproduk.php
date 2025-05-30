    <h2 class="mt-4 mb-4"><i class="fas fa-info-circle"></i> Kategori Produk</h2>

  <div class="row">
    <div class="col">
        <div class="mb-2">
            <a href="#" class="btn btn-sm btn-info"><i class = "fa fa-plus"></i>Tambah Detail Produk</a>
        </div>
        <table class="table  table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Produksi</th>
                    <th>Perusahaan</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Diposting</th>
                    <th width="5%">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once('../model/Artikel.php');
                    $artikel = new Artikel();
                    $artikels = $artikel->getAll();
                    

                    $nomor = 1;
                    foreach($artikels as $row){
                    ?>
                        <tr>
                            <td><?=$nomor++;?></td>
                             <td><?=$row['tanggal'];?></td>
                              <td><?=$row['penulis'];?></td>
                               <td><?=$row['judul'];?></td>
                                <td><?=$row['deskripsi'];?></td>
                                 <td><?=$row['posting'];?></td>
                                 <td class = "text-center">
                                    <a href="#"><i class="fa fa-edit text-warning"></i></a>
                                    <a href="#"><i class="fa fa-trash text-danger"></i></a>
                                 </td>
                       </tr>
                    <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
  </div>