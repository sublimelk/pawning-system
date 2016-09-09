<?php
class DB {

    private $databseHost = "localhost";
    private $databseName = "pawning-system";
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
