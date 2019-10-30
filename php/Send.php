<?php

include_once 'DatabaseConnection.php';

class Send {
    
    private $id, $message;
    
    public function __construct($id, $message) {
        $this->setId($id);
        $this->setMessage($message);
    }
    
    function getId() {
        return $this->id;
    }

    function getMessage() {
        return $this->message;
    }
    
    function setId($id) {
        $this->id = $id;
    }
    
    function setMessage($message) {
        $this->message = $message;
    }
    
    public function sendMessage(){
        $connection = new DatabaseConnection();
        if($connection->connectDB()){
            $command = "INSERT INTO private_message (msg_ID, sender_ID, consignee_ID, message, send_timestamp, seen)"
                    . " VALUES('', (SELECT profile_ID FROM profiles WHERE username = '".$_COOKIE['username']."'),"
                    . " ".$this->getId().",  '".$this->getMessage()."', CURRENT_TIMESTAMP, 0)";
            if (mysqli_query($connection->getConnection(), $command)) {
                header('Location: ../pages/MainPage.php');
            } else {
                echo "Sikertelen adatfrissítés.";
                echo $command;
            }
        }
    }
    
}

$message = new Send($_POST['profile-id'], $_POST['message']);
$message->sendMessage();
    
