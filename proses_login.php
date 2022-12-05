<?php 
session_start();
include 'config.php';
$username = $_POST['username'];
$password = $_POST['password'];
echo $username;
$query = mysqli_query($kon, "SELECT * FROM user WHERE username='$username' AND password=md5('$password')");
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);
            $_SESSION['username'] = $data['username'];
            header("Location: input_data.php");
    }    else {
    $_SESSION['login_gagal'] = "Username dan password salah" ;
    header("Location: login.php");
    }
 
?>