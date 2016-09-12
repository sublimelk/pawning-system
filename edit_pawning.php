<?php
include './includes.php';
include './navigation.php';

$id = $_GET['id'];

$detail = SystemData::getPawningById($id);

if (isset($_POST['save'])) {

    $a = SystemData::editPawning($id);
}
?>

<form method="post">
    <label>Invoice Number :</label>
    <input type="text" name="invoice" value="<?php echo $detail['cus_name']; ?>"/> <br>
    <label>Date :</label>
    <input type="text" name="date" value="<?php echo $detail['cus_name']; ?>"/> <br>
    <label>Customer Name :</label>
    <select name="cus_name">
        <option value=""><?php echo $detail['cus_name']; ?></option>
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
        <?php
        foreach (SystemData::getItemTypes() as $key => $type) {

            if ($key = $detail['item_type']) {
                ?> 
                <option value="<?php echo $key; ?>" selected=""> <?php echo $type; ?></option>
                <?php
            } else {
                ?>

                <option value="<?php echo $key; ?>"> <?php echo $type; ?></option>
                <?php
            }
        }
        ?>
    </select> <br>
    <label>Carat Size :</label>
    <select name="car_size">
        <?php
        foreach (SystemData::getCaratSize() as $key => $size) {
            
            if ($key = $detail['car_size']) {
                ?>
                <option value="<?php echo $key; ?>" selected=""> <?php echo $size; ?></option>
                <?php
            } else {
                ?>
                <option value="<?php echo $key; ?>"> <?php echo $size; ?></option>
                <?php
            }
        }
        ?>
    </select> <br>
    <label>Weight(g) :</label>
    <input type="text" name="weight" placeholder="weight(g)" value="<?php echo $detail['weight']; ?>"/> <br>
    <label>Interest :</label>
    <input type="text" name="interest" value="<?php echo $detail['weight']; ?>"/> <br>
    <label>Amount :</label>
    <input type="text" name="amount" value="<?php echo $detail['weight']; ?>"/> <br>
    <input type="submit" name="save" value="Update"/>
</form>

