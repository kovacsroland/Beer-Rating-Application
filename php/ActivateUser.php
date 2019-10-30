<?php

include_once 'DatabaseConnection.php';

class ActivateUser {
   
    private $confirm_key;
    
    public function __construct($confirm_key) {
        $this->setConfirm_key($confirm_key);
        $this->activate();
    }
    
    function getConfirm_key() {
        return $this->confirm_key;
    }

    function setConfirm_key($confirm_key) {
        $this->confirm_key = $confirm_key;
    }
    
    public function activate(){
        $connection = new DatabaseConnection();
        if($connection->connectDB()){
            $command = "SELECT profile_ID FROM confirm WHERE confirm_key = '".$this->getConfirm_key()."'";
            $result = $connection->getConnection()->query($command);
            while($row = mysqli_fetch_assoc($result)){
                $profile_ID = $row['profile_ID'];
            }
            $command2 = "UPDATE profiles SET active = 1 WHERE profile_ID = ".$profile_ID;
            mysqli_query($connection->getConnection(), $command2);
        }
    } 
}

$activateUser = new ActivateUser($_GET['confirm_key']);
