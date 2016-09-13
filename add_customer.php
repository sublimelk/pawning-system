<?php
include './includes.php';
include './navigation.php';

if (isset($_POST['save'])) {
    Customer::addCustomer($_POST);

    $customerId = mysql_insert_id();

    Customer::setPhoto($customerId, $_FILES);
}
?>

<form method="post"  enctype="multipart/form-data">
    <label>Name :</label>
    <input type="text" name="name" placeholder="Name"/> <br> 
    <label>Photo :</label> 
    <input type="file" name="fileToUpload" id="fileToUpload"><br> 
    <label>NIC Number :</label>
    <input type="text" name="nic" placeholder="ID"/> <br>
    <label>Address :</label>
    <input type="text" name="address" placeholder="Address"/> <br>
    <label>Phone :</label>
    <input type="text" name="phone" placeholder="phone"/> <br>
    <label>Feedback :</label>
    <input type="text" name="feedback" placeholder="fedback"/> <br>

    <input type="submit" name="save" value="Submit"/>


</form>

