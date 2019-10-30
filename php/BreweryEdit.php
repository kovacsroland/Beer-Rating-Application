<?php

include_once './DatabaseConnection.php';

class BreweryEdit{
    
    private $brewery, $country, $facebook, $instagram, $twitter, $website, $place, $introduced_date, $brewery_id;

    public function __construct($brewery, $country, $facebook, $instagram, $twitter, $website, $place, $introduced_date, $brewery_id) {
        $this->setBrewery($brewery);
        $this->setCountry($country);
        $this->setFacebook($facebook);
        $this->setInstagram($instagram);
        $this->setTwitter($twitter);
        $this->setWebsite($website);
        $this->setPlace($place);
        $this->setIntroduced_date($introduced_date);
        $this->setBrewery_id($brewery_id);
    }
    
    function getBrewery() {
        return $this->brewery;
    }

    function getCountry() {
        return $this->country;
    }

    function getFacebook() {
        return $this->facebook;
    }

    function getInstagram() {
        return $this->instagram;
    }

    function getTwitter() {
        return $this->twitter;
    }

    function getWebsite() {
        return $this->website;
    }

    function getPlace() {
        return $this->place;
    }

    function getIntroduced_date() {
        return $this->introduced_date;
    }
    
    function getBrewery_id() {
        return $this->brewery_id;
    }

    function setBrewery($brewery) {
        $this->brewery = $brewery;
    }

    function setCountry($country) {
        $this->country = $country;
    }

    function setFacebook($facebook) {
        $this->facebook = $facebook;
    }

    function setInstagram($instagram) {
        $this->instagram = $instagram;
    }

    function setTwitter($twitter) {
        $this->twitter = $twitter;
    }

    function setWebsite($website) {
        $this->website = $website;
    }

    function setPlace($place) {
        $this->place = $place;
    }

    function setBrewery_id($brewery_id) {
        $this->brewery_id = $brewery_id;
    }

    function setIntroduced_date($introduced_date) {
        $this->introduced_date = $introduced_date;
    }
    
    public function updateBrewery(){
        $connection = new DatabaseConnection();
        if($connection->connectDB()){
            $command="UPDATE breweries SET country_ID=".$this->getCountry().",brewery_name = '".$this->getBrewery()."',place='".$this->getPlace()."',website='".$this->getWebsite()."',facebook_link='".$this->getFacebook()."',instagram_name='".$this->getInstagram()."',twitter_name='".$this->getTwitter()."',introduced_date='".$this->getIntroduced_date()."' WHERE brewery_ID = ".$this->getBrewery_id();
            if(mysqli_query($connection->getConnection(), $command)){
                header('Location: ../pages/MainPage.php');
            }else{
                echo "Sikertelen adatfrissítés.";
            }
        }
    }
}
$update = new BreweryEdit($_POST['brewery'],$_POST['country'],$_POST['facebook'],$_POST['instagram'],$_POST['twitter'],$_POST['website'],$_POST['place'],$_POST['introduced-date'],$_POST['brewery-id']);
$update->updateBrewery();