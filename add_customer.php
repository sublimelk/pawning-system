<?php
include './includes.php';

if (isset($_POST['save'])) {
    Customer::addCustomer($_POST);
}
?>

<form method="post">
    <label>Name :</label>
    <input type="text" name="name" placeholder="Name"/> <br>
    <label>NIC Number :</label>
    <input type="text" name="nic" placeholder="ID"/> <br>
    <label>Address :</label>
    <input type="text" name="address" placeholder="Address"/> <br>
    <label>Phone :</label>
    <input type="text" name="phone" placeholder="phone"/> <br>
    <label>Feedback :</label>
    <input type="text" name="feedback" placeholder="fedback"/> <br>

    <input type="submit" name="save" value="Submit"/>

    <select>
        <option value=""> --- Please Select --- </option>
        <?php
        foreach (SystemData::getItemTypes() as $key => $type) {
             
            ?>

        <option value="<?php echo $key; ?>"> <?php echo $type; ?></option>
            <?php
        }
        ?>
    </select>
</form>

