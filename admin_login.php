<!DOCTYPE html>
<html>
<?php 
session_start();
include'conn.php'; 

// Validate the input for $aid
if (!isset($_SESSION['aid'])) {
    echo "Missing required session variable 'aid'.";
    exit();
}

// Retrieve the total number of patients
$totalPatientsQuery = "SELECT COUNT(*) as Overall FROM patients";
$totalPatientsResult = mysqli_query($conn, $totalPatientsQuery);
$totalPatientsCount = mysqli_fetch_assoc($totalPatientsResult)['Overall'];

$todayPatientsQuery = "SELECT COUNT(*) as Overall FROM patients WHERE posting_date = CURDATE() ";
$todayPatientsResult = mysqli_query($conn, $todayPatientsQuery);
$todayPatientsCount = mysqli_fetch_assoc($todayPatientsResult)['Overall'];

$totalDoctorsQuery = "SELECT COUNT(*) as Overall FROM doctors";
$totalDoctorsResult = mysqli_query($conn, $totalDoctorsQuery);
$totalDoctorsCount = mysqli_fetch_assoc($totalDoctorsResult)['Overall'];

$todayDoctorsQuery = "SELECT COUNT(*) as Overall FROM doctors WHERE posting_date = CURDATE() ";
$todayDoctorsResult = mysqli_query($conn, $todayDoctorsQuery);
$todayDoctorsCount = mysqli_fetch_assoc($todayDoctorsResult)['Overall'];

$AppointmentsQuery = "SELECT COUNT(*) as Overall FROM appointments";
$AppointmentsResult = mysqli_query($conn, $AppointmentsQuery);
$AppointmentsCount = mysqli_fetch_assoc($AppointmentsResult)['Overall'];

$UpcomingAppointmentsQuery = "SELECT COUNT(*) as Overall FROM appointments WHERE appointment_date > NOW()";
$UpcomingAppointmentsResult = mysqli_query($conn, $UpcomingAppointmentsQuery);
$UpcomingAppointmentsCount = mysqli_fetch_assoc($UpcomingAppointmentsResult)['Overall'];

$ProductsQuery = "SELECT COUNT(*) as Overall FROM product";
$ProductsResult = mysqli_query($conn, $ProductsQuery);
$ProductsCount = mysqli_fetch_assoc($ProductsResult)['Overall'];

$SalesQuery = "SELECT COUNT(*) as Overall FROM order_details";
$SalesResult = mysqli_query($conn, $SalesQuery);
$SalesCount = mysqli_fetch_assoc($SalesResult)['Overall'];
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="home.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Admin Dashboard</title>
</head>

<body>

    <?php
include'admin_sidebar.php'; 
?>

    <div class="main-content">
        <div class="row">
            <div class="col-md-6 col-vlg-3 col-sm-6">
                <div class="tiles green m-b-10">
                    <div class="tiles-body">
                        <div class="tiles-title ">Visitors </div>
                        <div class="widget-stats">
                            <div class="wrapper transparent">
                                <span class="item-title">Overall</span> <span
                                    class="item-count animate-number semi-bold"
                                    data-animation-duration="700"><?php echo $totalPatientsCount+10; ?></span>
                            </div>
                        </div>
                        <div class="widget-stats ">
                            <div class="wrapper last">
                                <span class="item-title">Today</span> <span class="item-count animate-number semi-bold"
                                    data-animation-duration="700"><?php echo $todayPatientsCount+5; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-vlg-3 col-sm-6">
                <div class="tiles blue m-b-10">
                    <a href="manage_doctors.php" style="color: white;">
                        <div class="tiles-body">
                            <div class="tiles-title ">Packages</div>
                            <div class="widget-stats">
                                <div class="wrapper transparent">
                                    <span class="item-title">All</span>
                                    <span class="item-count animate-number semi-bold"
                                        data-animation-duration="700"><?php echo $totalDoctorsCount; ?></span>
                                </div>
                            </div>
                            <div class="widget-stats ">
                                <div class="wrapper last">
                                    <span class="item-title">Today</span>
                                    <span class="item-count animate-number semi-bold"
                                        data-animation-duration="700"><?php echo $todayDoctorsCount; ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-vlg-3 col-sm-6">
                <div class="tiles blue m-b-10">
                    <a href="manage_patients.php" style="color: white;">
                        <div class="tiles-body">
                            <div class="tiles-title ">Users</div>
                            <div class="widget-stats">
                                <div class="wrapper transparent">
                                    <span class="item-title">Overall</span> <span
                                        class="item-count animate-number semi-bold"
                                        data-animation-duration="700"><?php echo $totalPatientsCount; ?></span>
                                </div>
                            </div>
                            <div class="widget-stats">
                                <div class="wrapper transparent">
                                    <span class="item-title">New</span> <span
                                        class="item-count animate-number semi-bold"
                                        data-animation-duration="700"><?php echo $todayPatientsCount; ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-vlg-3 col-sm-6">
                <div class="tiles green m-b-10">
                    <a href="view_appointments.php" style="color: white;">
                        <div class="tiles-body">
                            <div class="tiles-title ">Bookings</div>
                            <div class="widget-stats">
                                <div class="wrapper transparent">
                                    <span class="item-title">All</span> <span
                                        class="item-count animate-number semi-bold"
                                        data-animation-duration="700"><?php echo $AppointmentsCount; ?></span>
                                </div>
                            </div>
                            <div class="widget-stats ">
                                <div class="wrapper last">
                                    <span class="item-title">Pending</span> <span
                                        class="item-count animate-number semi-bold"
                                        data-animation-duration="700"><?php echo $UpcomingAppointmentsCount; ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


            </div>
            <div class="col-md-6 col-vlg-3 col-sm-6">
                <div class="tiles green m-b-10">
                    <a href="manage_products.php" style="color: white;">
                        <div class="tiles-body">
                            <div class="tiles-title ">Products</div>
                            <div class="widget-stats">
                                <div class="wrapper transparent">

                                    <span class="item-title">In Stock</span> <span
                                        class="item-count animate-number semi-bold"
                                        data-animation-duration="700"><?php echo $ProductsCount; ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-vlg-3 col-sm-6">
                <div class="tiles blue m-b-10">
                    <a href="view_sales.php" style="color: white;">
                        <div class="tiles-body">
                            <div class="tiles-title ">Sales</div>
                            <div class="widget-stats">
                                <div class="wrapper transparent">

                                    <span class="item-title">Till Now</span> <span
                                        class="item-count animate-number semi-bold"
                                        data-animation-duration="700"><?php echo $SalesCount; ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    </div>

    <?php include 'footer.php' ?>

</body>

</html>