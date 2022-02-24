<?php
include "connect.php";
if (isset($_POST["submit"])) {
    $week = $_POST["wid"];
    $time = $_POST["tid"];
    $doc = $_POST["did"];
    $sql2 = "select * from schedule where W_id=$week and D_id=$doc  ";
    $result = mysqli_query($con, $sql2);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        $updatet = "update  schedule set T_id =$time  where W_id=$week and D_id=$doc";
        if (mysqli_query($con, $updatet)) {
            if (headers_sent()) {
                die('<script type="text/javascript">window.location.href="manage.php?e=1"</script>');
            } else {
                header("location:manage.php?e=1");
                die();
            }
        }
?>
        <?php
    } else {
        $sql = "insert into schedule(T_id,W_id,D_id)values('$time','$week','$doc')";
        if (mysqli_query($con, $sql)) {

            if (headers_sent()) {
                die('<script type="text/javascript">window.location.href="manage.php?e=1"</script>');
            } else {
                header("location:manage.php?e=1");
                die();
            }
        }
    }
}


        ?>