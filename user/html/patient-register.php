<!doctype html>
<html>
<?php

include("connect.php");

?>


<head>
    <link rel="stylesheet" href="../assets/css/p-reg.css">

    <link rel=" stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <div class="container-1">
        <div class="log-container">
            <div class="log">
                <p class="h3" style="color:white; ">Sign In Here</p><br>
                <button type="button" class="btn btn-secondary col-12 "><a style="text-decoration: none ;color:white;" href="login.php">Sign In</a> </button>
            </div>
        </div>
        <div class="reg ">

            <center>
                <h3 style="color:  rgb(67, 69, 73);">Patient Register</h3>
            </center><br>

            <form class=" row g-3 was-validated container" method="POST" oninput='password1.setCustomValidity(password1.value != password.value ? "Passwords do not match." : "")' action="patient-register.php">

                <div class="col-12 input-group ">
                    <div class="input-group has-validation">
                        <span class="input-group-text spw" id="inputGroup-sizing-default">Name</span>
                        <input type="text" class="form-control" id="name" name="name" onfocus="focuschange()" aria-describedby="inputGroupPrepend" pattern="[A-Za-z]{3,16}" required />
                        <div class="invalid-feedback">
                            Please choose a Name.
                        </div>
                    </div>
                </div>

                <div class="col  input-group ">
                    <div class="input-group has-validation">
                        <span class="input-group-text spw" id="inputGroup-sizing-default">Blood group</span>
                        <select class='form-control' id="bp" onselect="focuschange()" name="bp" required>
                            <option selected disabled value="">Select </option>
                            <?php
                            $qr =  mysqli_query($con, "select * from bloodgroup");
                            while ($r =  mysqli_fetch_array($qr)) {
                            ?>
                                <option value="<?php echo $r['BL_id']; ?>"><?php echo $r['BL_group']; ?></option>
                            <?php

                            }
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            Please choose your blood group.
                        </div>
                    </div>
                </div>



                <div class="col  input-group ">
                    <div class="input-group has-validation">
                        <span class="input-group-text spw" id="inputGroup-sizing-default">Date of birth</span>
                        <input type="date" class="form-control" id="dob" name="dob" onfocus="focuschange()" onclick="validated()" min='1899-01-01' aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required />
                        <div class="invalid-feedback">
                            Please choose a Date.
                        </div>
                    </div>
                </div>

                <div class="col-6  radiobtn">
                    <span class="input-group-text spw-radio " id="inputGroup-sizing-default">
                        Gender&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" required>
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input " type="radio" name="gender" id="inlineRadio2" value="Female" required>
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                        <div class="invalid-feedback">
                            Please choose a gender
                        </div>
                    </span>
                </div>



                <div class="col-12 input-group">
                    <div class="input-group has-validation">
                        <span class="input-group-text  spw">Addresss</span>
                        <textarea class="form-control" id="address" name="address" onfocus="focuschange()" aria-label="With textarea" pattern="[A-Za-z]{3-22}" required></textarea>
                        <div class="invalid-feedback">
                            Please enter Valid Address.
                        </div>
                    </div>
                </div>

                <div class="col input-group ">
                    <div class="input-group has-validation">
                        <span class="input-group-text " id="inputGroup-sizing-default">Phone</span>
                        <input type="text" class="form-control" id="phone" name="phone" onfocus="focuschange()" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" pattern="[0-9]{10}" required />
                        <div class="invalid-feedback">
                            Please enter Valid Phone no.
                        </div>
                    </div>
                </div>

                <div class="col input-group ">
                    <div class="input-group has-validation">
                        <span class="input-group-text " id="inputGroup-sizing-default">Email</span>
                        <input type="email" class="form-control" id="email" name="email" onfocus="focuschange()" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required />
                        <div class="invalid-feedback">
                            Please enter Valid Email id.
                        </div>
                    </div>
                </div>

                <br>

                <div class="col-12 input-group ">
                    <div class="input-group has-validation">
                        <span class="input-group-text spw"> Username</span>
                        <input type="text" class="form-control" id="username" name="username" onfocus="focuschange()" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" pattern="[A-Za-z0-9]{8}" required />
                        <div class="invalid-feedback">
                            Please enter 8 alphanumeric charcters for Username.
                        </div>
                    </div>
                    <div id="uname_response"></div>
                </div>

                <div class="col-md input-group ">
                    <div class="input-group has-validation">
                        <span class="input-group-text " id="inputGroup-sizing-default">Password</span>
                        <input type="password" id="pass" class="form-control" name="password" onfocus="focuschange()" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" minlength="8" maxlength="16" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" required />
                        <span class="input-group-text " id="inputGroup-sizing-default"><i class="bi bi-eye" id="togglePassword" onclick="myFunction()"></i></span>
                        <div class="invalid-feedback">
                            Must contain at least one number and one uppercase and lowercase letter, and
                            more characters 8 to 16.
                        </div>
                    </div>
                </div>

                <div class="col-md input-group ">
                    <div class="input-group has-validation">
                        <span class="input-group-text spw" id="inputGroup-sizing-default">Confirm
                            Password</span>
                        <input type="password" id="pass1" class="form-control" name="password1" onfocus="focuschange()" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" minlength="8" maxlength="16" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" required /> <span class="input-group-text " id="inputGroup-sizing-default"><i class="bi bi-eye" id="togglePassword" onclick="myFunction1()"></i></span>
                        <div class="invalid-feedback">
                            password dosn't match
                        </div>
                    </div>

                </div>
                <button type="submit" class="col-lg-12 btn btn-secondary  col-12" name="Click">Register</button>
            </form>
        </div>
    </div>
    <!--<script src="../assets/js/username.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        dob.max = new Date().toISOString().split("T")[0];



        /*   function focuschange() {

            if (!document.getElementById("name").checkValidity()) {
                document.getElementById("name").focus();
            } else if (!document.getElementById("bp").checkValidity()) {
                document.getElementById("bp").focus();
            } else if (!document.getElementById("dob").checkValidity()) {
                document.getElementById("dob").focus();
            } else if (!document.getElementById("address").checkValidity()) {
                document.getElementById("address").focus();
            } else if (!document.getElementById("phone").checkValidity()) {
                document.getElementById("phone").focus();
            } else if (!document.getElementById("email").checkValidity()) {
                document.getElementById("email").focus();
            } else if (!document.getElementById("username").checkValidity()) {
                document.getElementById("username").focus();
            } else if (!document.getElementById("pass").checkValidity()) {
                document.getElementById("pass").focus();
            } else {
                document.getElementById("pass1").focus();
            }
        }
*/
        $(document).ready(function() {

            $("#username").keyup(function() {

                var username = $(this).val().trim();

                if (username != '' && this.checkValidity() == true) {


                    $.ajax({
                        url: 'p-reg.php',
                        type: 'post',
                        data: {
                            username: username
                        },
                        success: function(response) {

                            $('#uname_response').html(response);

                        }
                    });
                } else {
                    $("#uname_response").html("");
                }

            });

        });

        function myFunction() {
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function myFunction1() {
            var x = document.getElementById("pass1");
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


if (isset($_POST["Click"])) {
    $name = $_POST["name"];
    $gen = $_POST["gender"];
    $blood = $_POST["bp"];
    $address = $_POST["address"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $uname = $_POST["username"];
    $pass = $_POST["password"];

    $sql2 = "select * from login where Username='$uname' ";
    $result = mysqli_query($con, $sql2);
    $count = mysqli_num_rows($result);

    if ($count > 0) {

?>
        <script>
            alert("username alredy in use");
        </script>
        <?php
    } else {
        $sql3 = "select * from usertype where Usertype='user' ";
        $result3 = mysqli_query($con, $sql3);
        $row3 = mysqli_fetch_assoc($result3);

        $sql = "insert into login(Username,Password,Utype_id,Status)values('$uname',md5('$pass'),'$row3[Utype_id]',true)";
        if (mysqli_query($con, $sql)) {

            $result1 = mysqli_query($con, "select * from login where Username='$uname'");
            $row = mysqli_fetch_assoc($result1);
            $sql1 = "insert into patient(Log_id,P_name,P_address,P_gender,P_dob,P_email,P_phone,BL_id)values('$row[Log_id]','$name','$address','$gen','$dob','$email','$phone','$blood')";
            if (mysqli_query($con, $sql1)) {
                if (headers_sent()) {
                    die('<script type="text/javascript">window.location.href="/E-care/login.php?e=1"</script>');
                } else {
                    header("location:/E-care/login.php?e=1");
                    die();
                }
            }
        } else {
        ?>

            <script>
                alert("error");
            </script>
<?php
        }
    }
}
mysqli_close($con);

?>