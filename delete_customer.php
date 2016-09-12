<?php
include './includes.php';

$id = $_GET['id'];

Customer::deleteCustomer($id);