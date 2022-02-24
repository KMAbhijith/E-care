<?php
session_start();
include "connect.php";

if ($_SESSION['admin']) {
    session_destroy();
    header("location:../login.php");
}
