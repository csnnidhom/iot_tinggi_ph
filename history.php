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
    $data_history[] = $row['data_history'];
    $tanggal_history[] = $row['tanggal_history'];
    $data_sensor[] = $row['data'];

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
                    labels:<?php echo json_encode($tanggal_history); ?>,
                    datasets: [{
                            label: "Data Tinggi Real",
                            data: <?php echo json_encode($data_history); ?>,
                            backgroundColor: "rgba(0, 156, 255, .5)"
                        },
                        {
                            label: "Data Tinggi Sensor",
                            data: <?php echo json_encode($data_sensor); ?>,
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