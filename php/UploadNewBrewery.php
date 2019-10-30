<?php

include_once 'DatabaseConnection.php';

class UploadNewBrewery {

    private $brewery, $country, $facebook, $instagram, $twitter, $website, $place, $introduced_date, $image, $beer_count, $active, $description;

    public function __construct($brewery, $country, $facebook, $instagram, $twitter, $website, $place, $introduced_date, $image, $beer_count, $active, $description) {
        $this->setBrewery($brewery);
        $this->setCountry($country);
        $this->setFacebook($facebook);
        $this->setInstagram($instagram);
        $this->setTwitter($twitter);
        $this->setWebsite($website);
        $this->setPlace($place);
        $this->setIntroduced_date($introduced_date);
        $this->setImage($image);
        $this->setBeer_count($beer_count);
        $this->setActive($active);
        $this->setDescription($description);
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

    function getImage() {
        return $this->image;
    }

    function getBeer_count() {
        return $this->beer_count;
    }

    function getActive() {
        return $this->active;
    }

    function getDescription() {
        return $this->description;
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

    function setIntroduced_date($introduced_date) {
        $this->introduced_date = $introduced_date;
    }

    function setImage($image) {
        $this->image = $image;
    }

    function setBeer_count($beer_count) {
        $this->beer_count = $beer_count;
    }

    function setActive($active) {
        $this->active = $active;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    public function uploadImage() {
        if ($this->getImage()['type'] == 'image/jpeg' || $this->getImage()['type'] == 'image/jpg' || $this->getImage()['type'] == 'image/png') {
            if ($this->getImage()['size'] <= (1024 * 1024 * 3)) {
                $dir = "../img/Breweries/" . $this->getBrewery() . "/BreweryList/";
                $dir2 = "../img/Breweries/" . $this->getBrewery() . "/BreweryPage/";
                if (!file_exists($dir)) {
                    mkdir($dir, 0777, true);
                }
                if (!file_exists($dir2)) {
                    mkdir($dir2, 0777, true);
                }
                $file_destination = "../img/Breweries/" . $this->getBrewery() . "/BreweryList/" . $this->getImage()['name'];
                $file_destination2 = "../img/Breweries/" . $this->getBrewery() . "/BreweryPage/" . $this->getImage()['name'];
                echo "fájlméret ok<br>";
                move_uploaded_file($this->getImage()['tmp_name'], $file_destination);
                copy($file_destination, $file_destination2);
            }
        }
    }

    public function uploadBrewery() {
        $connection = new DatabaseConnection();
        if ($connection->getConnection()) {
            $command = "INSERT INTO breweries(brewery_ID,country_ID,brewery_name,place,image,website,facebook_link,instagram_name,"
                    . "twitter_name,introduced_date,adding_tmp,beers_count,description,active) VALUES(''," . $this->getCountry() . ","
                    . "'" . $this->getBrewery() . "','" . $this->getPlace() . "','" . $this->getImage()['name'] . "','" . $this->getWebsite() . "',"
                    . "'" . $this->getFacebook() . "','" . $this->getInstagram() . "','" . $this->getTwitter() . "','" . $this->getIntroduced_date() . "',"
                    . "CURRENT_TIMESTAMP," . $this->getBeer_count() . ",'" . $this->getDescription() . "'," . $this->getActive() . ")";
            if(mysqli_query($connection->getConnection(), $command)){
            $this->uploadImage();
                header('Location: ../pages/MainPage.php');
            }else{
                die("Nem sikerült feltölteni az adatbázisba.");
            }
        }
    }

}

$upload = new UploadNewBrewery($_POST['brewery'], $_POST['country'], $_POST['facebook'], $_POST['instagram'], $_POST['twitter'], $_POST['website'], $_POST['place'], $_POST['introduced-date'], $_FILES['image'], $_POST['beer-count'], $_POST['active'], $_POST['description']);
$upload->uploadBrewery();
