<?php

class User {

    private $name;
    private $username;
    private $password;
 
    public function setUser($data) {
        
    }

    public function getUser($id) {
        
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

    public function isLoginUser() {
        
        if ($_SESSION['login']) { 
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
