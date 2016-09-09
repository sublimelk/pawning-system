<?php
    include './includes.php';
    
    if(isset($_POST['save'])){
        User::addCustomer();
    }
?>

<form method="post">
    <label>Name :</label>
    <input type="text" name="name" placeholder="Name"/>
    <label>ID Number :</label>
    <input type="text" name="nic" placeholder="ID"/>
    <label>Address :</label>
    <input type="text" name="address" placeholder="Address"/>
    <label>Phone :</label>
    <input type="text" name="phone" placeholder="phone"/>
    <label>Value :</label>
    <input type="text" name="value" placeholder="Value"/>
    
    <input type="submit" name="save" value="Submit"/>
    
</form>

