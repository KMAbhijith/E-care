<?php
session_start();
include "connect.php";

if($_SESSION['userid'])
{
session_destroy();
header("location:/E-care/login.php");
}
