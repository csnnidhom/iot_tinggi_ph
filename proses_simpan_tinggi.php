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
$data5 = $_POST["data5"];
$tanggal5 = $_POST["tanggal5"];
$data6 = $_POST["data6"];
$tanggal6 = $_POST["tanggal6"];
$data7 = $_POST["data7"];
$tanggal7 = $_POST["tanggal7"];
$sql1="REPLACE into tinggi values (1, '$data1','$tanggal1','$data2','$tanggal2','$data3','$tanggal3', '$data4', '$tanggal4','$data5','$tanggal5','$data6','$tanggal6','$data7', '$tanggal7')";
$sql2 ="INSERT into tinggi2 values ('$data1', '$tanggal1'),('$data2', '$tanggal2'),('$data3', '$tanggal3'),('$data4', '$tanggal4'),('$data5', '$tanggal5'),('$data6', '$tanggal6'),('$data7', '$tanggal7')";
mysqli_query($kon,$sql1);
mysqli_query($kon,$sql2);

// if ($hasil){
//     echo "sukses";
// } else {
//     echo "gagal";
// }
header("location:input_data.php?pesan=input");

?>