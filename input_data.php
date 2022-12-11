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
                                        <span class="input-group-text">Minggu-1</span>
                                        <input type="text" name="data1" class="form-control">
                                        <input type="date" name="tanggal1" style="width:100px;" class="form-control">
                                    </div>
                                    <div class="input-group pt-2">
                                        <span class="input-group-text">Minggu-2</span>
                                        <input type="text" name="data2" class="form-control">
                                        <input type="date" name="tanggal2" style="width:100px;" class="form-control">
                                    </div>
                                    <div class="input-group pt-2">
                                        <span class="input-group-text">Minggu-3</span>
                                        <input type="text" name="data3" class="form-control">
                                        <input type="date" name="tanggal3" style="width:100px;" class="form-control">
                                    </div>
                                    <div class="input-group pt-2">
                                        <span class="input-group-text">Minggu-4</span>
                                        <input type="text" name="data4" class="form-control">
                                        <input type="date" name="tanggal4" style="width:100px;" class="form-control">
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