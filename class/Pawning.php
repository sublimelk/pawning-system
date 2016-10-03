<?php

class Pawning {

    public function addPawning() {

        $db = new DB();

        $sql = "INSERT INTO `pawning` (`date`,`customer`,`item_type`,`car_size`,`weight`,`interest`,`amount`) VALUES ('" . $_POST['date'] . "','" . $_POST['customer'] . "','" . $_POST['item_type'] . "','" . $_POST['car_size'] . "','" . $_POST['weight'] . "','" . $_POST['interest'] . "','" . $_POST['amount'] . "')";

        $result = $db->readQuery($sql);

        return $result;
    }

    public function getPawning() {

        $db = new DB();

        $sql = "SELECT * FROM `pawning` WHERE `isRelease` IS NULL ";

        $result = $db->readQuery($sql);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            $pawning = array(
                'id' => $row['id'],
                'date' => $row['date'],
                'customer' => $row['customer'],
                'item_type' => $row['item_type'],
                'car_size' => $row['car_size'],
                'weight' => $row['weight'],
                'interest' => $row['interest'],
                'amount' => $row['amount'],
            );

            array_push($array_res, $pawning);
        }
        return $array_res;
    }

    public function getReleasedPawning() {

        $db = new DB();

        $sql = "SELECT * FROM `pawning` WHERE `isRelease` = 1 ";

        $result = $db->readQuery($sql);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            $pawning = array(
                'id' => $row['id'],
                'date' => $row['date'],
                'customer' => $row['customer'],
                'item_type' => $row['item_type'],
                'car_size' => $row['car_size'],
                'weight' => $row['weight'],
                'interest' => $row['interest'],
                'amount' => $row['amount'],
            );

            array_push($array_res, $pawning);
        }
        return $array_res;
    }

    public function editPawning($id) {
        $db = new DB();

        $sql = "UPDATE `pawning` SET `date` = '" . $_POST['date'] . "', `customer` = '".$_POST['customer']."' , `item_type` = '" . $_POST['item_type'] . "', `car_size` = '" . $_POST['car_size'] . "' , `weight` = '" . $_POST['weight'] . "' , `interest` = '" . $_POST['interest'] . "' , `amount` = '" . $_POST['amount'] . "' WHERE id = $id ";

        $result = $db->readQuery($sql);

        return $result;
    }

    public function getPawningById($id) {

        $db = new DB();

        $query = "SELECT * FROM `pawning` WHERE `id` = '" . $id . "' LIMIT 1";
        
        $result = $db->readQuery($query);
        
        $row = mysql_fetch_assoc($result);

        return $row;
    }

    public function getPawningByCustomerID($id) {

        $db = new DB();

        $query = "SELECT * FROM `pawning` WHERE `customer` = '" . $id . "' AND `isRelease` IS NULL ";

        $result = $db->readQuery($query);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            $pawning = array(
                'id' => $row['id'],
                'date' => $row['date'],
                'customer' => $row['customer'],
                'item_type' => $row['item_type'],
                'car_size' => $row['car_size'],
                'weight' => $row['weight'],
                'interest' => $row['interest'],
                'amount' => $row['amount'],
            );

            array_push($array_res, $pawning);
        }
        return $array_res;
    }
    
    public function getReleasedPawningByCusID($id) {

        $db = new DB();

        $query = "SELECT * FROM `pawning` WHERE `customer` = '" . $id . "' AND `isRelease` = 1 ";

        $result = $db->readQuery($query);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            $pawning = array(
                'id' => $row['id'],
                'date' => $row['date'],
                'customer' => $row['customer'],
                'item_type' => $row['item_type'],
                'car_size' => $row['car_size'],
                'weight' => $row['weight'],
                'interest' => $row['interest'],
                'amount' => $row['amount'],
            );

            array_push($array_res, $pawning);
        }
        return $array_res;
    }

    public function isReleasing($id) {
        $db = new DB();

        $sql = "UPDATE `pawning` SET `isRelease` = '1' WHERE `id` = $id ";

        $result = $db->readQuery($sql);

        return $result;
    }

    
}
