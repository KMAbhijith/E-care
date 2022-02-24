<?php

session_start();
include "connect.php";

if (isset($_SESSION['doctor'])) {
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
        $ri = $_SESSION['doctor'];
        $query = "select * from doctor where Log_id='$ri'";
        $res = mysqli_query($con, $query);
        $r = mysqli_fetch_array($res);
        $query1 = "select * from department where Dept_id='$r[Dept_id]'";
        $res1 = mysqli_query($con, $query1);
        $d = mysqli_fetch_array($res1);
        $query2 = "select * from specializations where  D_specialization_id='$r[D_specialization_id]' and Dept_id='$r[Dept_id]'";
        $res2 = mysqli_query($con, $query2);
        $sp = mysqli_fetch_array($res2);

        ?>
        <?php
        $pic = "select Pro_pics from profileimages where Log_id =$ri and Utype_id=2 ";
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
                    <div class="section__content section__content--p30" style="margin-top: -40px;">

                        <section style="background-color: #eee;border-radius:25px;">
                            <div class="container py-5">
                                <div class="row">
                                    <div class="col">
                                        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4" style="border-radius:25px;">
                                            <h4>DOCTOR PANEL</h4>
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
                                                <p class="text-muted mb-4">Specialised :&nbsp;<?php echo $sp['D_specializations']; ?><br><?php echo $d['Dept_name']; ?>&nbsp;Department</p>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-8">
                                        <div class="card mb-4" style="padding:5px;border-radius:15px;">
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
                                                <hr>

                                            </div>
                                        </div>
                                        <div class="row">

                                        </div>
                                        <div class="col-md-12">
                                            <div class="card mb-4 mb-md-0" style="padding:5px;border-radius:15px;">

                                                <div class="card-body">
                                                    <h5 class="text-primary">Edit profile</h5>
                                                    <hr>
                                                    <br>
                                                    <form action="updateprofile.php" method="POST">
                                                        <?php
                                                        //$ri=$_SESSION['userid'];//
                                                        $pdetails = mysqli_query($con, "select * from doctor where Log_id=$ri");
                                                        $pd = mysqli_fetch_array($pdetails); ?>

                                                        <input type="hidden" name="id" value=" <?php echo $pd['D_id']; ?>" />

                                                        <div class="row mb-3">
                                                            <div class="col-sm-3">
                                                                <h6 class="mb-0">Email</h6>
                                                            </div>
                                                            <div class="col-sm-9 text-secondary"><input type="email" name="email" class="form-control" value="<?php echo $pd['D_email']; ?>"></div>
                                                        </div>
                                                        <div class="row mb-3">
                                                            <div class="col-sm-3">
                                                                <h6 class="mb-0">Phone</h6>
                                                            </div>
                                                            <div class="col-sm-9 text-secondary"><input type="text" name="phone" class="form-control" value="<?php echo $pd['D_phone']; ?>"></div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-sm-3"></div>
                                                            <div class="col-sm-9 text-secondary"><input type="submit" class="btn btn-primary px-4" name="submit" value="Save Changes"></div>
                                                        </div>
                                                    </form>
                                                </div>


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
<?php } ?>