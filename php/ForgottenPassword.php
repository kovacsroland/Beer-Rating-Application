<?php

include_once 'DatabaseConnection.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/Exception.php';

class ForgottenPassword{
    
    private $username, $email, $newPassword;
    
    public function __construct($username, $email) {
        $this->setUsername($username);
        $this->setEmail($email);
    }
    
    function getNewPassword() {
        return $this->newPassword;
    }
    
    function getName() {
        return $this->name;
    }
    
    function getUsername() {
        return $this->username;
    }

    function getEmail() {
        return $this->email;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setEmail($email) {
        $this->email = $email;
    }
    
    function setName($name) {
        $this->name = $name;
    }
    
    function setNewPassword($newPassword) {
        $this->newPassword = $newPassword;
    }

    public function checkData(){
        $connection = new DatabaseConnection();
        if($connection->connectDB()){
            $command = "SELECT * FROM profiles INNER JOIN persons ON profiles.person_ID = persons.person_ID WHERE username = '".$this->getUsername()."'"
                    . " AND email = '".$this->getEmail()."' AND active = 1 ";
            $result = $connection->getConnection()->query($command);
            if(mysqli_num_rows($result) > 0){
                $this->setNewPassword($this->createNewPassword()); 
                $fajl = fopen("NewPassword.txt","w");
                fwrite($fajl, $this->getNewPassword());
                while($row = mysqli_fetch_assoc($result)){
                    $command="UPDATE profiles SET password='".sha1($this->getNewPassword())."' WHERE profile_ID=".$row["profile_ID"];
                    $this->setName($row['last_name'].$row['first_name']);
                }
                if(mysqli_query($connection->getConnection(), $command)){
                    echo "A jelszó sikeresen megváltozott.";
                }else{
                    echo "Sikertelen a jelszó megváltoztatása.";
                }
                $this->sendMail();
            }else{
                echo "Ennyire sem vagy képes te ";
            }
        }
    }
    
    public function createNewPassword(){
        $password = "";
        $text = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789#&@*+%=-";
        for($i=0;$i<12;$i++){
            $password.=$text{rand(0, strlen($text))};
        }
        return utf8_encode($password);
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
        $mail->Subject = 'New Password!';
        $mail->Body = "That is your new password: ".$this->getNewPassword();


        if (!$mail->send()) {
            echo $mail->ErrorInfo;
        }
    }
    
}

$forgottenPassword = new ForgottenPassword($_POST["username"], $_POST["checkemail"]);
$forgottenPassword->checkData();
