<?php
include './includes.php';

$id = $_GET['id'];
$customer = Customer::getCustomersById($id);

if (isset($_POST['update'])) {
    
    Customer::editCustomer($id);
}
?>
<form method="post">
    <label>Name :</label>
    <input type="text" name="name" value="<?php echo $customer['name']; ?>"/> <br>
    <label>ID Number :</label>
    <input type="text" name="nic" value="<?php echo $customer['nic']; ?>"/> <br>
    <label>Address :</label>
    <input type="text" name="address" value="<?php echo $customer['address']; ?>"/> <br>
    <label>Phone :</label>
    <input type="text" name="phone" value="<?php echo $customer['phone']; ?>"/> <br>
    <label>Value :</label>
    <input type="text" name="feedback" value="<?php echo $customer['feedback']; ?>"/> <br>
    
    <input type="submit" name="update" value="Submit"/>
    
</form>

