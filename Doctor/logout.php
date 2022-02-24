<?php
session_start();
include "connect.php";

if ($_SESSION['doctor']) {
    session_destroy();
    header("location:../login.php");
}
