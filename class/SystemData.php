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

}
