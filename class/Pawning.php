<?php

class Pawning {
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
                'date' => $row['date'],
                'cus_name' => $row['cus_name'],
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

        $sql = "UPDATE `pawning` SET `date` = '" . $_POST['date'] . "', `cus_name` = '" . $_POST['cus_name'] . "', `item_type` = '" . $_POST['item_type'] . "', `car_size` = '" . $_POST['car_size'] . "' , `weight` = '" . $_POST['weight'] . "' , `amount` = '" . $_POST['amount'] . "' WHERE id = $id ";

        $result = $db->readQuery($sql);

        return $result;
    }

    public function getPawningById($id) {

        $db = new DB();

        $query = "SELECT * FROM `pawning` WHERE `id` = '$id' LIMIT 1";

        $result = $db->readQuery($query);

        $row = mysql_fetch_assoc($result);

        return $row;
    }
}
