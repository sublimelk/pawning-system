<?php
include './includes.php';

$id = $_GET['id'];
$customer = Customer::getCustomers();

if (isset($_POST['update'])) {
    
    Customer::editCustomer($id);
}
?>
<form method="post">
    <label>Name :</label>
    <input type="text" name="name" value="<?php echo $customer['name']; ?>"/> <br>
    <label>ID Number :</label>
    <input type="text" name="id_num" value="<?php echo $customer['id_num']; ?>"/> <br>
    <label>Address :</label>
    <input type="text" name="address" value="<?php echo $customer['address']; ?>"/> <br>
    <label>Phone :</label>
    <input type="text" name="phone" value="<?php echo $customer['phone']; ?>"/> <br>
    <label>Value :</label>
    <input type="text" name="value" value="<?php echo $customer['value']; ?>"/> <br>
    
    <input type="submit" name="update" value="Submit"/>
    
</form>

