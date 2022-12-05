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
    $tanggal5 = $row['tanggal5'];
    $tanggal6 = $row['tanggal6'];
    $tanggal7 = $row['tanggal7'];
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
                        <div class="col-9 pt-4">
                            <div class="bg-light rounded h-100 p-4 ">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <h6 class="mb-0">Sensor Tinggi</h6>
                                    </div>
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
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

    <script>
        var ctx1 = $("#myChart").get(0).getContext("2d");
            var myChart1 = new Chart(ctx1, {
                type: "bar",
                data: {
                    labels:[
                            <?php echo json_encode($tanggal1); ?>, 
                            <?php echo json_encode($tanggal2); ?>,
                            <?php echo json_encode($tanggal3); ?>,
                            <?php echo json_encode($tanggal4); ?>,
                            <?php echo json_encode($tanggal5); ?>,
                            <?php echo json_encode($tanggal6); ?>,
                            <?php echo json_encode($tanggal7); ?>,
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
                                    <?php
                                        $query = mysqli_query($kon,"SELECT * FROM tinggi");
                                        while($row = mysqli_fetch_array($query)){
                                            $data_real = $row['data5'];
                                        }
                                        echo json_encode($data_real); 
                                    ?>,
                                    <?php
                                        $query = mysqli_query($kon,"SELECT * FROM tinggi");
                                        while($row = mysqli_fetch_array($query)){
                                            $data_real = $row['data6'];
                                        }
                                        echo json_encode($data_real); 
                                    ?>,
                                    <?php
                                        $query = mysqli_query($kon,"SELECT * FROM tinggi");
                                        while($row = mysqli_fetch_array($query)){
                                            $data_real = $row['data7'];
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
                                        $query = mysqli_query($kon,"SELECT data, tanggal from sensor_tinggi
                                        INNER JOIN tinggi ON sensor_tinggi.tanggal=tinggi.tanggal1");
                                        while($row = mysqli_fetch_array($query)){
                                            $data_sensor = $row['data'];
                                        }
                                        echo json_encode($data_sensor); 
                                    ?>,
                                    <?php
                                        $query = mysqli_query($kon,"SELECT data, tanggal from sensor_tinggi
                                        INNER JOIN tinggi ON sensor_tinggi.tanggal=tinggi.tanggal2");
                                        while($row = mysqli_fetch_array($query)){
                                            $data_sensor = $row['data'];
                                        }
                                        echo json_encode($data_sensor); 
                                    ?>,
                                    <?php
                                        $query = mysqli_query($kon,"SELECT data, tanggal from sensor_tinggi
                                        INNER JOIN tinggi ON sensor_tinggi.tanggal=tinggi.tanggal3");
                                        while($row = mysqli_fetch_array($query)){
                                            $data_sensor = $row['data'];
                                        }
                                        echo json_encode($data_sensor); 
                                    ?>,
                                    <?php
                                        $query = mysqli_query($kon,"SELECT data, tanggal from sensor_tinggi
                                        INNER JOIN tinggi ON sensor_tinggi.tanggal=tinggi.tanggal4");
                                        while($row = mysqli_fetch_array($query)){
                                            $data_sensor = $row['data'];
                                        }
                                        echo json_encode($data_sensor); 
                                    ?>,
                                    <?php
                                        $query = mysqli_query($kon,"SELECT data, tanggal from sensor_tinggi
                                        INNER JOIN tinggi ON sensor_tinggi.tanggal=tinggi.tanggal5");
                                        while($row = mysqli_fetch_array($query)){
                                            $data_sensor = $row['data'];
                                        }
                                        echo json_encode($data_sensor); 
                                    ?>,
                                    <?php
                                        $query = mysqli_query($kon,"SELECT data, tanggal from sensor_tinggi
                                        INNER JOIN tinggi ON sensor_tinggi.tanggal=tinggi.tanggal6");
                                        while($row = mysqli_fetch_array($query)){
                                            $data_sensor = $row['data'];
                                        }
                                        echo json_encode($data_sensor); 
                                    ?>,
                                    <?php
                                        $query = mysqli_query($kon,"SELECT data, tanggal from sensor_tinggi
                                        INNER JOIN tinggi ON sensor_tinggi.tanggal=tinggi.tanggal7");
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