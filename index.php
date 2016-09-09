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
    </head>
    <body>
        <?php ?>
    </body>
</html>
