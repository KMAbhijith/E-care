<?php
session_start();
include "connect.php";
if (isset($_SESSION['doctor'])) {
    $ri = $_SESSION['doctor'];
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
        <title>Tables</title>

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
        <!--    <link href="css/ajaxvalid.css" rel="stylesheet">-->
        <style>
            .entry:not(:first-of-type) {
                margin-top: 10px;
            }
        </style>
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

                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <!-- nav tab-->
                        <div class="col" style="background-color:white;padding:25px;border-radius:10px;">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Schedule</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-doctor" role="tab" aria-controls="pills-doctor" aria-selected="false">Education Qualification</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-spec" role="tab" aria-controls="pills-contact" aria-selected="false">Experience</a>
                                </li>
                            </ul>
                            <hr>
                            <div class="tab-content" id="pills-tabContent">
                                <!-- nav tab1-->
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <br>
                                    <div class="card" style="padding: 25px;border-radius:25px;">
                                        <h4>Schedule</h4>
                                        <hr>
                                        <form method="POST" action="schedule.php">
                                            <?php
                                            $doc = mysqli_query($con, "select * from doctor where Log_id='$ri'");
                                            $d = mysqli_fetch_array($doc);
                                            ?>
                                            <input type="text" name="did" value="<?php echo $d['D_id']; ?>" hidden />
                                            <div class="form-group">
                                                <label for="uname">Weekdays:</label>
                                                <select id="wid" class="custom-select" name="wid" onchange="change_time();" required>
                                                    <option value="">Open this select menu</option>
                                                    <?php
                                                    $qr =  mysqli_query($con, "select *from weekdays");
                                                    while ($r =  mysqli_fetch_array($qr)) {
                                                    ?>
                                                        <option value=" <?php echo $r['W_id']; ?>"><?php echo $r['W_days']; ?></option>
                                                    <?php

                                                    }
                                                    ?>
                                                </select>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback"> invalid select </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="uname">Time slots:</label>
                                                <select id="tid" class="custom-select" name="tid" required>
                                                    <option value="">Open this select menu</option>
                                                    <?php
                                                    $ts =  mysqli_query($con, "select * from timeslot");
                                                    while ($rs =  mysqli_fetch_array($ts)) {
                                                    ?>
                                                        <option value=" <?php echo $rs['T_id']; ?>"><?php echo $rs['T_slot']; ?></option>
                                                    <?php

                                                    }
                                                    ?>
                                                </select>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback"> invalid select </div>
                                            </div>
                                            <br>
                                            <button type="submit" name="submit" class="btn btn-primary col">Schedule</button>
                                            <br>
                                        </form>
                                    </div>
                                    <div class="card" style="padding:25px;border-radius:25px;">
                                        <h4>Schedule</h4>
                                        <hr><br>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr style="background-color: black;color:white;">
                                                    <th>no</th>
                                                    <th>Weekdays</th>
                                                    <th>Time slots</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $doc1 = mysqli_query($con, "select * from doctor where Log_id='$ri'");
                                            $d1 = mysqli_fetch_array($doc1);
                                            $s1 = $d1['D_id'];
                                            $sql7 = "SELECT * from weekdays w,timeslot t,schedule s where w.W_id=s.W_id and t.T_id=s.T_id and s.D_id='$s1'";
                                            $sch = mysqli_query($con, $sql7);
                                            $i = 1;
                                            while ($sh = mysqli_fetch_array($sch)) {
                                            ?>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $sh['W_days']; ?> </td>
                                                        <td><?php echo $sh['T_slot']; ?> </td>
                                                        <td><a href="id=?<?php $sh['T_slot'] ?>">Delete</a> </td>

                                                    </tr>
                                                </tbody>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                                <!-- nav tab2-->
                                <div class="tab-pane fade " id="pills-doctor" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <center><br>
                                        <div class=" card col-lg-6" style="padding:10px;border-radius:15px;">
                                            <div class=" card-body ">
                                                <h5 class=" text-primary">Add Education Qualification</h5>
                                                <hr>
                                                <br>
                                                <form action="add_education.php" method="POST">
                                                    <input type="hidden" name="did" value="<?php echo $d1['D_id']; ?>" />
                                                    <div class="row mb-3">
                                                        <div id="error_msg"></div>
                                                        <div class="col-sm-12 text-secondary"><input type="text" name="qa" placeholder="Qualification" id="qa" class="form-control" value="" pattern="[A-Za-z\s]{2,24}" required></div>
                                                        <div id="uname_response"></div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-3"></div>
                                                        <div class="col-sm-12 text-secondary"><input type="submit" class="btn btn-primary px-4" name="submit" id="reg_btn" value="Add" /></div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </center>
                                    <center>
                                        <div class="container col-lg-6" style="padding:25px;border-radius:20px;">

                                            <h4>Education Qualification</h4>
                                            <hr><br>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr style="background-color: black;color:white;">
                                                        <th>no</th>
                                                        <th>Qualifications</th>

                                                    </tr>
                                                </thead>
                                                <?php
                                                $sql = "select * from doctoreducation where D_id='$d1[D_id]'";
                                                $qr = mysqli_query($con, $sql);
                                                $i = 1;
                                                while ($r =  mysqli_fetch_array($qr)) {
                                                ?>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $i++; ?></td>
                                                            <td><?php echo $r['D_edu_qualification']; ?> </td>



                                                        </tr>
                                                    </tbody>
                                                <?php } ?>
                                            </table>

                                        </div>
                                    </center>
                                </div>
                                <script>
                                    function change_dept() {
                                        var deptspec = $("#qa").val();

                                        $.ajax({
                                            type: "POST",
                                            url: "add_education.php",
                                            data: "deptspec=" + deptspec,
                                            cache: false,
                                            success: function(response) {
                                                //alert(response);return false;
                                                $("#sp").html(response);
                                            }
                                        });

                                    }
                                </script>

                                <!-- nav tab3-->
                                <div class="tab-pane fade" id="pills-spec" role="tabpanel" aria-labelledby="pills-contact-tab">

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
<?php } else {

    if (headers_sent()) {
        die('<script type="text/javascript">window.location.href="../login.php?e=1"</script>');
    } else {
        header("location:../login.php?e=1");
        die();
    }
}
?>