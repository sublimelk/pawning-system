<?php

class Customer {

    public $name;
    public $address;
    public $id_num;
    public $phone;
    public $value;

    public function setCustomer($name, $address, $id_num, $phone, $value) {
        $this->name = $name;
        $this->username = $address;
        $this->password = $id_num;
        $this->password = $phone;
        $this->password = $value;
    }

    public function getCustomers() {
        $db = new DB();

        $sql = "SELECT * FROM customer ";

        $result = $db->readQuery($sql);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {

            $cus = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'nic' => $row['nic'],
                'address' => $row['address'],
                'phone' => $row['phone'],
                'feedback' => $row['feedback'],
            );

            array_push($array_res, $cus);
        }
        return $array_res;
    }

    public function getCustomersById($id) {
        $query = "SELECT * FROM `customer` WHERE `id` = '$id' LIMIT 1";

        $db = new DB();
        $result = $db->readQuery($query);

        $row = mysql_fetch_assoc($result);

        return $row;
    }

    public function addCustomer() {

        $db = new DB();

        $sql = "INSERT INTO `customer` (`name`,`id_num`,`address`,`phone`,`value`) VALUES ('" . $_POST['name'] . "','" . $_POST['id_num'] . "','" . $_POST['address'] . "','" . $_POST['phone'] . "','" . $_POST['value'] . "')";

        $result = $db->readQuery($sql);

        return $result;
    }

    public function editCustomer($id) {
        $db = new DB();

        $sql = "UPDATE `customer` SET `name` = '" . $_POST['name'] . "', `id_num` = '" . $_POST['id_num'] . "', `address` = '" . $_POST['address'] . "' , `phone` = '" . $_POST['phone'] . "' , `value` = '" . $_POST['value'] . "' WHERE id = $id ";

        $result = $db->readQuery($sql);

        return $result;
    }

    public function deleteCustomer($id) {

        $sql = "DELETE FROM `customer` WHERE `id` = $id ";

        return $result;
    }

}
