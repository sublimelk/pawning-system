<?php

class Payment {

    public function addPayment() {
        $db = new DB();

        $sql = "INSERT INTO `payment` (`pawning`,`date`,`interest`,`payment`) VALUES ('" . $_POST['pawning'] . "' , '" . $_POST['date'] . "' , '" . $_POST['interest'] . "' , '" . $_POST['payment'] . "')";

        $result = $db->readQuery($sql);

        return $result;
    }

    public function getPayement() {
        $db = new DB();

        $sql = "SELECT * FROM `payment` ";

        $result = $db->readQuery($sql);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            $payment = array(
                'id' => $row['id'],
                'pawning' => $row['pawning'],
                'date' => $row['date'],
                'interest' => $row['interest'],
                'payment' => $row['payment']
            );

            array_push($array_res, $payment);
        }

        return $array_res;
    }

    public function getPaymentByPawning($id) {

        $db = new DB();

        $sql = "SELECT * FROM `payment` WHERE `pawning` = '" . $id . "' ";

        $result = $db->readQuery($sql);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {
            $payments = array(
                'id' => $row['id'],
                'pawning' => $row['pawning'],
                'date' => $row['date'],
                'interest' => $row['interest'],
                'payment' => $row['payment']
            );

            array_push($array_res, $payments);
        }
        
        return $array_res;
    }

}
