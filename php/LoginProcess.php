<?php

include_once 'DatabaseConnection.php';

class LoginProcess {

    private $username, $password, $remember_me;

    public function __construct($username, $password, $remember_me) {
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setRemember_me($remember_me);
        $this->checkLoginDetails();
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getRemember_me() {
        return $this->remember_me;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = sha1($password);
    }

    function setRemember_me($remember_me) {
        $this->remember_me = $remember_me;
    }

    public function checkLoginDetails() {
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $command = "SELECT username, password FROM profiles WHERE username = '" . $this->getUsername() . "'"
                    . " AND password = '" . $this->getPassword() . "' AND active = 1 ";
            $result = $connection->getConnection()->query($command);
            if (mysqli_num_rows($result) > 0) {

                if ($this->getRemember_me()) {
                    setcookie("username", $this->getUsername(), time() + 3600, '/');
                    echo "Süti beállítva: " . $_COOKIE['username'];
                    $query = "UPDATE profiles SET last_enter = CURRENT_TIMESTAMP WHERE username = '".$this->getUsername()."'";
                        if(mysqli_query($connection->getConnection(), $query)){
                            header('Location: ../pages/MainPage.php');   
                        }else{
                            echo 'Sikertelen adatfrissítés';
                        }
                } else {
                    setcookie("username", $this->getUsername(), time());
                    echo "Süti törölve. ";
                }
            } else {
                setcookie("login", 1, time() + 60);
                header('Location: ../Login.php');
            }
        }
    }

}

$login = new LoginProcess($_POST["username"], $_POST["password"], $_POST["remember-me"]);
$login->checkLoginDetails();
