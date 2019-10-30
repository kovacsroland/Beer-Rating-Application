<?php

include_once 'DatabaseConnection.php';

class CheckQuestionToInput{
    
    private $email;
    
    public function __construct($email) {
        $this->setEmail($email);
        $this->checkData();
    }  
    
    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }
    
    public function checkData(){
        $connection = new DatabaseConnection();
        if($connection->connectDB()){
            $query = "SELECT check_question FROM persons WHERE email='".$_GET["checkemail"]."'";
            $result = mysqli_query($connection->getConnection(), $query);
            while($row = mysqli_fetch_assoc($result)){
                echo $row["check_question"];
            }
        }
    }
    
}

$question = new CheckQuestionToInput($_GET["checkemail"]);