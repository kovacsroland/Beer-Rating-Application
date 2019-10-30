<?php

class DatabaseConnection{
      
    private $connection;
    
    public function __construct() {
        $this->connectDB();
    }
    
    function getConnection() {
        return $this->connection;
    }
       
    function setConnection($connection) {
        $this->connection = $connection;
    }
    
    public function connectDB(){
        $connection = new mysqli("localhost", "root", "", "beerodalom");
        if($connection->connect_error){
            die("Nem sikerült kapcsolódni az adatbázishoz");
            return false;
        }else{
            $this->setConnection($connection);
            mysqli_set_charset($connection, "utf8");
            return true;
        }
    }
}
