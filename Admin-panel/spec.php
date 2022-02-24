<?php
include('connect.php');
$country = $_POST['country'];
$sql = "select * from specializations where Dept_id='$country'";
$query = $con->query($sql);
echo '<option value="">Select Specialization</option>';
while ($res = $query->fetch_assoc()) {
    echo '<option value="' . $res['D_specialization_id'] . '">' . $res['D_specializations'] . '</option>';
}
