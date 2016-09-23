<?php

class Carat {

    public function addCarat() {

        $db = new DB();

        $sql = "INSERT INTO `carat` (`size`,`price`) VALUES ('" . $_POST['size'] . "','" . $_POST['price'] . "') ";

        $result = $db->readQuery($sql);

        return $result;
    }

    public function getAll() {

        $db = new DB();

        $sql = "SELECT * FROM `carat`";

        $result = $db->readQuery($sql);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            $carat = array(
                'id' => $row['id'],
                'size' => $row['size'],
                'price' => $row['price']
            );

            array_push($array_res, $carat);
        }

        return $array_res;
    }

    public function editCarat($price, $carat, $id) {

        $db = new DB();

        $sql = "UPDATE `carat` SET `price` = '" . $price . "',   `size` = '" . $carat . "' WHERE `id` = '" . $id . "' ";

        $result = $db->readQuery($sql);

        return $result;
    }
    
    public function deleteCarat($id){
        
        $db = new DB();
        
        $sql = "DELETE FROM `carat` WHERE `id`= '" . $id . "' ";
        
        $result = $db->readQuery($sql);

        return $result;

    }

}
