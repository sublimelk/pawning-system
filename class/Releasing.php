<?php

class Releasing {

    public function addNew() {

        $db = new DB();

        $sql = "INSERT INTO `releasing` (`date`,`pawning`,`releasing_interest`,`settle_amount`) VALUES ('" . $_POST['day_to'] . "', '" . $_POST['pawning_id'] . "', '" . $_POST['interest'] . "', '" . $_POST['setl_amount'] . "')";

        $result = $db->readQuery($sql);

        return $result;
    }

    public function getAll() {

        $db = new DB();

        $sql = "SELECT r.id 'id', c.name 'customer', p.id 'invoice', c.nic 'nic' ,r.date 'date', r.releasing_interest 'interest', r.settle_amount 'amount' FROM customer c, pawning p, releasing r WHERE p.id = r.pawning AND p.customer = c.id AND p.isRelease = '1'";
        
        $result = $db->readQuery($sql);
        
        $array_res = array();

        while ($row = mysql_fetch_array($result)) {

            $releas = array(
                'id' => $row['id'],
                'customer' => $row['customer'],
                'invoice' => $row['invoice'],
                'nic' => $row['nic'],
                'date' => $row['date'],
                'interest' => $row['interest'],
                'amount' => $row['amount'],
            );

            array_push($array_res, $releas);
        }
        return $array_res;
    }
    
    public function editreleasing($id) {
        
        $db = new DB();

        $sql = "UPDATE `releasing` SET `date` = '" . $_POST['date'] . "', `settle_amount` = '" . $_POST['amount'] . "', `releasing_interest` = '" . $_POST['interest'] . "'  WHERE id = $id ";

        $result = $db->readQuery($sql);

        return $result;
    }
    
    public function getAllById($id) {
        
        $query = "SELECT * FROM `releasing` WHERE `id` = '$id' LIMIT 1";

        $db = new DB();
        
        $result = $db->readQuery($query);

        $row = mysql_fetch_array($result);

        return $row;
    }

}
