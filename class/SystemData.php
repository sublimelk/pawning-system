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

    public function getInvoiceId() {

        $db = new DB();

        $sql = "SELECT MAX(id) FROM pawning ";

        $result = $db->readQuery($sql);

        $row = mysql_fetch_assoc($result);

        $new_invoice = ++$row["MAX(id)"];

        $new_invoice_id = sprintf("%07s", $new_invoice);

        return $new_invoice_id;
    }

    public function getInterest() {

        $interest = 5;

        return $interest;
    }

    public function viewInvoiceId($id) {

        $invoice_id = sprintf("%05s", $id);

        return $invoice_id;
    }


}
