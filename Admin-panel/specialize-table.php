<?php
include('connect.php');
$dept = $_POST['deptspec'];
$sql = "select * from specializations where Dept_id='$dept'";
$query = $con->query($sql);
echo 'nothing found';
$j = 1;
while ($res = $query->fetch_assoc()) {
    echo "<tr><td>" .  $j++ . "</td><td> " . $res['D_specializations'] . "</td></tr>";
}
