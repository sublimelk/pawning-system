<?php
include './includes.php';

$id = $_GET['id'];

Customer::deleteCustomer($id);

header('location: view_customers.php?message=successfully delete Customer');