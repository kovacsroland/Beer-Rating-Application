<?php

include_once 'DatabaseConnection.php';

class Logout {

    public function logout() {
        $connection = new DatabaseConnection();
        header('Location: ../index.php');
        if (isset($_COOKIE['username'])) {
            if($connection->connectDB()) {
                $query = "UPDATE profiles SET last_enter = CURRENT_TIMESTAMP WHERE username = '" . $_COOKIE['username'] . "'";
                if (mysqli_query($connection->getConnection(), $query)) {
                    
                } else {
                    echo 'Sikertelen adatfrissítés.';
                }
            }
            unset($_COOKIE['username']);
            setcookie('username', null, -1, '/');
            return true;
        } else {
            return false;
        }
    }

}

$logout = new Logout();
$logout->logout();
