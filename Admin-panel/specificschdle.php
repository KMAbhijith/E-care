<?php

session_start();
include "connect.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body>
    <?php
    $ri = $_GET['id'];
    $query = "select * from doctor where D_id='$ri'";

    $res = mysqli_query($con, $query);

    $r = mysqli_fetch_array($res);
    $query1 = "select * from department where Dept_id='$r[Dept_id]'";
    $res1 = mysqli_query($con, $query1);
    $d = mysqli_fetch_array($res1);
    $query2 = "select * from specializations where Dept_id='$r[Dept_id]' and D_specialization_id=$r[D_specialization_id]";
    $res2 = mysqli_query($con, $query2);
    $sp = mysqli_fetch_array($res2);

    ?>
    <?php
    $pic = "select Pro_pics from profileimages where Log_id =$r[Log_id] and Utype_id=2 ";
    $check = mysqli_query($con, $pic);
    $fe = mysqli_fetch_array($check);


    ?>
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php
        include "index-sidebar.php";
        ?>
        <!-- PAGE CONTAINER-->
        <div class="page-container">

            <?php
            include "nav.php";
            ?>
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30" style="margin-top: -20px;">

                    <section style="background-color: #eee;border-radius:25px;">
                        <div class="container py-5">
                            <div class="row">
                                <div class="col">
                                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4" style="border-radius:25px;">
                                        <h4>Doctor details</h4>
                                    </nav>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card mb-4" style="border-radius:25px;">
                                        <div class="card-body text-center">
                                            <img src="../uploadedimg/<?php echo $fe['Pro_pics']; ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                            <h5 class="my-3"><?php echo $r['D_name']; ?></h5>
                                            <p class="text-muted mb-1">Doctor</p>
                                            <p class="text-muted mb-4">Specialised in&nbsp;<?php echo $sp['D_specializations']; ?><br><?php echo $d['Dept_name']; ?>&nbsp;Department</p>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-8 ">
                                    <div class="card mb-4" style="padding:25px;border-radius:25px;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Full Name</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0"><?php echo $r['D_name']; ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Email</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0"><?php echo $r['D_email']; ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <p class="mb-0">Phone</p>
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="text-muted mb-0"><?php echo $r['D_phone']; ?></p>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card" style="padding:25px;border-radius:15px;">
                                            <h4>Schedule</h4>
                                            <hr><br>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr style="background-color: black;color:white;">
                                                        <th>no</th>
                                                        <th>Weekdays</th>
                                                        <th>Time slots</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                $doc1 = mysqli_query($con, "select * from doctor where D_id='$ri'");
                                                $d1 = mysqli_fetch_array($doc1);
                                                $sql7 = "SELECT * from weekdays w,timeslot t,schedule s where w.W_id=s.W_id and t.T_id=s.T_id and s.D_id='$ri'";
                                                $sch = mysqli_query($con, $sql7);
                                                $i = 1;
                                                while ($sh = mysqli_fetch_array($sch)) {
                                                ?>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td><?php echo $sh['W_days']; ?> </td>
                                                            <td><?php echo $sh['T_slot']; ?> </td>

                                                        </tr>
                                                    </tbody>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card mb-4 mb-md-0">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->


        </div>

        <!-- Jquery JS-->
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="vendor/slick/slick.min.js">
        </script>
        <script src="vendor/wow/wow.min.js"></script>
        <script src="vendor/animsition/animsition.min.js"></script>
        <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
        </script>
        <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendor/counter-up/jquery.counterup.min.js">
        </script>
        <script src="vendor/circle-progress/circle-progress.min.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="vendor/select2/select2.min.js">
        </script>

        <!-- Main JS-->
        <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->