<?php
include('connect.php');
$dept = $_POST['deptspec'];
$sql = "select * from doctor d,specializations s where s.Dept_id='$dept' and d.Dept_id='$dept' and d.D_specialization_id=s.D_specialization_id";
$query = $con->query($sql);
echo 'nothing found';
$j = 1;
while ($res = $query->fetch_array()) {
    echo "<tr><td>" .  $j++ . "</td><td>" . $res['D_name'] . "</td><td> " . $res['D_specializations'] . "</td><td><a href='specificschdle.php?id=" . $res['D_id'] . " class='btn btn-primary'>Schedules</a></td></tr>";
}
