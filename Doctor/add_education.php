<?php

include 'connect.php';

if (isset($_POST['username'])) {
    $dept = $_POST['username'];

    $query = "select * from doctoreducation where 	D_edu_qualification='$dept'";

    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_array($result);



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
    $dept = $_POST['qa'];
    $did = $_POST['did'];
    $sql = "SELECT * FROM doctoreducation WHERE D_edu_qualification='$dept'";
    $results = mysqli_query($con, $sql);

    if (mysqli_num_rows($results) > 0) {

        if (headers_sent()) {
            die('<script type="text/javascript">window.location.href="manage.php?e=1"</script>');
        } else {
            header("location:manage.php?e=1");
            die();
        }
    } else {
        $query = "INSERT INTO doctoreducation (	D_edu_qualification,D_id) VALUES ('$dept','$did')";
        if (mysqli_query($con, $query)) {

            if (headers_sent()) {
                die('<script type="text/javascript">window.location.href="manage.php?e=1"</script>');
            } else {
                header("location:manage.php?e=1");
                die();
            }
        }
        exit();
    }
}
