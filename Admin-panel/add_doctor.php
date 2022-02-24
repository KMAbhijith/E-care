<?php

include 'connect.php';

if (isset($_POST['username'])) {
    $uname = $_POST['username'];

    $query = "select * from login where Username='$uname'";

    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_array($result);

        $count = $row['Username'];

        if (mysqli_num_rows($result) > 0) {
            $response = "<span style='color: red;'>Not Available.</span>";
        }
    } else {
        $response = "<span style='color: green;'>Available.</span>";
    }

    echo $response;
    die;
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $dpos = $_POST['dpost'];
    $dept = $_POST['dept'];
    $spec = $_POST['spec'];

    $filename = $_FILES["license"]["name"];
    $tempname = $_FILES["license"]["tmp_name"];
    $folder = "../uploadeddoc/" . $filename;
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $filename1 = $_FILES["pic"]["name"];
    $tempname1 = $_FILES["pic"]["tmp_name"];
    $folder1 = "../uploadedimg/" . $filename1;
    $uname = $_POST['uname'];
    $pass = $name . '7890';
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
        $sql3 = "select * from usertype where Usertype='doctor' ";
        $result3 = mysqli_query($con, $sql3);
        $row3 = mysqli_fetch_assoc($result3);

        $sql = "insert into login(Username,Password,Utype_id,Status)values('$uname',md5('$pass'),'$row3[Utype_id]',true)";
        if (mysqli_query($con, $sql)) {

            $result1 = mysqli_query($con, "select * from login where Username='$uname'");
            $row = mysqli_fetch_assoc($result1);
            $sql1 = "INSERT INTO doctor (Log_id,D_name,D_pos,Dept_id,D_specialization_id,D_license,D_phone,D_email) VALUES ('$row[Log_id]','$name','$dpos','$dept','$spec','$filename','$phone','$email')";
            if (mysqli_query($con, $sql1)) {
                move_uploaded_file($tempname, $folder);
                $sql4 = "insert into profileimages(Pro_pics,Log_id,Utype_id) values('$filename1','$row[Log_id]','$row3[Utype_id]')";
                if (mysqli_query($con, $sql4)) {
                    move_uploaded_file($tempname1, $folder1);
                    $to      = $email;
                    $subject = 'E-care';
                    $message = 'doctor  username:' . $uname . '<br>password:' . $pass;
                    $headers .= 'From: <kmabhijith1999@gmail.com>' . "\r\n";

                    mail($to, $subject, $message, $headers);
                    if (headers_sent()) {
                        die('<script type="text/javascript">window.location.href="manage.php?e=1"</script>');
                    } else {
                        header("location:manage.php?e=1");
                        die();
                    }
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