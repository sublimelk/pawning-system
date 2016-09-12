<?php
include './includes.php';
$id = $_GET['id'];
$detail = SystemData::getPawningById($id);

if(isset($_POST['save'])){
    SystemData::editPawning($id);
}
?>

<form method="post">
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
            <option value=""><?php echo $detail['item_type']; ?></option>
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
            <option value=""><?php echo $detail['car_size']; ?></option>
            <?php
            foreach (SystemData::getCaratSize() as $key => $size) {
                ?>

                <option value="<?php echo $key; ?>"> <?php echo $size; ?></option>
                <?php
            }
            ?>
        </select> <br>
        <label>Weight(g) :</label>
        <input type="text" name="weight" placeholder="weight(g)" value="<?php echo $detail['weight']; ?>"/> <br>
        <input type="submit" name="save" value="Update"/>
</form>

