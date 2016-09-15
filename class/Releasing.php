<?php

class Releasing {
    public function addNew(){
        
        $db = new DB();
        
        $sql = "INSERT INTO `releasing` (`date`,`pawning`,`releasing_interest`,`settle_amount`) VALUES ('".$_POST['date']."', '".$_POST['pawning_id']."', '".$_POST['interest']."', '".$_POST['setl_amount']."')";
        
        $result = $db->readQuery($sql);

        return $result;
    }
}
