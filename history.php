<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}
$page="history";
?>

<!DOCTYPE html>
<html lang="en">

<?php
include 'header.php';
include "config.php";
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
                <div class="row g-4">
                    <div class="row justify-content-center">
                        <div class="pt-4 mb-4">
                            <div class="bg-light rounded h-100 p-4 ">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h6 class="mb-0">Sensor Tinggi</h6>
                                        <div>
                                            <form action="" method="get">
                                                <div class="form-group">
                                                    <h6 class="mb-0">Pilih Bulan :</h6>
                                                        <div class="input-group mb-3">
                                                            <select name="bulan" class="form-control">
                                                            <option value="">Pilih</option>
                                                            <option value="01">Januari</option>
                                                            <option value="02">Februari</option>
                                                            <option value="03">Maret</option>
                                                            <option value="04">April</option>
                                                            <option value="05">Mei</option>
                                                            <option value="06">Juni</option>
                                                            <option value="07">Juli</option>
                                                            <option value="08">Agustus</option>
                                                            <option value="09">September</option>
                                                            <option value="10">Oktober</option>
                                                            <option value="11">November</option>
                                                            <option value="12">Desember</option>
                                                            </select>
                                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button> 
                                                        </div>
                                                    
                                                </div>
                                            </form>
                                            <?php
                                                if(isset($_GET['submit'])){
                                                    $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                                                    $bulan = $_GET['bulan'];
                                                    $query="SELECT * FROM tinggi2 left join sensor_tinggi on tinggi2.tanggal_history=DATE(sensor_tinggi.waktu) WHERE MONTH(tinggi2.tanggal_history)='$bulan' ";
                                                    $tinggi_real = mysqli_query($kon,$query);
                                                    while($row = mysqli_fetch_array($tinggi_real)){
                                                        $data_history_tinggi[] = $row['data_history'];
                                                        $tanggal_history_tinggi[] = $row['tanggal_history'];
                                                        $data_sensor_tinggi[] = $row['data'];
                                                    }
                                                    echo '<b>'.$nama_bulan[$_GET['bulan']].'</b>';
                                                }
                                                ?>
                                        </div>
                                </div>
                                    <canvas id="grafik_history"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-light text-center rounded p-4 pt-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <h6 class="mb-0">Tabel Sensor PH</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table text-start align-middle table-bordered table-hover mb-0 text-center">
                                <thead>
                                    <tr class="text-dark">
                                        <th scope="col">No</th>
                                        <th scope="col">Data Inputan</th>
                                        <th scope="col">Data Sensor PH</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Hasil Perbandingan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include 'config.php';
                                        $no=1;
                                        $tabel_ph = mysqli_query($kon,"select * from ph inner join sensor_ph on ph.tanggal=DATE(sensor_ph.waktu)");
                                        while($row = mysqli_fetch_array($tabel_ph))
                                        {
                                            $data_input = $row['data_input'];
                                            $data_sensor = $row['data'];
                                            $tanggal = $row['waktu'];

                                            if($data_input == $data_sensor){
                                                $perbandingan = 'Data Sesuai';
                                            } else {
                                                $perbandingan = 'Data Tidak Sesuai';
                                            }

                                            echo "<tr>
                                            <td>".$no++."</td>
                                            <td>".$data_input."</td>
                                            <td>".$data_sensor."</td>
                                            <td>".date("d F Y",strtotime($tanggal))."</td>
                                            <td>".$perbandingan."</td>
                                            </tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>`
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

    <script>
        var ctx1 = $("#grafik_history").get(0).getContext("2d");
            var myChart1 = new Chart(ctx1, {
                type: "bar",
                data: {
                    labels:<?php echo json_encode($tanggal_history_tinggi); ?>,
                    datasets: [{
                            label: "Data Tinggi Real",
                            data: 
                            <?php 
                            // $query="SELECT * FROM tinggi2 right join sensor_tinggi on tinggi2.tanggal_history=sensor_tinggi.tanggal ";
                            // $tinggi_real = mysqli_query($kon,$query);
                            //     while($row = mysqli_fetch_array($tinggi_real)){
                            //         $data_history_tinggi[] = $row['data_history'];
                            //     }
                            
                                echo json_encode($data_history_tinggi); 
                            ?>,
                            backgroundColor: "rgba(0, 156, 255, .5)"
                        },
                        {
                            label: "Data Tinggi Sensor",
                            data: 
                            <?php 
                            // $query="SELECT * FROM sensor_tinggi right join tinggi2 on sensor_tinggi.tanggal=tinggi2.tanggal_history";
                            // $tinggi_real = mysqli_query($kon,$query);
                            // while($row = mysqli_fetch_array($tinggi_real)){
                            //     $data_sensor_tinggi[] = $row['data'];
                            // }
                            echo json_encode($data_sensor_tinggi); 
                            ?>,
                            backgroundColor: "rgba(0, 156, 255, .3)"
                        },
                    ]
                    },
                    
                options: {
                    responsive: true
                }
            });
    </script>

    </body>

</html>