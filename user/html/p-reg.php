<?php

include("connect.php");

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $query = "select * from login where Username='$username'";

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
