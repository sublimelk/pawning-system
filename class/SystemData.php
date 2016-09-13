<?php

class SystemData {

    public function getItemTypes() {
        $data = array(
            '1' => 'Type 01',
            '2' => 'Type 02',
            '3' => 'Type 03',
            '4' => 'Type 04'
        );

        return $data;
    }

    public function getCaratSize() {
        $size = array(
            '1' => 'Carat 18',
            '2' => 'Carat 22',
        );
        return $size;
    }

    public function getCustomers() {
        $db = new DB();

        $sql = "SELECT * FROM customer WHERE `is_active` = '1'";

        $result = $db->readQuery($sql);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {

            $cus = array(
                'name' => $row['name'],
            );

            array_push($array_res, $cus);
        }
        return $array_res;
    }

    public function addPawning() {

        $db = new DB();

        $sql = "INSERT INTO `pawning` (`date`,`cus_name`,`item_type`,`car_size`,`weight`,`interest`,`amount`) VALUES ('" . $_POST['date'] . "','" . $_POST['cus_name'] . "','" . $_POST['item_type'] . "','" . $_POST['car_size'] . "','" . $_POST['weight'] . "','" . $_POST['interest'] . "','" . $_POST['amount'] . "')";

        $result = $db->readQuery($sql);

        return $result;
    }

    public function getPawning() {

        $db = new DB();

        $sql = "SELECT * FROM `pawning` ";

        $result = $db->readQuery($sql);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            $pawning = array(
                'id' => $row['id'],
                'cus_name' => $row['cus_name'],
                'item_type' => $row['item_type'],
                'car_size' => $row['car_size'],
                'weight' => $row['weight'],
            );

            array_push($array_res, $pawning);
        }

        return $array_res;
    }

    public function getPawningById($id) {
        $query = "SELECT * FROM `pawning` WHERE `id` = '$id' LIMIT 1";

        $db = new DB();
        $result = $db->readQuery($query);

        $row = mysql_fetch_assoc($result);

        return $row;
    }

    public function editPawning($id) {
        $db = new DB();

        $sql = "UPDATE `pawning` SET `date` = '" . $_POST['date'] . "', `cus_name` = '" . $_POST['cus_name'] . "', `item_type` = '" . $_POST['item_type'] . "', `car_size` = '" . $_POST['car_size'] . "' , `weight` = '" . $_POST['weight'] . "' , `interest` = '" . $_POST['interest'] . "' , `amount` = '" . $_POST['amount'] . "' WHERE id = $id ";

        $result = $db->readQuery($sql);

        return $result;
    }

    public function getInvoiceId() {

        $db = new DB();

        $sql = "SELECT MAX(id) FROM pawning ";

        $result = $db->readQuery($sql);
        
        $row = mysql_fetch_assoc($result);
     
        return $row["MAX(id)"] ;
    }
    
    public function getInterest(){
        
        $interest = 5;
        
        return $interest;
    }

}
