<?php

class User {

    private $name;
    private $username;
    private $password;

    public function setUser($name, $username, $password) {
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
    }

    public function getUser() {
        
        $db = new DB();
        
        $sql = "SELECT * FROM user ";
        
        $result = $db->readQuery($sql);
        
        $row = mysql_fetch_assoc($result);
        
        return $row;
    }

    public function loginUser($data) {

        $db = new DB();

        $sql = "SELECT `name` FROM `user` WHERE `username` = '" . $_POST['username'] . "' AND `password` = '" . $_POST['password'] . "' LIMIT 1 ";

        $result = $db->readQuery($sql);

        $row = mysql_fetch_assoc($result);


        if ($row) {

            $_SESSION['login'] = TRUE;
            $_SESSION['name'] = $row['name'];
            

            header('location: index.php');
        } else {

            return FALSE;
        }
    }

    public function logoutUser() {

        unset($_SESSION['login']);
        unset($_SESSION['name']);

        header('location: index.php');
    }
    
    public function viewUser(){
        
    }


    public function editUser(){
        
    }

    public function isLoginUser() {

        if ($_SESSION['login']) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
