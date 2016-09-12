<?php

class Customer {

    public $name;
    public $address;
    public $id_num;
    public $phone;
    public $value;

    public function setCustomer($name, $address, $nic, $phone, $feedback) {
        $this->name = $name;
        $this->username = $address;
        $this->password = $nic;
        $this->password = $phone;
        $this->password = $feedback;
    }

    public function getCustomers() {
        $db = new DB();

        $sql = "SELECT * FROM customer WHERE `is_active` = '1'";

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

        $sql = "INSERT INTO `customer` (`name`,`nic`,`address`,`phone`,`feedback`) VALUES ('" . $_POST['name'] . "','" . $_POST['nic'] . "','" . $_POST['address'] . "','" . $_POST['phone'] . "','" . $_POST['feedback'] . "')";

        $result = $db->readQuery($sql);

        return $result;
    }

    public function editCustomer($id) {
        $db = new DB();

        $sql = "UPDATE `customer` SET `name` = '" . $_POST['name'] . "', `nic` = '" . $_POST['nic'] . "', `address` = '" . $_POST['address'] . "' , `phone` = '" . $_POST['phone'] . "' , `feedback` = '" . $_POST['feedback'] . "' WHERE id = $id ";

        $result = $db->readQuery($sql);

        return $result;
    }

    public function deleteCustomer($id) {
        $db = new DB();

        $sql = "UPDATE `customer` SET `is_active` = '0' WHERE `id` = $id ";
        
        $result = $db->readQuery($sql);

        return $result;
    }

}
