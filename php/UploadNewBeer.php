<?php

include_once 'DatabaseConnection.php';

class UploadNewBeer{
    
    private $brewery, $beer, $category, $capacity, $from, $to, $degree, $glass, $taste, $color, $foam, $smell, $ABV, $IBU, $EBC, $making_tmp, $image, $description;

    public function __construct($brewery, $beer, $category, $capacity, $from, $to, $degree, $glass, $taste, $color, $foam, $smell, $ABV, $IBU, $EBC, $making_tmp, $image, $description) {
        $this->setBrewery($brewery);
        $this->setBeer($beer);
        $this->setCategory($category);
        $this->setCapacity($capacity);
        $this->setFrom($from);
        $this->setTo($to);
        $this->setDegree($degree);
        $this->setGlass($glass);
        $this->setTaste($taste);
        $this->setColor($color);
        $this->setFoam($foam);
        $this->setSmell($smell);
        $this->setABV($ABV);
        $this->setIBU($IBU);
        $this->setEBC($EBC);
        $this->setMaking_tmp($making_tmp);
        $this->setImage($image);
        $this->setDescription($description);
    }
    
    function getBrewery() {
        return $this->brewery;
    }

    function getBeer() {
        return $this->beer;
    }

    function getCategory() {
        return $this->category;
    }

    function getCapacity() {
        return $this->capacity;
    }

    function getFrom() {
        return $this->from;
    }

    function getTo() {
        return $this->to;
    }

    function getDegree() {
        return $this->degree;
    }

    function getGlass() {
        return $this->glass;
    }

    function getTaste() {
        return $this->taste;
    }

    function getColor() {
        return $this->color;
    }

    function getFoam() {
        return $this->foam;
    }

    function getSmell() {
        return $this->smell;
    }

    function getABV() {
        return $this->ABV;
    }

    function getIBU() {
        return $this->IBU;
    }

    function getEBC() {
        return $this->EBC;
    }

    function getMaking_tmp() {
        return $this->making_tmp;
    }

    function getImage() {
        return $this->image;
    }

    function getDescription() {
        return $this->description;
    }

    function setBrewery($brewery) {
        $this->brewery = $brewery;
    }

    function setBeer($beer) {
        $this->beer = $beer;
    }

    function setCategory($category) {
        $this->category = $category;
    }

    function setCapacity($capacity) {
        $this->capacity = $capacity;
    }

    function setFrom($from) {
        $this->from = $from;
    }

    function setTo($to) {
        $this->to = $to;
    }

    function setDegree($degree) {
        $this->degree = $degree;
    }

    function setGlass($glass) {
        $this->glass = $glass;
    }

    function setTaste($taste) {
        $this->taste = $taste;
    }

    function setColor($color) {
        $this->color = $color;
    }

    function setFoam($foam) {
        $this->foam = $foam;
    }

    function setSmell($smell) {
        $this->smell = $smell;
    }

    function setABV($ABV) {
        $this->ABV = $ABV;
    }

    function setIBU($IBU) {
        $this->IBU = $IBU;
    }

    function setEBC($EBC) {
        $this->EBC = $EBC;
    }

    function setMaking_tmp($making_tmp) {
        $this->making_tmp = $making_tmp;
    }

    function setImage($image) {
        $this->image = $image;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    public function uploadImage() {
        if ($this->getImage()['type'] == 'image/jpeg' || $this->getImage()['type'] == 'image/jpg' || $this->getImage()['type'] == 'image/png') {
            if ($this->getImage()['size'] <= (1024 * 1024 * 3)) {
                $dir = "../img/Beers/" . $this->getBeer()."/BeerList/";
                $dir2 = "../img/Beers/" . $this->getBeer()."/BeerPage/";
                if (!file_exists($dir)) {
                    mkdir($dir,0777, true);
                }
                if (!file_exists($dir2)) {
                    mkdir($dir2,0777, true);
                }
                $file_destination = "../img/Beers/" . $this->getBeer()."/BeerList/".$this->getImage()['name'];
                $file_destination2 = "../img/Beers/" . $this->getBeer()."/BeerPage/".$this->getImage()['name'];
                echo "fájlméret ok<br>";
                move_uploaded_file($this->getImage()['tmp_name'], $file_destination);
                copy($file_destination,$file_destination2);
            }
        }
    }
    
    public function uploadBeer(){
        $connection = new DatabaseConnection();
        if($connection->getConnection()){
            $command = "INSERT INTO beers (beer_ID,brewery_ID,glass_ID,category_ID,beer_name,taste,color,foam,smell,ABV,IBU,EBC,"
                    . "capacity,serving_temp,image,add_tmp,making_tmp,description) VALUES('',".$this->getBrewery().","
                    . "".$this->getGlass().",".$this->getCategory().",'".$this->getBeer()."',"
                    . "'".$this->getTaste()."','".$this->getColor()."','".$this->getFoam()."','".$this->getSmell()."',".$this->getABV().","
                    . "".$this->getIBU().",".$this->getEBC().",".$this->getCapacity().",'".$this->getFrom()." - ".$this->getTo()." ".$this->getDegree()."',"
                    . ",'".$this->getImage()['name']."',CURRENT_TIMESTAMP,'".$this->getMaking_tmp()."','".$this->getDescription()."')";
            if(mysqli_query($connection->getConnection(), $command)){
                $this->uploadImage();
                header('Location: ../pages/MainPage.php');
            }else{
                die("Nem sikerült feltölteni az adatbázisba.");
            }
        }
    }
}

$upload = new UploadNewBeer($_POST['brewery'], $_POST['beer'], $_POST['category'], $_POST['capacity'], $_POST['from'], $_POST['to'], $_POST['degree'], $_POST['glass'], $_POST['taste'], $_POST['color'], $_POST['foam'], $_POST['smell'], $_POST['ABV'], $_POST['IBU'], $_POST['EBC'], $_POST['making-tmp'], $_FILES['image'], $_POST['description']);
$upload->uploadBeer();