<?php
include './includes.php';
include './navigation.php';

$invoice = SystemData::getInvoiceId();

if(isset($_POST['save'])){ 
    
    SystemData::addPawning($_POST);
    
}
?>
<form method="post">
    <label>Invoice Number :</label>
    <input type="text" name="invoice" value="<?php echo $invoice['INVOICE']; ?>"/> <br>
    <label>Date :</label>
    <input type="text" name="date"/> <br>
    <label>Customer Name :</label>
    <select name="cus_name">
        <option value=""> --- Please Select --- </option>
        <?php
        foreach (SystemData::getCustomers() as $name) {
            ?>

            <option value="<?php echo $name['name']; ?>"> <?php echo $name['name']; ?></option>
            <?php
        }
        ?>
    </select> <br>
    <label>Item Type :</label>
    <select name="item_type">
        <option value=""> --- Please Select --- </option>
        <?php
        foreach (SystemData::getItemTypes() as $key => $type) {
            ?>

            <option value="<?php echo $key; ?>"> <?php echo $type; ?></option>
            <?php
        }
        ?>
    </select> <br>
    <label>Carat Size :</label>
    <select name="car_size">
        <option value=""> --- Please Select --- </option>
        <?php
        foreach (SystemData::getCaratSize() as $key => $size) {
            ?>

            <option value="<?php echo $key; ?>"> <?php echo $size; ?></option>
            <?php
        }
        ?>
    </select> <br>
    <label>Weight(g) :</label>
    <input type="text" name="weight" placeholder="weight(g)"/> <br>
    <label>Interest :</label>
    <input type="text" name="interest"/> <br>
    <label>Amount :</label>
    <input type="text" name="amount"/> <br>
    <input type="submit" name="save" value="Add"/>
    
</form>
