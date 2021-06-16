<?php 
include "../connect.php"
?>

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="../assets/js/js-dashboard/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- font awesome js -->
    <script src="https://use.fontawesome.com/c579182323.js"></script>

  <title>Table Barang</title>
</head>
<body>

     
<!-- binarry admin -->

<div id="wrapper">
    <!-- NAV -->
        <nav class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Binary admin</a> 
            </div>
            <div style="color: white;
            padding: 15px 50px 5px 50px;
            float: right;
            font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="../login.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side shadow-sm" role="navigation">
        <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                    <img src="../assets/images/find_user.png" class="user-image img-responsive">
                    </li>
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a class="active-menu" href="product-nav.php"><i class="fa fa-table fa-3x"></i> Table Examples</a>
                    </li>				
					<li>
                        <a href="../login.php"><i class="fa fa-bolt fa-3x"></i> Logout</a>
                    </li>	
                    <li>
                        <a   href="../registeration.html"><i class="fa fa-laptop fa-3x"></i> Registeration</a>
                    </li>	
                </ul>
        </div>
        </nav>  

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
        <div id="page-inner">
        <!-- section 1 -->
        <div class="row">
            <div class="col-md-12">
            <h2>Admin Dashboard</h2>   
                <h5>Welcome brok.</h5>
            </div>
        </div>  
        <!-- End Of Section 1 -->
<!-- end of binnary admin -->

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
                        <td><img src="../assets/images/<?= $data['gambar']; ?>" alt=""></td>
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





    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/js-dashboard/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/js-dashboard/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/js-dashboard/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="../assets/js/js-dashboard/morris/raphael-2.1.0.min.js"></script>
    <script src="../assets/js/js-dashboard/morris/morris.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/js-dashboard/custom.js"></script>  

</body>
</html>