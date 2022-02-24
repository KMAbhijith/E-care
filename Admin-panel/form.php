<?php
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
    <title>Forms</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
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

<body class="animsition">
    <div class="page-wrapper">
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
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


                        <!-- table -->
                        <center>
                            <div class="container col-lg-6" style="padding:25px;border-radius:20px;">

                                <h4>Doctors Schedules</h4>
                                <hr><br>
                                <form action="specialize-table.php" method="POST">
                                    <div class="form-group">

                                        <select id="deptid" class="custom-select" onchange="change_dept();" required>
                                            <option value="">Select a Department</option>
                                            <?php
                                            $qr =  mysqli_query($con, "select *from department");
                                            while ($r =  mysqli_fetch_array($qr)) {
                                            ?>
                                                <option value=" <?php echo $r['Dept_id']; ?>"><?php echo $r['Dept_name']; ?></option>
                                            <?php

                                            }
                                            ?>
                                        </select>

                                    </div>
                                </form>
                        </center><br>
                        <div class="container">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="background-color: black;color:white;">
                                        <th>no</th>
                                        <th>Doctor Name</th>
                                        <th>Specializations</th>
                                        <th>Schedule </th>
                                    </tr>
                                </thead>
                                <tbody id="sp"></tbody>

                            </table>
                        </div>

                        <script>
                            function change_dept() {
                                var deptspec = $("#deptid").val();

                                $.ajax({
                                    type: "POST",
                                    url: "scheduleview.php",
                                    data: "deptspec=" + deptspec,
                                    cache: false,
                                    success: function(response) {
                                        //alert(response);return false;
                                        $("#sp").html(response);
                                    }
                                });

                            }
                        </script>
                    </div>
                </div>

            </div>
        </div>
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