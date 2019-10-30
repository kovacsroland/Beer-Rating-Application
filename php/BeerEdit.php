<?php

include_once 'DatabaseConnection.php';

class BeerEdit{
   
    private $brewery, $beer, $category, $glass, $ABV, $IBU, $EBC, $capacity, $temperature, $making_tmp, $beer_id;
    
    public function __construct($brewery, $beer, $category, $glass, $ABV, $IBU, $EBC, $capacity, $temperature, $making_tmp, $beer_id) {
        $this->setBrewery($brewery);
        $this->setBeer($beer);
        $this->setCategory($category);
        $this->setGlass($glass);
        $this->setABV($ABV);
        $this->setIBU($IBU);
        $this->setEBC($EBC);
        $this->setCapacity($capacity);
        $this->setTemperature($temperature);
        $this->setMaking_tmp($making_tmp);
        $this->setBeer_id($beer_id);
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

    function getGlass() {
        return $this->glass;
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

    function getCapacity() {
        return $this->capacity;
    }

    function getTemperature() {
        return $this->temperature;
    }

    function getMaking_tmp() {
        return $this->making_tmp;
    }
    
    function getBeer_id() {
        return $this->beer_id;
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

    function setGlass($glass) {
        $this->glass = $glass;
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

    function setCapacity($capacity) {
        $this->capacity = $capacity;
    }

    function setTemperature($temperature) {
        $this->temperature = $temperature;
    }

    function setMaking_tmp($making_tmp) {
        $this->making_tmp = $making_tmp;
    }
    
    function setBeer_id($beer_id) {
        $this->beer_id = $beer_id;
    }
    
    public function updateBeer(){
        $connection = new DatabaseConnection();
        if($connection->connectDB()){
            $command="UPDATE beers SET brewery_ID = ".$this->getBrewery().", beer_name ='".$this->getBeer()."', category_ID = ".$this->getCategory()." ,glass_ID = ".$this->getGlass()." ,"
                . " ABV = ".$this->getABV().", IBU = ".$this->getIBU().", EBC = ".$this->getEBC().", capacity = ".$this->getCapacity().", serving_temp = '".$this->getTemperature()." °C', making_tmp = '".$this->getMaking_tmp()."' WHERE beer_ID = ".$this->getBeer_id();
            if(mysqli_query($connection->getConnection(), $command)){
                header('Location: ../pages/MainPage.php');
            }else{
                echo "Sikertelen adatfrissítés.";
            }
        }
    }

}
$edit = new BeerEdit($_POST['brewery'],$_POST['beer'],$_POST['category'],$_POST['glass'],$_POST['ABV'],$_POST['IBU'],$_POST['EBC'],$_POST['capacity'],$_POST['temperature'],$_POST['making-tmp'],$_POST['beer-id']);
$edit->updateBeer();

