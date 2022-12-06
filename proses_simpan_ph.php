<?php
include 'config.php';

$data = $_POST['data'];
$tanggal = $_POST['tanggal'];
$query = "INSERT into ph values ('$data','$tanggal')";
$hasil = mysqli_query($kon, $query);

// if($hasil){
//     echo "berhasil";
// }else{
//     echo "gagal";
// }
header("location:input_data.php?pesan=input");

?>