<?php 
require 'connect.php';
if (isset($_POST['register'])) {
    
    if (registerasi($_POST) > 0) {
        echo "<script>
                alert('Kamu telah terdaftar!');
            </script>";
    } else {
        echo mysqli_error($conn);
        exit;
    }

    

}
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
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <!-- Style.css -->
    <link rel="stylesheet" href="style.css">
    <title>Registerasi</title>
</head>
<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

        <!-- Header -->
    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
            <a class="navbar-brand" href="index.html"><h2>Sixteen <em>Clothing</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div>
                <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="registeration.php">Registrasi
                    <span class="sr-only">(current)</span>
                    </a>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login
                    </a>
                </ul>
            </div>
            </div>
        </nav>
    </header>
<br>
    <!-- Jumbotron -->
<div class="container mt-3" id="login">
    <div class="jumbotron">    
        <div class="row justify-content-md-center">
            <div class="col-sm-4 p-4 bg-light">
                <h1 class="mb-4">Registerasi</h1>
            <!-- Form -->
            <form action="" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Buat Username!" />
                </div>
                <div class="form-group">
                    <label for="password">Password</label> 
                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password!" />
                </div>
                <div class="form-group">
                    <label for="password2">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="password2" id="password2" placeholder="Masukkan ulang Password!" />
                </div>
                <button type="submit" class="btn btn-primary" name="register" >Register!</button>
                <hr />
                Sudah punya akun? <a href="login.php">Login di sini!</a>
            </form>
            <!-- Form End -->
            </div>
        </div>
    </div>    
</div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t)  //declaring the array outside of the
      if(! cleared[t.id]){    // function makes it static and global
        cleared[t.id] = 1;  // you could use true and false, but that's more typing
        t.value='';         // with more chance of typos
        t.style.color='#fff';
        }
    }
    </script>

<?php 
function registerasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    // Mengecek apakah ada username yg sudah tersedia di database
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username sudah tersedia, buat username lain!');
            </script>";
        return false;
    } 

    // Memastikan user tidak typo dalam membuat password
    if ($password !== $password2) {
        echo "<script>
                alert('pasword tidak sesuai');
            </script>";
        return false;
    }

    // Enkripsi Password
    $password = password_hash($password, PASSWORD_DEFAULT); 
    // End of Enkripsi Password

    //  Memasukkan user ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
?>
</body>
</html>