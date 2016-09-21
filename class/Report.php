<?php

class Report {

    public function getPawningReport($data) {
        
        $db = new DB();
        $sql = "SELECT p.id, p.date, p.amount, c.name, c.nic FROM customer c, pawning p WHERE  p.customer = c.id ";
        
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
                'nic' => $row['nic']
            );

            array_push($array_res, $releas);
        }


        return $array_res;
    }
    
    public function getReleaseReport($data){
        
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

}
