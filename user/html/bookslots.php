<?php
session_start();
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>One Health - Medical Center HTML5 Template</title>

    <link rel="stylesheet" href="../assets/css/maicons.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="../assets/css/theme.css">
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
    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <?php
    include "nav.php";
    ?>

    <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
        <div class="banner-section">
            <div class="container text-center wow fadeInUp">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Doctors</li>
                    </ol>
                </nav>
                <h1 class="font-weight-normal">Book Slots</h1>
            </div> <!-- .container -->
        </div> <!-- .banner-section -->
    </div> <!-- .page-banner -->

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
                                    <img src="../../uploadedimg/<?php echo $fe['Pro_pics']; ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
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
                                                <th>Book slots</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php


                                            $doc1 = mysqli_query($con, "select * from doctor where D_id='$ri'");
                                            $d1 = mysqli_fetch_array($doc1);
                                            $sql7 = "SELECT * from weekdays w,timeslot t,schedule s where w.W_id=s.W_id and t.T_id=s.T_id and s.D_id='$ri'";
                                            $sch = mysqli_query($con, $sql7);
                                            $i = 1;
                                            $cursor = new DateTime("now", new DateTimeZone("Asia/Kolkata"));
                                            while ($sh = mysqli_fetch_array($sch)) {
                                            ?>

                                                <tr>
                                                    <?php
                                                    $wd[] = $sh['W_days'];

                                                    ?>
                                                    <td><?php echo $i++; ?></td>

                                                    <td><?php echo $sh['W_days']; ?> </td>
                                                    <td><?php echo $sh['T_slot']; ?> </td>
                                                    <td><button class="btn btn-primary">Book now</button> </td>

                                                <?php
                                            } ?>
                                                </tr>
                                        </tbody>

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
    </div>


    <!-- .page-section -->



    <!-- <div class="page-section">
        <div class="container">
            <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

            <form class="main-form">
                <div class="row mt-5 ">
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                        <input type="text" class="form-control" placeholder="Full name">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <input type="text" class="form-control" placeholder="Email address..">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                        <select name="departement" id="departement" class="custom-select">
                            <option value="general">General Health</option>
                            <option value="cardiology">Cardiology</option>
                            <option value="dental">Dental</option>
                            <option value="neurology">Neurology</option>
                            <option value="orthopaedics">Orthopaedics</option>
                        </select>
                    </div>
                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                        <input type="text" class="form-control" placeholder="Number..">
                    </div>
                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                        <textarea name="message" id="message" class="form-control" rows="6"
                            placeholder="Enter message.."></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
            </form>
        </div> 
    </div>


    <div class="page-section banner-home bg-image" style="background-image: url(../assets/img/banner-pattern.svg);">
        <div class="container py-5 py-lg-0">
            <div class="row align-items-center">
                <div class="col-lg-4 wow zoomIn">
                    <div class="img-banner d-none d-lg-block">
                        <img src="../assets/img/mobile_app.png" alt="">
                    </div>
                </div>
                <div class="col-lg-8 wow fadeInRight">
                    <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application
                    </h1>
                    <a href="#"><img src="../assets/img/google_play.svg" alt=""></a>
                    <a href="#" class="ml-2"><img src="../assets/img/app_store.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div> -->


    <?php include "footer.php" ?>

    <script src="../assets/js/jquery-3.5.1.min.js">
    </script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="../assets/vendor/wow/wow.min.js"></script>

    <script src="../assets/js/theme.js"></script>

</body>

</html>