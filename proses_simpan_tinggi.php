<?php
include "config.php";

$data1 = $_POST["data1"];
$tanggal1 = $_POST["tanggal1"];
$data2 = $_POST["data2"];
$tanggal2 = $_POST["tanggal2"];
$data3 = $_POST["data3"];
$tanggal3 = $_POST["tanggal3"];
$data4 = $_POST["data4"];
$tanggal4 = $_POST["tanggal4"];
$sql1="REPLACE into tinggi values (1, '$data1','$tanggal1','$data2','$tanggal2','$data3','$tanggal3', '$data4', '$tanggal4')";
$sql2 ="INSERT into tinggi2 values ('$data1', '$tanggal1'),('$data2', '$tanggal2'),('$data3', '$tanggal3'),('$data4', '$tanggal4')";
mysqli_query($kon,$sql1);
mysqli_query($kon,$sql2);

// if ($hasil){
//     echo "sukses";
// } else {
//     echo "gagal";
// }
header("location:input_data.php?pesan=input");

?>