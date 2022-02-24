<?php
include "connect.php";
if (isset($_POST['submit'])) {
    $pid = $_POST["id"];

    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $sql = "UPDATE patient SET  P_email = '$email' , P_phone='$phone' WHERE P_id='$pid' ";
    $res = mysqli_query($con, $sql);


    if ($res) {

        if (headers_sent()) {
            die('<script type="text/javascript">window.location.href="user-profile.php?e=1"</script>');
        } else {
            header("location:user-profile.php?e=1");
            die();
        }
    } else {
?>
        <script>
            alert("error occuered");
        </script>
<?php
    }
}
?>