<?php

class Customer {
    
    public $name;
    public $address;
    public $id_num;
    public $phone;
    public $value;
    
    public function setCustomer($name,$address,$id_num,$phone,$value){
        $this->name = $name;
        $this->username = $address;
        $this->password = $id_num;
        $this->password = $phone;
        $this->password = $value;
    }
    
    public function getCustomer(){
        $db = new DB();
        
        $sql = "SELECT * FROM customer ";
        
        $result = $db->readQuery($sql);
        
        $row = mysql_fetch_assoc($result);
        
        return $row;
    }
    
    public function addCustomer(){
        
        $db = new DB();
        
        $sql = "INSERT INTO `customer` (`name`,`id_num`,`address`,`phone`,`value`) VALUES ('".$_POST['name']."','".$_POST['id_num']."','".$_POST['address']."','".$_POST['phone']."','".$_POST['value']."')";
        
        $result = $db->readQuery($sql);
        
        return $result;
    } 
    
}
