<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!$_SESSION['login']) {
    header('location: login.php');
}

date_default_timezone_set("Asia/Calcutta");
 
include './class/DB.php';
include './class/User.php';
include './class/Customer.php';
include './class/SystemData.php';
include '/class/Pawning.php';
include './class/ImageResizer.php';
include './class/Releasing.php';
include './class/Report.php';
include './class/Carat.php';
 