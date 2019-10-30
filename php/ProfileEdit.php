<?php

include_once 'DatabaseConnection.php';

class ProfileEdit {

    private $lastname, $firstname, $email, $country, $checkquestion, $checkanswer, $username, $password, $profilepic, $personid, $profileid, $checkpassword, $oldpic;

    public function __construct($lastname, $firstname, $email, $country, $checkquestion, $checkanswer, $username, $password, $profilepic, $personid, $profileid, $checkpassword) {
        $this->setLastname($lastname);
        $this->setFirstname($firstname);
        $this->setEmail($email);
        $this->setCountry($country);
        $this->setCheckquestion($checkquestion);
        $this->setCheckanswer($checkanswer);
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setProfilepic($profilepic);
        $this->setPersonid($personid);
        $this->setProfileid($profileid);
        $this->setCheckpassword($checkpassword);
    }

    function getLastname() {
        return $this->lastname;
    }

    function getFirstname() {
        return $this->firstname;
    }

    function getEmail() {
        return $this->email;
    }

    function getCountry() {
        return $this->country;
    }

    function getCheckquestion() {
        return $this->checkquestion;
    }

    function getCheckanswer() {
        return $this->checkanswer;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getProfilepic() {
        return $this->profilepic;
    }

    function getPersonid() {
        return $this->personid;
    }

    function getProfileid() {
        return $this->profileid;
    }

    function getCheckpassword() {
        return $this->checkpassword;
    }

    function getOldpic() {
        return $this->oldpic;
    }
    
    function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setCountry($country) {
        $this->country = $country;
    }

    function setCheckquestion($checkquestion) {
        $this->checkquestion = $checkquestion;
    }

    function setCheckanswer($checkanswer) {
        $this->checkanswer = $checkanswer;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        if (isset($password)) {
            $this->password = sha1($password);
        } else {
            $this->password = $this->getDefaultPassword();
        }
    }

    function setProfilepic($profilepic) {
        $this->profilepic = $profilepic;
    }

    function setPersonid($personid) {
        $this->personid = $personid;
    }

    function setProfileid($profileid) {
        $this->profileid = $profileid;
    }

    function setCheckpassword($checkpassword) {
        $this->checkpassword = $checkpassword;
    }
    
    function setOldpic($oldpic) {
        $this->oldpic = $oldpic;
    }

    public function isEMpty($path){
        $images = scandir($path, 1);
        if(!empty($images[0])){
            $this->setOldpic($images[0]);
            return true;
        }else{
            return false;
        }
    }
    
    public function uploadImage() {
        if ($this->getProfilepic()['type'] == 'image/jpeg' || $this->getProfilepic()['type'] == 'image/jpg' || $this->getProfilepic()['type'] == 'image/png') {
            if ($this->getProfilepic()['size'] <= (1024 * 1024 * 3)) {
                $dir = "../img/Profiles/" . md5($_COOKIE['username']) . "/";
                if (!file_exists("../img/Profiles/" . md5($_COOKIE['username']) . "/")) {
                    mkdir($dir);
                }
                $file_destination = "../img/Profiles/" . md5($_COOKIE['username']) . "/" ;
                echo $file_destination;
                echo "fájlméret ok<br>";
                if($this->isEMpty($dir)){
                    unlink($this->getOldpic());
                }
                move_uploaded_file($this->getProfilepic()['tmp_name'], $file_destination.$this->getProfilepic()['name']);
            }else{
                echo "nem jó a kép mérete";
            }
        }else{
            echo "nem jó a kép";
        }
    }

    public function getDefaultPassword() {
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $command = "SELECT password FROM profiles WHERE username = '" . $_COOKIE['username'] . "'";
            $result = mysqli_query($connection->getConnection(), $command);
            $row = mysqli_fetch_assoc($result);
            return $row['password'];
        }
    }

    public function checkPassword() {
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $command = "SELECT * FROM profiles WHERE username = '" . $this->getUsername() . "' AND password = '" . sha1($this->getCheckpassword()) . "'";
            $result = mysqli_query($connection->getConnection(), $command);
            if (mysqli_num_rows($result) > 0) {
                return true;
            } else {
                echo $command;
                return false;
            }
        }
    }

    public function editProfile() {
        if($this->checkPassword()) {
            $connection = new DatabaseConnection();
            if ($connection->connectDB()) {
                $command = "UPDATE persons SET country_ID = " . $this->getCountry() . ", first_name = '" . $this->getFirstname() . "',"
                        . " last_name = '" . $this->getLastname() . "', email = '" . $this->getEmail() . "',"
                        . " check_question = '" . $this->getCheckquestion() . "', check_answer = '" . $this->getCheckanswer() . "' WHERE person_ID = " . $this->getPersonid() . ";"
                        . " UPDATE profiles SET username = '" . $this->getUsername() . "', password = '" . $this->getPassword() . "', profile_pic = '" . $this->getProfilepic()['name'] . "' WHERE profile_ID = " . $this->getProfileid() . ";";
                if (mysqli_multi_query($connection->getConnection(), $command)) {
                    $this->uploadImage();
                    header('Location: ../pages/MainPage.php');
                } else {
                    echo "Sikertelen adatfrissítés.";
                }
            }else{
                echo "ne sikerült csatlakozni";
            }
        }else{
            echo "nem jó a password";
        }
    }

}

$edit = new ProfileEdit($_POST['lastname'], $_POST['firstname'], $_POST['email'], $_POST['country'], $_POST['question'], $_POST['answer'], $_POST['username'], $_POST['password'], $_FILES['image'], $_POST['person-id'], $_POST['profile-id'], $_POST["check-password"]);
$edit->editProfile();
