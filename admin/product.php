<?php 
include "../connect.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-default">
        <div class="panel-heading">
        Table barang
        </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Foto</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Stok</th>
                        <th>Jenis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <!-- query data -->
                <?php $result = mysqli_query($conn,"SELECT * FROM barang ORDER BY id ASC"); ?>
                <!-- End Of Query Data -->

                <!-- fetch -->
                <?php 
                $i = 1;
                while ($data = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><img src="../assets/images/<?= $data['Gambar'];?>"  width="90" alt=""></td>
                        <td><?= $data['harga']; ?></td>
                        <td><?= $data['deskripsi']; ?></td>
                        <td><?= $data['stok']; ?></td>
                        <td><?= $data['jenis']; ?></td>
                        <td>
                            <a href="index.php?halaman=ubahproduk&id=<?= $data['id']?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="index.php?halaman=hapusproduk&id=<?= $data['id']?>" class="btn btn-warning btn-sm" onclick="return confirm('yakin dihapus')">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++; } ?>
                <!-- End of fetch -->
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>