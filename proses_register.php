<?php
session_start();
include 'config.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$cpassword = md5($_POST['cpassword']);

if ($password == $cpassword) {
    $sql = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($kon, $sql);
    if (!$result->num_rows > 0) {
        $sql = "INSERT INTO user (username,  password)
                VALUES ('$username', '$password')";
        $result = mysqli_query($kon, $sql);
        if ($result) {
            echo "<script>
            alert('Selamat, registrasi berhasil!');
            window.location.href='login.php';
            </script>";
            $username = "";
            $password = "";
            $_POST['password'] = "";
            $_POST['cpassword'] = "";
        } else {
            echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
        }
    } else {
        echo "<script>alert('Woops! Username Sudah Terdaftar.')</script>";
    }
     
} else {
    echo "<script>
    alert('Password Tidak Sesuai');
    window.location.href='register.php';
    </script>";
}
?>