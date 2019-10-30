<?php

include_once 'DatabaseConnection.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/Exception.php';

class Registration{
    
   private $username, $email, $password, $lastname, $firstname, $checkquestion, $checkanswer, $sex, $country, $birthdate, $current_id;
   
   public function __construct($username,$email,$password,$lastname,$firstname,$checkquestion,$checkanswer,$sex,$country,$birthdate) {
       $this->setUsername($username);
       $this->setEmail($email);
       $this->setPassword($password);
       $this->setLastname($lastname);
       $this->setFirstname($firstname);
       $this->setCheckquestion($checkquestion);
       $this->setCheckanswer($checkanswer);
       $this->setSex($sex);
       $this->setCountry($country);
       $this->setBirthdate($birthdate);
   }
   
   function getUsername() {
       return $this->username;
   }

   function getEmail() {
       return $this->email;
   }

   function getPassword() {
       return $this->password;
   }

   function getLastname() {
       return $this->lastname;
   }

   function getFirstname() {
       return $this->firstname;
   }

   function getCheckquestion() {
       return $this->checkquestion;
   }

   function getCheckanswer() {
       return $this->checkanswer;
   }

   function getSex() {
       return $this->sex;
   }

   function getCountry() {
       return $this->country;
   }

   function getBirthdate() {
       return $this->birthdate;
   }
   
   function getCurrent_id() {
       return $this->current_id;
   }
   
   function setUsername($username) {
       $this->username = $username;
   }

   function setEmail($email) {
       $this->email = $email;
   }

   function setPassword($password) {
       $this->password = sha1($password);
   }

   function setLastname($lastname) {
       $this->lastname = $lastname;
   }

   function setFirstname($firstname) {
       $this->firstname = $firstname;
   }

   function setCheckquestion($checkquestion) {
       $this->checkquestion = $checkquestion;
   }

   function setCheckanswer($checkanswer) {
       $this->checkanswer = $checkanswer;
   }

   function setSex($sex) {
       $this->sex = $sex;
   }

   function setCountry($country) {
       $this->country = $country;
   }

   function setBirthdate($birthdate) {
       $this->birthdate = $birthdate;
   }
   
   function setCurrent_id($current_id) {
       $this->current_id = $current_id;
   }
   
   public function sendSystemMessage(){
       $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $command = "INSERT INTO private_message (msg_ID, sender_ID, consignee_ID, message, send_timestamp, seen)"
                    . " VALUES('', 1, (SELECT profile_ID FROM profiles WHERE username = '".$this->getUsername()."'),"
                    . " 'Isten hozott a To Beer Or Not To Beer sör és sörfőzde értékelő oldalán.', CURRENT_TIMESTAMP, 0)";
            if(mysqli_query($connection->getConnection(), $command)){
            }else{
                die("Sikertelen");
            }
        }
   }
   
   public function insertData(){
       $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $command = "INSERT INTO persons (person_ID,country_ID,birth_date,first_name,last_name,email,check_question,check_answer,sex)".
                       " VALUES('',".$this->getCountry().", '".$this->getBirthdate()."', '".$this->getFirstname()."', '".$this->getLastname().
                       "', '".$this->getEmail()."', '".$this->getCheckquestion()."', '".$this->getCheckanswer()."', '".$this->getSex()."') ;".
                       "INSERT INTO profiles (profile_ID,person_ID,username,password,join_tmp) VALUES('', (SELECT persons.person_ID FROM persons WHERE email='".$this->getEmail()."' LIMIT 1), '".$this->getUsername()."', '".$this->getPassword()."', CURRENT_TIMESTAMP);";
            if(mysqli_multi_query($connection->getConnection(), $command)){
                $this->setCurrent_id($connection->getConnection()->insert_id);
                $this->createActivateLink();
                $this->sendSystemMessage();
                header("Location: ../pages/SuccessRegistration.php");
            }else{
                echo "Nem sikerült";
                echo 0;
            }
        }else{
            echo 0;
        }
   }
   
   public function createActivateLink(){
       sleep(1);
       $connection = new DatabaseConnection();
        if($connection->connectDB()){
            $confirm_key = sha1(md5($this->getCurrent_id()));
            $command = "INSERT INTO confirm(confirm_ID, profile_ID, confirm_key) VALUES('',".$this->getCurrent_id().", '".$confirm_key."')";
            mysqli_query($connection->getConnection(), $command);
        }else{
            die("Nem sikerült");
        }
        
       $fajl = fopen("ActivateLink.txt","w");
       fwrite($fajl, "http://localhost/UntappdCopy/php/ActivateUser.php?confirm_key=".$confirm_key);
       $this->sendMail("http://localhost/UntappdCopy/php/ActivateUser.php?confirm_key=".$confirm_key);
       header('Location: ../index.php');
       
   }
   
   public function sendMail($activateLink) {
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
        $mail->AddAddress($this->getEmail(), $this->getLastname()." ".$this->getFirstname());
        $mail->isHTML(true);
        $mail->Subject = 'Activate Link!';
        $mail->Body = "<This is your activate link: <a href=".$activateLink.">".$activateLink."</a>";


        if (!$mail->send()) {
            echo $mail->ErrorInfo;
        }
    }
   
}

$registration = new Registration($_POST["username"],$_POST["email"],$_POST["password"],$_POST["lastname"],$_POST["firstname"],$_POST["control"],$_POST["answer"],$_POST["gender"],$_POST["country"],$_POST["birthdate"]);
$registration->insertData();
