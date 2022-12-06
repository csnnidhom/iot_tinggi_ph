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

$query="SELECT * FROM tinggi2 inner join sensor_tinggi on tinggi2.tanggal_history=sensor_tinggi.tanggal";
$tinggi_real = mysqli_query($kon,$query);
while($row = mysqli_fetch_array($tinggi_real)){
    $data_history_tinggi[] = $row['data_history'];
    $tanggal_history_tinggi[] = $row['tanggal_history'];
    $data_sensor_tinggi[] = $row['data'];

}

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
                                    </div>
                                    <canvas id="grafik_history"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-light text-center rounded p-4 pt-4">
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
                                        $tabel_ph = mysqli_query($kon,"select * from ph inner join sensor_ph on ph.tanggal=sensor_ph.tanggal_sensor");
                                        while($row = mysqli_fetch_array($tabel_ph))
                                        {
                                            $data_input = $row['data'];
                                            $data_sensor = $row['data_sensor'];
                                            $tanggal = $row['tanggal_sensor'];

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
                            data: <?php echo json_encode($data_history_tinggi); ?>,
                            backgroundColor: "rgba(0, 156, 255, .5)"
                        },
                        {
                            label: "Data Tinggi Sensor",
                            data: <?php echo json_encode($data_sensor_tinggi); ?>,
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