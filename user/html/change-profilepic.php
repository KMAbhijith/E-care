<?php
if (isset($_POST["Click"])) {
    $pid = $_POST['pd'];
    $filename = $_FILES["pic"]["name"];
    $tempname = $_FILES["pic"]["tmp_name"];
    $folder = "../assets/img/" . $filename;
    $sql2 = "select * from patientpic where P_id= ";
    $result = mysqli_query($con, $sql2);
    $count = mysqli_num_rows($result);

    if ($count > 0) {

        $picupdate = "UPDATE patientpic SET PROPIC='$filename'  WHERE P_id='$pid' ";
        if (mysqli_query($con, $picupdate)) {
            move_uploaded_file($tempname, $folder);
        }
    } else {

        $sql = "insert into patientpic(PROPIC,P_id)values('$filename','$pid')";
        if (mysqli_query($con, $sql)) {
            move_uploaded_file($tempname, $folder);

            if (headers_sent()) {
                die('<script type="text/javascript">window.location.href="user-profile.php?e=1"</script>');
            } else {
                header("location:user-profile?e=1");
                die();
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