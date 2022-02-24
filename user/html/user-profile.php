<?php

session_start();
include "connect.php";

if (isset($_SESSION['userid'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <meta name="copyright" content="MACode ID, https://macodeid.com/">

        <title>One Health - Medical Center HTML5 Template</title>
        <link rel="stylesheet" href="../assets/css/picupload.css">

        <link rel="stylesheet" href="../assets/css/maicons.css">

        <link rel="stylesheet" href="../assets/css/bootstrap.css">

        <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

        <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

        <link rel="stylesheet" href="../assets/css/theme.css">

        <link rel="stylesheet" href="../assets/css/schdle.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">




    </head>

    <body>

        <?php
        $ri = $_SESSION['userid'];
        $query = "select * from patient where Log_id='$ri'";
        $res = mysqli_query($con, $query);

        $r = mysqli_fetch_array($res);
        ?>
        <div class=" back-to-top">

        </div>
        <?php include "nav.php";
        ?>
        <div class="page-section ">
            <div class=" container col-12">
                <div class="main-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <?php
                                        $pic = "select Pro_pics from profileimages where Log_id =$ri and Utype_id=3 ";
                                        $check = mysqli_query($con, $pic);
                                        $fe = mysqli_fetch_array($check);
                                        $count = mysqli_num_rows($check);
                                        if ($count > 0) {
                                        ?>
                                            <img src="<?php echo $fe['Pro_pics']; ?>" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">

                                        <?php } else { ?>
                                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                        <?php }  ?>

                                        <div class="mt-3">
                                            <button class="btn btn-outline-primary" onclick="openForm()">change profile pic</button>
                                            <div class="form-popup" id="myForm">
                                                <form action="#" class="form-container" enctype="multipart/form-data">
                                                    <h3>change profile pic</h3>
                                                    <input type="hidden" name="pd" value="<?php echo $r['P_id']; ?>" />

                                                    <input id="file" type="file" name="file" required />
                                                    <p id="output"></p>

                                                    <button type="submit" class="btn btn-outline-primary" name="submit">change profile pic</button>

                                                    <script type="text/javascript">
                                                        $('#file').on('change', function() {

                                                            var val = $(this).val();

                                                            switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase()) {
                                                                case 'gif':
                                                                case 'jpg':
                                                                case 'png':

                                                                    break;
                                                                default:
                                                                    $(this).val('');
                                                                    // error message here
                                                                    alert("not an image");
                                                                    $("#file").val(null);
                                                                    break;
                                                            }

                                                            const size =
                                                                (this.files[0].size / 1024 / 1024).toFixed(2);

                                                            if (size > 1) {
                                                                alert("file size is larger than 1 mb");
                                                                $("#file").val(null);
                                                            } else {
                                                                $("#output").html('<b>' +
                                                                    'This file size is: ' + size + " MB" + '</b>');
                                                            }
                                                        });
                                                    </script>


                                                    <button class="btn btn-outline-primary" onclick="closeForm()">close form</button>

                                                </form>
                                            </div>

                                            <script>
                                                function openForm() {
                                                    document.getElementById("myForm").style.display = "block";
                                                }

                                                function closeForm() {
                                                    document.getElementById("myForm").style.display = "none";
                                                }
                                            </script>
                                            <hr>
                                            <h4><?php echo $r['P_name']; ?></h4>
                                            <p class="text-secondary mb-1">Patient</p>
                                            <p class="text-muted font-size-sm"><?php echo $r['P_address']; ?></p>

                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-award-fill feather  text-primary" viewBox="0 0 26 26">
                                                    <path d="m8 0 1.669.864 1.858.282.842 1.68 1.337 1.32L13.4 6l.306 1.854-1.337 1.32-.842 1.68-1.858.282L8 12l-1.669-.864-1.858-.282-.842-1.68-1.337-1.32L2.6 6l-.306-1.854 1.337-1.32.842-1.68L6.331.864 8 0z" />
                                                    <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z" />
                                                </svg>Name</h6><span class="text-secondary"><?php echo $r['P_name']; ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-emoji-neutral feather  text-primary" viewBox="0 0 26 26">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                    <path d="M4 10.5a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 0-1h-7a.5.5 0 0 0-.5.5zm3-4C7 5.672 6.552 5 6 5s-1 .672-1 1.5S5.448 8 6 8s1-.672 1-1.5zm4 0c0-.828-.448-1.5-1-1.5s-1 .672-1 1.5S9.448 8 10 8s1-.672 1-1.5z" />
                                                </svg>Age
                                            </h6>
                                            <?php
                                            $dateOfBirth = $r['P_dob'];
                                            $diff = date_diff(date_create($dateOfBirth), date_create(date("Y-m-d")));
                                            ?>
                                            <span class="text-secondary"><?php echo $diff->format('%y'); ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-gender-ambiguous feather  text-primary" viewBox="0 0 26 26">
                                                    <path fill-rule="evenodd" d="M11.5 1a.5.5 0 0 1 0-1h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-3.45 3.45A4 4 0 0 1 8.5 10.97V13H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V14H6a.5.5 0 0 1 0-1h1.5v-2.03a4 4 0 1 1 3.471-6.648L14.293 1H11.5zm-.997 4.346a3 3 0 1 0-5.006 3.309 3 3 0 0 0 5.006-3.31z" />
                                                </svg>Gender</h6><span class="text-secondary"><?php echo $r['P_gender']; ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-droplet-fill feather  text-primary" viewBox="0 0 26 26">
                                                    <path d="M8 16a6 6 0 0 0 6-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c0 0-6 5.686-6 10a6 6 0 0 0 6 6ZM6.646 4.646l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448c.82-1.641 1.717-2.753 2.093-3.13Z" />
                                                </svg>Blood group</h6><span class="text-secondary">A+</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-phone feather  text-primary" viewBox="0 0 26 26">
                                                    <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                                                    <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                                </svg>Mobile
                                            </h6><span class="text-secondary"><?php echo $r['P_phone']; ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-envelope feather  text-primary" viewBox="0 0 26 26">
                                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                                </svg>Email</h6><span class="text-secondary"><?php echo $r['P_email']; ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-home" aria-selected="true">Edit profile</a>
                                    <!--      <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Reports</a> 
                                    <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Edit
                                        profile/Feedback</a>-->
                                </div>
                            </nav>

                            <div class="tab-pane " id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <br>

                                <div class=" card">
                                    <div class="card-body">
                                        <h5 class="text-primary">Edit profile</h5>
                                        <hr>
                                        <br>
                                        <form action="updateprofile.php" method="POST">
                                            <?php
                                            //$ri=$_SESSION['userid'];//
                                            $pdetails = mysqli_query($con, "select * from patient where Log_id=$ri");
                                            $pd = mysqli_fetch_array($pdetails); ?>

                                            <input type="hidden" name="id" value=" <?php echo $pd['P_id']; ?>" />

                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Email</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary"><input type="email" name="email" class="form-control" value="<?php echo $pd['P_email']; ?>"></div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Phone</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary"><input type="text" name="phone" class="form-control" value="<?php echo $pd['P_phone']; ?>"></div>
                                            </div>


                                            <div class="row">
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9 text-secondary"><input type="submit" class="btn btn-primary px-4" name="submit" value="Save Changes"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <br>

                                <!--       <div class="card">
                                        <div class="card-body">
                                            <h5 class="text-primary">Feedback</h5>
                                            <hr>
                                            <form class="contact-form mt-5">
                                                <div class="row mb-3">
                                                    <div class="col-sm-6 py-2 wow fadeInLeft">
                                                        <label for="fullName">Name</label>
                                                        <input type="text" id="fullName" class="form-control" placeholder="Full name..">
                                                    </div>
                                                    <div class="col-sm-6 py-2 wow fadeInRight">
                                                        <label for="emailAddress">Email</label>
                                                        <input type="text" id="emailAddress" class="form-control" placeholder="Email address..">
                                                    </div>
                                                    <div class="col-12 py-2 wow fadeInUp">
                                                        <label for="subject">Subject</label>
                                                        <input type="text" id="subject" class="form-control" placeholder="Enter subject..">
                                                    </div>
                                                    <div class="col-12 py-2 wow fadeInUp">
                                                        <label for="message">Message</label>
                                                        <textarea id="message" class="form-control" rows="8" placeholder="Enter Message.."></textarea>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary wow zoomIn">Send
                                                    Message</button>
                                            </form>
                                        </div>
                                    </div>-->
                            </div>
                            <!-- tab 2-->
                            <!--           <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="event-schedule-area-two bg-color pad100">
                    <div class="container">

                        <div class="row">
                            <div class="col-lg-12">
                                <br>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade active show" id="home" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center" scope="col">Date</th>
                                                        <th scope="col">Doctor</th>
                                                        <th scope="col">Session</th>
                                                        <th scope="col">Venue</th>
                                                        <th class="text-center" scope="col">Report</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="inner-box">
                                                        <th scope="row">
                                                            <div class="event-date">
                                                                <span>16</span>
                                                                <p>Novembar</p>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div class="event-img">
                                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="event-wrap">
                                                                <h3><a href="#">Harman Kardon</a></h3>
                                                                <div class="meta">
                                                                    <div class="organizers">
                                                                        <a href="#">Aslan Lingker</a>
                                                                    </div>
                                                                    <div class="categories">
                                                                        <a href="#">Inspire</a>
                                                                    </div>
                                                                    <div class="time">
                                                                        <span>05:35 AM - 08:00 AM 2h
                                                                            25'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="r-no">
                                                                <span>Room B3</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="primary-btn">
                                                                <a class="btn btn-primary" href="#">Read
                                                                    More</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="inner-box">
                                                        <th scope="row">
                                                            <div class="event-date">
                                                                <span>20</span>
                                                                <p>Novembar</p>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div class="event-img">
                                                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="event-wrap">
                                                                <h3><a href="#">Toni Duggan</a></h3>
                                                                <div class="meta">
                                                                    <div class="organizers">
                                                                        <a href="#">Aslan Lingker</a>
                                                                    </div>
                                                                    <div class="categories">
                                                                        <a href="#">Inspire</a>
                                                                    </div>
                                                                    <div class="time">
                                                                        <span>05:35 AM - 08:00 AM 2h
                                                                            25'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="r-no">
                                                                <span>Room D3</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="primary-btn">
                                                                <a class="btn btn-primary" href="#">Read
                                                                    More</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="inner-box border-bottom-0">
                                                        <th scope="row">
                                                            <div class="event-date">
                                                                <span>18</span>
                                                                <p>Novembar</p>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div class="event-img">
                                                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="event-wrap">
                                                                <h3><a href="#">Billal Hossain</a></h3>
                                                                <div class="meta">
                                                                    <div class="organizers">
                                                                        <a href="#">Aslan Lingker</a>
                                                                    </div>
                                                                    <div class="categories">
                                                                        <a href="#">Inspire</a>
                                                                    </div>
                                                                    <div class="time">
                                                                        <span>05:35 AM - 08:00 AM 2h
                                                                            25'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="r-no">
                                                                <span>Room A3</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="primary-btn">
                                                                <a class="btn btn-primary" href="#">Read
                                                                    More</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Doctor</th>
                                                        <th scope="col">Session</th>
                                                        <th scope="col">Venue</th>
                                                        <th scope="col">Report</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="inner-box">
                                                        <th scope="row">
                                                            <div class="event-date">
                                                                <span>16</span>
                                                                <p>Novembar</p>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div class="event-img">
                                                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="event-wrap">
                                                                <h3><a href="#">Toni Duggan</a></h3>
                                                                <div class="meta">
                                                                    <div class="organizers">
                                                                        <a href="#">Aslan Lingker</a>
                                                                    </div>
                                                                    <div class="categories">
                                                                        <a href="#">Inspire</a>
                                                                    </div>
                                                                    <div class="time">
                                                                        <span>05:35 AM - 08:00 AM 2h
                                                                            25'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="r-no">
                                                                <span>Room B3</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="primary-btn">
                                                                <a class="btn btn-primary" href="#">Read
                                                                    More</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="inner-box">
                                                        <th scope="row">
                                                            <div class="event-date">
                                                                <span>16</span>
                                                                <p>Novembar</p>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div class="event-img">
                                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="event-wrap">
                                                                <h3><a href="#">Harman Kardon</a></h3>
                                                                <div class="meta">
                                                                    <div class="organizers">
                                                                        <a href="#">Aslan Lingker</a>
                                                                    </div>
                                                                    <div class="categories">
                                                                        <a href="#">Inspire</a>
                                                                    </div>
                                                                    <div class="time">
                                                                        <span>05:35 AM - 08:00 AM 2h
                                                                            25'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="r-no">
                                                                <span>Room B3</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="primary-btn">
                                                                <a class="btn btn-primary" href="#">Read
                                                                    More</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="inner-box border-bottom-0">
                                                        <th scope="row">
                                                            <div class="event-date">
                                                                <span>16</span>
                                                                <p>Novembar</p>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div class="event-img">
                                                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="event-wrap">
                                                                <h3><a href="#">Billal Hossain</a></h3>
                                                                <div class="meta">
                                                                    <div class="organizers">
                                                                        <a href="#">Aslan Lingker</a>
                                                                    </div>
                                                                    <div class="categories">
                                                                        <a href="#">Inspire</a>
                                                                    </div>
                                                                    <div class="time">
                                                                        <span>05:35 AM - 08:00 AM 2h
                                                                            25'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="r-no">
                                                                <span>Room B3</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="primary-btn">
                                                                <a class="btn btn-primary" href="#">Read
                                                                    More</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Doctor</th>
                                                        <th scope="col">Session</th>
                                                        <th scope="col">Venue</th>
                                                        <th scope="col">Report</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="inner-box">
                                                        <th scope="row">
                                                            <div class="event-date">
                                                                <span>16</span>
                                                                <p>Novembar</p>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div class="event-img">
                                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="event-wrap">
                                                                <h3><a href="#">Harman Kardon</a></h3>
                                                                <div class="meta">
                                                                    <div class="organizers">
                                                                        <a href="#">Aslan Lingker</a>
                                                                    </div>
                                                                    <div class="categories">
                                                                        <a href="#">Inspire</a>
                                                                    </div>
                                                                    <div class="time">
                                                                        <span>05:35 AM - 08:00 AM 2h
                                                                            25'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="r-no">
                                                                <span>Room B3</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="primary-btn">
                                                                <a class="btn btn-primary" href="#">Read
                                                                    More</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="inner-box">
                                                        <th scope="row">
                                                            <div class="event-date">
                                                                <span>16</span>
                                                                <p>Novembar</p>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div class="event-img">
                                                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="event-wrap">
                                                                <h3><a href="#">Billal Hossain</a></h3>
                                                                <div class="meta">
                                                                    <div class="organizers">
                                                                        <a href="#">Aslan Lingker</a>
                                                                    </div>
                                                                    <div class="categories">
                                                                        <a href="#">Inspire</a>
                                                                    </div>
                                                                    <div class="time">
                                                                        <span>05:35 AM - 08:00 AM 2h
                                                                            25'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="r-no">
                                                                <span>Room B3</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="primary-btn">
                                                                <a class="btn btn-primary" href="#">Read
                                                                    More</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="inner-box border-bottom-0">
                                                        <th scope="row">
                                                            <div class="event-date">
                                                                <span>16</span>
                                                                <p>Novembar</p>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div class="event-img">
                                                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="event-wrap">
                                                                <h3><a href="#">Toni Duggan</a></h3>
                                                                <div class="meta">
                                                                    <div class="organizers">
                                                                        <a href="#">Aslan Lingker</a>
                                                                    </div>
                                                                    <div class="categories">
                                                                        <a href="#">Inspire</a>
                                                                    </div>
                                                                    <div class="time">
                                                                        <span>05:35 AM - 08:00 AM 2h
                                                                            25'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="r-no">
                                                                <span>Room B3</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="primary-btn">
                                                                <a class="btn btn-primary" href="#">Read
                                                                    More</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="sunday" role="tabpanel" aria-labelledby="sunday-tab">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Doctor</th>
                                                        <th scope="col">Session</th>
                                                        <th scope="col">Venue</th>
                                                        <th scope="col">Report</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="inner-box">
                                                        <th scope="row">
                                                            <div class="event-date">
                                                                <span>16</span>
                                                                <p>Novembar</p>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div class="event-img">
                                                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="event-wrap">
                                                                <h3><a href="#">Toni Duggan</a></h3>
                                                                <div class="meta">
                                                                    <div class="organizers">
                                                                        <a href="#">Aslan Lingker</a>
                                                                    </div>
                                                                    <div class="categories">
                                                                        <a href="#">Inspire</a>
                                                                    </div>
                                                                    <div class="time">
                                                                        <span>05:35 AM - 08:00 AM 2h
                                                                            25'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="r-no">
                                                                <span>Room B3</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="primary-btn">
                                                                <a class="btn btn-primary" href="#">Read
                                                                    More</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="inner-box">
                                                        <th scope="row">
                                                            <div class="event-date">
                                                                <span>16</span>
                                                                <p>Novembar</p>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div class="event-img">
                                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="event-wrap">
                                                                <h3><a href="#">Harman Kardon</a></h3>
                                                                <div class="meta">
                                                                    <div class="organizers">
                                                                        <a href="#">Aslan Lingker</a>
                                                                    </div>
                                                                    <div class="categories">
                                                                        <a href="#">Inspire</a>
                                                                    </div>
                                                                    <div class="time">
                                                                        <span>05:35 AM - 08:00 AM 2h
                                                                            25'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="r-no">
                                                                <span>Room B3</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="primary-btn">
                                                                <a class="btn btn-primary" href="#">Read
                                                                    More</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="inner-box border-bottom-0">
                                                        <th scope="row">
                                                            <div class="event-date">
                                                                <span>16</span>
                                                                <p>Novembar</p>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div class="event-img">
                                                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="event-wrap">
                                                                <h3><a href="#">Billal Hossain</a></h3>
                                                                <div class="meta">
                                                                    <div class="organizers">
                                                                        <a href="#">Aslan Lingker</a>
                                                                    </div>
                                                                    <div class="categories">
                                                                        <a href="#">Inspire</a>
                                                                    </div>
                                                                    <div class="time">
                                                                        <span>05:35 AM - 08:00 AM 2h
                                                                            25'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="r-no">
                                                                <span>Room B3</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="primary-btn">
                                                                <a class="btn btn-primary" href="#">Read
                                                                    More</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="monday" role="tabpanel" aria-labelledby="monday-tab">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Doctor</th>
                                                        <th scope="col">Session</th>
                                                        <th scope="col">Venue</th>
                                                        <th scope="col">Report</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="inner-box">
                                                        <th scope="row">
                                                            <div class="event-date">
                                                                <span>16</span>
                                                                <p>Novembar</p>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div class="event-img">
                                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="event-wrap">
                                                                <h3><a href="#">Harman Kardon</a></h3>
                                                                <div class="meta">
                                                                    <div class="organizers">
                                                                        <a href="#">Aslan Lingker</a>
                                                                    </div>
                                                                    <div class="categories">
                                                                        <a href="#">Inspire</a>
                                                                    </div>
                                                                    <div class="time">
                                                                        <span>05:35 AM - 08:00 AM 2h
                                                                            25'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="r-no">
                                                                <span>Room B3</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="primary-btn">
                                                                <a class="btn btn-primary" href="#">Read
                                                                    More</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="inner-box">
                                                        <th scope="row">
                                                            <div class="event-date">
                                                                <span>18</span>
                                                                <p>Novembar</p>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div class="event-img">
                                                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="event-wrap">
                                                                <h3><a href="#">Toni Duggan</a></h3>
                                                                <div class="meta">
                                                                    <div class="organizers">
                                                                        <a href="#">Aslan Lingker</a>
                                                                    </div>
                                                                    <div class="categories">
                                                                        <a href="#">Inspire</a>
                                                                    </div>
                                                                    <div class="time">
                                                                        <span>05:35 AM - 08:00 AM 2h
                                                                            25'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="r-no">
                                                                <span>Room B3</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="primary-btn">
                                                                <a class="btn btn-primary" href="#">Read
                                                                    More</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="inner-box border-bottom-0">
                                                        <th scope="row">
                                                            <div class="event-date">
                                                                <span>20</span>
                                                                <p>Novembar</p>
                                                            </div>
                                                        </th>
                                                        <td>
                                                            <div class="event-img">
                                                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="event-wrap">
                                                                <h3><a href="#">Billal Hossain</a></h3>
                                                                <div class="meta">
                                                                    <div class="organizers">
                                                                        <a href="#">Aslan Lingker</a>
                                                                    </div>
                                                                    <div class="categories">
                                                                        <a href="#">Inspire</a>
                                                                    </div>
                                                                    <div class="time">
                                                                        <span>05:35 AM - 08:00 AM 2h
                                                                            25'</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="r-no">
                                                                <span>Room B3</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="primary-btn">
                                                                <a class="btn btn-primary" href="#">Read
                                                                    More</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                           
                        </div>
                    
                    </div>
                </div>
            </div> -->
                            <!--tab3-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div><?php include "footer.php" ?><script src="../assets/js/jquery-3.5.1.min.js"></script>
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
        <script src="../assets/vendor/wow/wow.min.js"></script>
        <script src="../assets/js/google-maps.js"></script>
        <script src="../assets/js/theme.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap">
        </script>
    </body>

    </html>
<?php
} else {
    if (headers_sent()) {
        die('<script type="text/javascript">window.location.href="login.php?e=1"</script>');
    } else {
        header("location:login.php?e=1");
        die();
    }
}


?>