<?php

class User {

    private $name;
    private $username;
    private $password;

    public function __construct() {
        session_start();

        $_SESSION['login'] = TRUE;
    }

    public function setUser($data) {
        
    }

    public function getUser($id) {
        
    }

    public function loginUser($data) {
 
        $res = TRUE;

        if ($res) { 
            $_SESSION['login'] = TRUE;
            $_SESSION['name'] = 'Mahesh';
        }
    }

    public function isLoginUser() {
        return FALSE;
    }

}
