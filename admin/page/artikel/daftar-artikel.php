<h2 class="mt-4 mb-4"><i class="fas fa-tachometer-alt"></i> Artikel</h2>


<div class="row">
  <div class="col">
    <table class="Table table-hover">
        <thead>
            <tr>
                <th>NO</th>
                <th>TANGGAL</th>
                <th>PENULIS</th>
                <th>JUDUL</th>
                <th>DESKRIPSI</th>
                <th>POSTING</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <body>
            <?php
                require_once('../model/Artikel.php');
                $artikel = new Artikel();
                $artikel = $artikel->getAll();

                foreach($artikel as $row){
                    ?>

                    <tr>
                        <td><?=$nomor++;?></td>
                        <td><?=$row['tanggal']?></td>
                        <td><?=$row['penulis']?></td>
                        <td><?=$row['judul']?></td>
                        <td><?=$row['deskripsi']?></td>
                        <td><?=$row['posting']?></td>
                        <td></td>
                    </tr>
                <?php
                }
            ?>
        </body>
    </table>
  </div>
</div>
