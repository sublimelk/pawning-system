<?php

include './includes.php';

$id = $_GET['id'];

Carat::deleteCarat($id);

header('location: manage_carat.php?message=successfully delete Carat');

