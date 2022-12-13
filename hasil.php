<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}
$page="hasil";
?>

<!DOCTYPE html>
<html lang="en">

<?php
include 'header.php';
include "config.php";

$tinggi_real = mysqli_query($kon, "SELECT * FROM tinggi");
while($row = mysqli_fetch_array($tinggi_real)){
    $tanggal1 = $row['tanggal1'];
    $tanggal2 = $row['tanggal2'];
    $tanggal3 = $row['tanggal3'];
    $tanggal4 = $row['tanggal4'];
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
                        <div class="col-9 pt-4 mb-4">
                            <div class="bg-light rounded h-100 p-4 ">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h6 class="mb-0">Sensor Tinggi</h6>
                                    </div>
                                    <canvas id="grafik_hasil"></canvas>
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
        var ctx1 = $("#grafik_hasil").get(0).getContext("2d");
            var myChart1 = new Chart(ctx1, {
                type: "bar",
                data: {
                    labels:[
                            <?php echo json_encode(date("d-m-Y",strtotime($tanggal1))); ?>, 
                            <?php echo json_encode(date("d-m-Y",strtotime($tanggal2))); ?>,
                            <?php echo json_encode(date("d-m-Y",strtotime($tanggal3))); ?>,
                            <?php echo json_encode(date("d-m-Y",strtotime($tanggal4))); ?>,
                        ],
                    datasets: [{
                            label: "Data Tinggi Real",
                            data: [
                                    <?php
                                        $query = mysqli_query($kon,"SELECT * FROM tinggi");
                                        while($row = mysqli_fetch_array($query)){
                                            $data_real = $row['data1'];
                                        }
                                        echo json_encode($data_real); 
                                    ?>,
                                    <?php
                                        $query = mysqli_query($kon,"SELECT * FROM tinggi");
                                        while($row = mysqli_fetch_array($query)){
                                            $data_real = $row['data2'];
                                        }
                                        echo json_encode($data_real); 
                                    ?>,
                                    <?php
                                        $query = mysqli_query($kon,"SELECT * FROM tinggi");
                                        while($row = mysqli_fetch_array($query)){
                                            $data_real = $row['data3'];
                                        }
                                        echo json_encode($data_real); 
                                    ?>,
                                    <?php
                                        $query = mysqli_query($kon,"SELECT * FROM tinggi");
                                        while($row = mysqli_fetch_array($query)){
                                            $data_real = $row['data4'];
                                        }
                                        echo json_encode($data_real); 
                                    ?>,
                                ],
                            backgroundColor: "rgba(0, 156, 255, .5)"
                        },
                        {
                            label: "Data Tinggi Sensor",
                            data: [
                                    <?php
                                        $query = mysqli_query($kon,"SELECT data from sensor_tinggi
                                        RIGHT JOIN tinggi ON tinggi.tanggal1=DATE(sensor_tinggi.waktu)");
                                        while($row = mysqli_fetch_array($query)){
                                            $data_sensor = $row['data'];
                                        }
                                        echo json_encode($data_sensor); 
                                    ?>,
                                    <?php
                                        $query = mysqli_query($kon,"SELECT data from sensor_tinggi
                                        RIGHT JOIN tinggi ON tinggi.tanggal2=DATE(sensor_tinggi.waktu)");
                                        while($row = mysqli_fetch_array($query)){
                                            $data_sensor = $row['data'];
                                        }
                                        echo json_encode($data_sensor); 
                                    ?>,
                                    <?php
                                        $query = mysqli_query($kon,"SELECT data from sensor_tinggi
                                        RIGHT JOIN tinggi ON tinggi.tanggal3=DATE(sensor_tinggi.waktu)");
                                        while($row = mysqli_fetch_array($query)){
                                            $data_sensor = $row['data'];
                                        }
                                        echo json_encode($data_sensor); 
                                    ?>,
                                    <?php
                                        $query = mysqli_query($kon,"SELECT data from sensor_tinggi
                                        RIGHT JOIN tinggi ON tinggi.tanggal4=DATE(sensor_tinggi.waktu)");
                                        while($row = mysqli_fetch_array($query)){
                                            $data_sensor = $row['data'];
                                        }
                                        echo json_encode($data_sensor); 
                                    ?>,
                                ],
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