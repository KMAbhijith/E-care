<?php
include('connect.php');
$dept = $_POST['deptspec'];
$sql = "select * from doctor d,profileimages i,specializations s,department de where d.Dept_id=$dept and d.Log_id=i.Log_id and i.Utype_id=2 and s.Dept_id=$dept and de.Dept_id=$dept and d.D_specialization_id=s.D_specialization_id";
$query = $con->query($sql);
if (mysqli_num_rows($query) < 1) {
    echo 'nothing found';
}
while ($res = $query->fetch_assoc()) {
    echo "<div class='col-6'><table class='table table-striped' style='padding:10px;border:0.5px solid lightgrey;border-radius:5px;'><tr><th colspan='2'><img src='../../uploadedimg/" . $res['Pro_pics'] . "' class='card-img-top' height=200px/></th></tr><tr><td colspan='2'>Dr. " . $res['D_name'] . "</td></tr><tr><td colspan='2'> " . $res['D_specializations'] . "</td></tr><tr><td colspan='2'>" . $res['Dept_name'] . " Department</td></tr><tr><th colspan='2'><a class='btn btn-primary col' href='bookslots.php?id=" . $res['D_id'] . "'>Book  Slot</a></th></tr></table></div>";
}
