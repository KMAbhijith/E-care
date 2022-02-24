<?php

include 'connect.php';

if (isset($_POST['username'])) {
    $dept = $_POST['username'];

    $query = "select * from department where Dept_name='$dept'";

    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_array($result);

        $count = $row['Dept_name'];

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
    $dept = $_POST['department'];

    $sql = "SELECT * FROM department WHERE Dept_name='$dept'";
    $results = mysqli_query($con, $sql);
    if (mysqli_num_rows($results) > 0) {

        if (headers_sent()) {
            die('<script type="text/javascript">window.location.href="manage.php?e=1"</script>');
        } else {
            header("location:manage.php?e=1");
            die();
        }
    } else {
        $query = "INSERT INTO department (Dept_name) VALUES ('$dept')";
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
