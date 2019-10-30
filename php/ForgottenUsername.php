<?php

include_once 'DatabaseConnection.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/Exception.php';

class ForgottenUsername{
    
    private $email, $checkAnswer, $name, $password, $username;
    
    public function __construct($email, $checkAnswer) {
        $this->setEmail($email);
        $this->setCheckAnswer($checkAnswer);
    }
    
    function getUsername() {
        return $this->username;
    }

    function setUsername($username) {
        $this->username = $username;
    }
    
    function getName() {
        return $this->name;
    }

    function setName($name) {
        $this->name = $name;
    }
   
    function getEmail() {
        return $this->email;
    }

    function getCheckAnswer() {
        return $this->checkAnswer;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setCheckAnswer($checkAnswer) {
        $this->checkAnswer = $checkAnswer;
    }

    public function sendData(){
        $connection = new DatabaseConnection();
        if($connection->connectDB()){
            $query = "SELECT * FROM profiles INNER JOIN persons ON profiles.person_ID = persons.person_ID WHERE persons.email = '".$this->getEmail()."' AND check_answer = '".$this->getCheckAnswer()."'";
            $result = mysqli_query($connection->getConnection(), $query);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $this->setName($row["last_name"]." ".$row["first_name"]);
                    $this->setUsername($row["username"]);
                }
                $this->sendMail();
            }else{
                echo "Nincs is ilyen ne akarj átbaszni.";
            }
        }
    }
    
    public function sendMail() {
        $mail = new \PHPMailer\PHPMailer\PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->Username = 'beerodalom19@gmail.com';
        $mail->Password = 'Leonardo1994@';
        $mail->setFrom('asdasd@gmail.com', 'To Beer Or Not To Beer');
//        $mail->AddAddress('beerodalom19@gmail.com', "Gergő Szabó");
        $mail->AddAddress($this->getEmail(), $this->getName());
        $mail->isHTML(true);
        $mail->Subject = 'Your Username!';
        $mail->Body = "That is your username: <h1>".$this->getUsername()."</h1>";


        if (!$mail->send()) {
            echo $mail->ErrorInfo;
        }
    }
    
}

$username = new ForgottenUsername($_POST["checkemail"],$_POST["question"]);
$username->sendData();
