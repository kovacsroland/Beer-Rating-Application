<?php

include_once 'DatabaseConnection.php';

class GetDataFromProfile{

    public function getCountryName($country_ID){
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $query = "SELECT country_name FROM countries WHERE country_ID = ".$country_ID;
            $result = mysqli_query($connection->getConnection(), $query);
            $row = mysqli_fetch_assoc($result);
        }
        return $row['country_name'];
    }
    
    public function getProfilePicture($username, $image){
        if($image != ""){
            return "../img/Profiles/".md5($username)."/".$image;
        }else{
            return "../img/Profiles/Default Profile/Default Profile.png";
        }
    }
    
    public function getProfile() {
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $command = "SELECT * FROM profiles INNER JOIN persons ON profiles.person_ID = persons.person_ID WHERE username = '".$_COOKIE['username']."'";
            $result = mysqli_query($connection->getConnection(), $command);
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
    }
    
    public function getOtherProfile($profile_ID) {
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $command = "SELECT * FROM profiles INNER JOIN persons ON profiles.person_ID = persons.person_ID WHERE profile_ID = '".$profile_ID."'";
            $result = mysqli_query($connection->getConnection(), $command);
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
    }

}
