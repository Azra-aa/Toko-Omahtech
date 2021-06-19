<?php 
include "connect.php";
function registerasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    // Mengecek apakah ada username yg sudah tersedia di database
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username='$username'")
    
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username sudah tersedia, buat username lain!')
            </script>";
    } 

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
    mysqli_querry($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
?>