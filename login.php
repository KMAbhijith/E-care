<?php

session_start();
include("connect.php");

if (isset($_SESSION['userid'])) {
    unset($_SESSION['userid']);
    session_destroy();
    if (headers_sent()) {
        die('<script type="text/javascript">window.location.href="E-care/login.php?e=1"</script>');
    } else {
        header("location:E-care/login.php?e=1");
        die();
    }
} else {
?>
    <html>
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .h-custom {
            height: calc(100% - 73px);
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <head></head>

    <body>
        <section class="vh-100">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5"><img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Sample image"></div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form action="login.php" method="POST">
                            <h3>Login</h3>
                            <div class="divider d-flex align-items-center my-4">
                                <p class="text-center fw-bold mx-3 mb-0"></p>
                            </div>

                            <div class="form-outline mb-4"><input type="text" id="form3Example3" class="form-control form-control-lg" name="Username" value="" placeholder="Enter Username" required /><label class="form-label" for="form3Example3">Username</label></div>

                            <div class="form-outline mb-3"><input type="password" id="password" class="form-control form-control-lg" name="Password" value="" placeholder="Enter password" required /><i class="bi bi-eye" id="togglePassword" onclick="myFunction()"></i><label class="form-label" for="form3Example4">Password</label></div>
                            <div class="d-flex justify-content-between align-items-center">

                                <div class="form-check mb-0"><input class="form-check-input me-2" type="checkbox" name="remember" id="remember" /><label class="form-check-label" for="form2Example3">Remember me
                                    </label></div>
                                <a href="#!" class="text-body">Forgot password?</a>
                            </div>
                            <div class="text-center text-lg-start mt-4 pt-2"><button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" name="submit">Login</button>
                                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="User/html/patient-register.php" class="link-danger">Register</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>



        <script>
            function myFunction() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>

    </body>

    </html>


    <?php
    if (isset($_POST["submit"])) {

        $uname = $_POST["Username"];
        $pass = $_POST["Password"];
        $sql = "select * from login where Username='$uname' && Password=md5('$pass')";
        $result = mysqli_query($con, $sql);
        $re = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);

        if ($count > 0) {


            if ($re['Utype_id'] == 1) {
                $_SESSION['admin'] = $re['Log_id'];
                header("location:Admin-panel/index.php");
            } else if ($re['Utype_id'] == 2) {
                $_SESSION['doctor'] = $re['Log_id'];
                header("location:Doctor/docprofile.php");
            } else if ($re['Utype_id'] == 3) {
                $_SESSION['userid'] = $re['Log_id'];
                header("location:User/html/user-profile.php");
            } else {
                header("location:login.php");
            }
        } else {
    ?>
            <script>
                alert("Invalid username or password");
            </script>
<?php

        }

        mysqli_close($con);
    }
}
?>