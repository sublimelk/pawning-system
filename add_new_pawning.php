<?php

include './includes.php';
?>
    <label>Customer Name :</label>
    <select>
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
    <select>
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
    <select>
        <option value=""> --- Please Select --- </option>
        <?php
        foreach (SystemData::getCaratSize() as $key => $type) {
            ?>

            <option value="<?php echo $key; ?>"> <?php echo $type; ?></option>
            <?php
        }
        ?>
    </select> <br>
    <label>Weight(g) :</label>
    <input type="text" name="weight" placeholder="weight(g)"/> <br>
    <input type="submit" name="save" value="Add"/>
    

