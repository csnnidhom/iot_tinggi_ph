<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}
$page="input";

if(isset($_GET['pesan'])){
    $pesan = $_GET['pesan'];
    if($pesan == "input"){
        echo "<script>alert('Berhasil Input')</script>";
    }else{
        echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
    }
}

include "config.php";
$tinggi_real = mysqli_query($kon,"SELECT * FROM tinggi");
while($row = mysqli_fetch_array($tinggi_real)){
    $tanggal1[] = $row['tanggal1'];
    $tanggal2[] = $row['tanggal2'];
    $tanggal3[] = $row['tanggal3'];
    $tanggal4[] = $row['tanggal4'];
    $tanggal5[] = $row['tanggal5'];
    $tanggal6[] = $row['tanggal6'];
    $tanggal7[] = $row['tanggal7'];
}
 

?>

<!DOCTYPE html>
<html lang="en">

<?php
include 'header.php'
?>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <?php
        include 'sidebar.php';
        ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php
            include 'navbar.php';
            ?>
            <!-- Navbar End -->

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4 justify-content-around">
                        <div class="col-sm-5 col-xl-5">
                            <div class="bg-light rounded h-100 p-4 ">
                                <label class="form-label">Input Tinggi</label>
                                <form method="POST" action="proses_simpan_tinggi.php">
                                    <div class="input-group ">
                                        <span class="input-group-text">Hari-1</span>
                                        <input type="text" name="data1" class="form-control">
                                        <input type="date" name="tanggal1" style="width:100px;" class="form-control">
                                    </div>
                                    <div class="input-group pt-2">
                                        <span class="input-group-text">Hari-2</span>
                                        <input type="text" name="data2" class="form-control">
                                        <input type="date" name="tanggal2" style="width:100px;" class="form-control">
                                    </div>
                                    <div class="input-group pt-2">
                                        <span class="input-group-text">Hari-3</span>
                                        <input type="text" name="data3" class="form-control">
                                        <input type="date" name="tanggal3" style="width:100px;" class="form-control">
                                    </div>
                                    <div class="input-group pt-2">
                                        <span class="input-group-text">Hari-4</span>
                                        <input type="text" name="data4" class="form-control">
                                        <input type="date" name="tanggal4" style="width:100px;" class="form-control">
                                    </div>
                                    <div class="input-group pt-2">
                                        <span class="input-group-text">Hari-5</span>
                                        <input type="text" name="data5" class="form-control">
                                        <input type="date" name="tanggal5" style="width:100px;" class="form-control">
                                    </div>
                                    <div class="input-group pt-2">
                                        <span class="input-group-text">Hari-6</span>
                                        <input type="text" name="data6" class="form-control">
                                        <input type="date" name="tanggal6" style="width:100px;" class="form-control">
                                    </div>
                                    <div class="input-group pt-2">
                                        <span class="input-group-text">Hari-7</span>
                                        <input type="text" name="data7" class="form-control">
                                        <input type="date" name="tanggal7" style="width:100px;" class="form-control">
                                    </div>
                                    <div class="input-group mb-3">
                                        <button class="btn btn-primary w-100 m-2" type="submit" name="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-5 col-xl-5">
                            <div class="bg-light rounded p-4 ">
                                <label class="form-label">Input PH</label>
                                <form method="POST" action="proses_simpan_ph.php">
                                    <div class="input-group ">
                                        <span class="input-group-text">Data &nbsp; &nbsp; &nbsp; </span>
                                        <input type="text" name="data" class="form-control">
                                    </div>
                                    <div class="input-group pt-4">
                                        <span class="input-group-text">Tanggal</span>
                                        <input type="date" name="tanggal" class="form-control">
                                    </div>
                                    <div class="input-group pt-4">
                                        <button class="btn btn-primary w-100 m-2" type="submit" name="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?php
    include 'script.php';
    ?>

</body>

</html>