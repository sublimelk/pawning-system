<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB
 *
 * @author official
 */
class DB {

    private $databseHost = "localhost";
    private $databseName = "dddddddddddddddddd";
    private $databseUser = "root";
    private $databsePassword = "";

    public function __construct() {
        mysql_connect($this->databseHost, $this->databseUser, $this->databsePassword);
        mysql_select_db($this->databseName) or die("Unable to select database");
    }

    public function readQuery($query) {

        $result = mysql_query($query) or die(mysql_error());
        return $result;
    }

}

function dd($data) {
    var_dump($data);
    exit();
}
