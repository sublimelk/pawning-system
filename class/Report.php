<?php

class Report {

    public function getPawningReport($data) {

        $db = new DB();
        $sql = "SELECT p.id, p.date, p.amount, p.isRelease, c.name, c.nic FROM customer c, pawning p WHERE  p.customer = c.id ";

        if ($data["nic"]) {
            $sql .= ' AND c.nic = "' . $data["nic"] . '"';
        }
        if ($data["invoice"]) {
            $sql .= ' AND p.id = "' . $data["invoice"] . '"';
        }
        if ($data["day_from"] && !$data["day_to"]) {

            $date1 = strtotime($data["day_from"] . '00:00:00') - 1;

            $date2 = strtotime($data["day_from"] . '24:00:00');

            $sql .= ' AND UNIX_TIMESTAMP(p.date) BETWEEN "' . $date1 . '" AND "' . $date2 . '"  ';
        }
        if ($data["day_from"] && $data["day_to"]) {

            $date1 = strtotime($data["day_from"] . '00:00:00');

            $date2 = strtotime($data["day_to"] . '24:00:00');

            $sql .= ' AND UNIX_TIMESTAMP(p.date)  BETWEEN "' . $date1 . '" AND "' . $date2 . '"  ';
        }

        $result = $db->readQuery($sql);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {

            $releas = array(
                'id' => $row['id'],
                'date' => $row['date'],
                'amount' => $row['amount'],
                'name' => $row['name'],
                'nic' => $row['nic'],
                'isRelease' => $row['isRelease'],
            );

            array_push($array_res, $releas);
        }


        return $array_res;
    }
    

    public function getReleaseReport($data) {

        $db = new DB();

        $sql = "SELECT p.id, r.date, r.settle_amount, c.name, c.nic FROM customer c, pawning p, releasing r WHERE r.pawning = p.id AND p.customer = c.id";

        if ($data["nic"]) {
            $sql .= ' AND c.nic = "' . $data["nic"] . '"';
        }

        if ($data["invoice"]) {
            $sql .= ' AND p.id = "' . $data["invoice"] . '"';
        }

        if ($data["day_from"] && !$data["day_to"]) {

            $date1 = strtotime($data["day_from"] . '00:00:00') - 1;

            $date2 = strtotime($data["day_from"] . '24:00:00');

            $sql .= ' AND UNIX_TIMESTAMP(r.date) BETWEEN "' . $date1 . '" AND "' . $date2 . '"  ';
        }
        if ($data["day_from"] && $data["day_to"]) {

            $date1 = strtotime($data["day_from"] . '00:00:00');

            $date2 = strtotime($data["day_to"] . '24:00:00');

            $sql .= ' AND UNIX_TIMESTAMP(r.date)  BETWEEN "' . $date1 . '" AND "' . $date2 . '"  ';
        }

        $result = $db->readQuery($sql);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {

            $release = array(
                'id' => $row['id'],
                'date' => $row['date'],
                'settle_amount' => $row['settle_amount'],
                'name' => $row['name'],
                'nic' => $row['nic']
            );

            array_push($array_res, $release);
        }
        return $array_res;
    }
    

    public function getPawningItems($data) {

        $db = new DB();

        $sql = "SELECT * FROM `pawning` WHERE ";

        $and = '';

        if ($data["day_from"] && !$data["day_to"]) {

            $date1 = strtotime($data["day_from"] . '00:00:00') - 1;

            $date2 = strtotime($data["day_from"] . '24:00:00');

            $sql .= '  UNIX_TIMESTAMP(date) BETWEEN "' . $date1 . '" AND "' . $date2 . '"  ';

            $and = ' AND ';
        }

        if ($data["day_from"] && $data["day_to"]) {

            $date1 = strtotime($data["day_from"] . '00:00:00');

            $date2 = strtotime($data["day_to"] . '24:00:00');

            $sql .= ' UNIX_TIMESTAMP(date)  BETWEEN "' . $date1 . '" AND "' . $date2 . '"  ';

            $and = ' AND ';
        }

        if ($_POST['isRelease']) {

            if ($_POST['isRelease'] == "1") {

                $sql .=  $and . ' `isRelease`   =  "' . $_POST['isRelease'] . '"  ';
            } else {

                $sql .=  $and . ' `isRelease`  IS NULL';
            }
        }

     
        $result = $db->readQuery($sql);

        $array_res = array();

        while ($row = mysql_fetch_array($result)) {

            $pawning = array(
                'id' => $row['id'],
                'date' => $row['date'],
                'item_type' => $row['item_type'],
                'car_size' => $row['car_size'],
                'weight' => $row['weight'],
                'amount' => $row['amount'],
                'isRelease' => $row['isRelease']
            );

            array_push($array_res, $pawning);
        }
        return $array_res;
    }
    
    public function getCurrentItems($data){
                        
        $db = new DB();
        
        $sql = "SELECT p.id, p.date, p.item_type, p.car_size, p.weight, p.amount, c.name, c.nic FROM pawning p, customer c WHERE p.customer = c.id AND p.isRelease IS NULL ";
        
        if($data['item_type']){
           $sql .= ' AND p.item_type = "' . $data["item_type"] . '"';
        }
        
        if($data['car_size']){
           $sql .= ' AND p.car_size = "' . $data["car_size"] . '"';
        }
        
        $result = $db->readQuery($sql);
        
        $array_res = array();
        
        while ($row = mysql_fetch_array($result)){
            $details = array(
                'id' => $row['id'],
                'date' => $row['date'],
                'item_type' => $row['item_type'],
                'car_size' => $row['car_size'],
                'weight' => $row['weight'],
                'amount' => $row['amount'],
                'name' => $row['name'],
                'nic' => $row['nic'],
            );
            
            array_push($array_res, $details);
        }
        return $array_res;
    }

}
