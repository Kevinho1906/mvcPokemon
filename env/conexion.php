<?php

class conexion{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'pokemon33';
    private $con;

    public function __construct(){
        $dsn = "mysql:dbname = $this -> $database; host = $this -> $host; user = $this -> $user; password = $this -> $password";
    }
}

?>