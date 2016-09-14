<?php

include './includes.php';

if (!User::isLoginUser()) {
    header('location: login.php');
}
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dashbord</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include './navigation.php'; ?>
    </body>
</html>
