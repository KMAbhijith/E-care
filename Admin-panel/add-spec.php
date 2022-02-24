<?php
include "connect.php";
if (isset($_POST['submit'])) {
    $deptid = $_POST['specialize'];
    $dept = $_POST['Specializations'];

    $sql = "SELECT * FROM specializations WHERE D_specializations='$dept'";
    $results = mysqli_query($con, $sql);
    if (mysqli_num_rows($results) > 0) {

        if (headers_sent()) {
            die('<script type="text/javascript">window.location.href="manage.php#pills-spec?e=1"</script>');
        } else {
            header("location:manage.php#pills-spec?e=1");
            die();
        }
    } else {
        $query = "INSERT INTO specializations (D_specializations,Dept_id) VALUES ('$dept','$deptid')";
        if (mysqli_query($con, $query)) {

            if (headers_sent()) {
                die('<script type="text/javascript">window.location.href="manage.php#pills-spec?e=1"</script>');
            } else {
                header("location:manage.php#pills-spec?e=1");
                die();
            }
        }
        exit();
    }
}
