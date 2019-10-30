<?php

include_once 'DatabaseConnection.php';

class GetDataOfBeer {
    
    private $id;
    
    function getId() {
        return $this->id;
    }
    
    function setId($id) {
        $this->id = $id;
    }
    
    public function __construct($id) {
        $this->setId($id);
    }
    
    public function progressBar($all, $db){
        if(!isset($all) || !isset($db) || $all <= 0 || $db <= 0){
            return "Nincs adat!";
        }else{
            $num = ((int)$all/(int)$db);
            return "<div class='progress bg-secondary'>
                    <div class='progress-bar bg-success' id='progressbar' role='progressbar' style='width: ".$num."%' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100'></div>
                </div>";
        }
    }
    
    public function roundNums($value){
	$a = $value-floor($value);
	$b = number_format($a, 2);
	if($b <=0.25){
            return floor($value);
	}else if($b>0.25 && $b<0.75){
            return floor($value)+0.5;
	}else if($b>=0.75){
            return ceil($value);
	}
    }
    
    public function stars($all, $db){
        $stars="";
        if(!isset($all) || !isset($db) || $all <= 0 || $db <= 0){
            return "Nincs adat!";
        }else{
            $num = ((int)$all/(int)$db);
            if(is_float($this->roundNums($num))){
                for($i=0;$i<floor($this->roundNums($num));$i++){
                    $stars.="<i class='fas fa-star text-success'></i>";
                }
                $stars.="<i class='fas fa-star-half-alt text-success'></i>";
                for($i=0;$i<(9-ceil($this->roundNums($num)));$i++){
                    $stars.="<i class='far fa-star text-success'></i>";
                }
            }else{
                for($i=0;$i<$this->roundNums($num);$i++){
                    $stars.="<i class='fas fa-star text-success'></i>";
                }
                $stars.="<i class='fas fa-star-half-alt text-success'></i>";
                for($i=0;$i<(9-($this->roundNums($num)));$i++){
                    $stars.="<i class='far fa-star text-success'></i>";
                }
            }
        }
        return $stars;
    }
    
    public function editData($text){
        if (strlen($text) >= 25) {
            return substr($text, 0, 24).'...';
        } else {
            return $text;
        }
    }
    
    public function editTitle($text) {
        if (strlen($text) >= 25) {
            return strrev(substr(strrev($text), 0, 24));
        } else {
            return $text;
        }
    }
    
    public function getBeerType($parent){
        $text ="";
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            while($parent != 0){
                $query = "SELECT * FROM categories WHERE category_ID = ".$parent;
                $result = mysqli_query($connection->getConnection(), $query);
                $row = mysqli_fetch_assoc($result);
                $text.=strrev($row['category_name']).strrev("<strong>/</strong>");
                $parent = $row['parent'];
            }
        }
        
        return substr(strrev($text),9);
    }
    
    public function getCountryName($country_ID){
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $query = "SELECT country_name FROM countries WHERE country_ID = ".$country_ID;
            $result = mysqli_query($connection->getConnection(), $query);
            $row = mysqli_fetch_assoc($result);
        }
        return $row['country_name'];
    }
    
    public function getImage($beer_name, $image){
        $image_src = "../img/Beers/".$beer_name."/BeerPage/".$image;
        return $image_src;
    }

    public function getBeer() {
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $command = "SELECT *,beers.description AS beer_description,beers.image AS image,beers.rating_count AS rating_count,beers.all_like AS all_like,beers.all_unlike AS all_unlike FROM beers INNER JOIN breweries ON beers.brewery_ID = breweries.brewery_ID INNER JOIN glasses ON beers.glass_ID = glasses.glass_ID" .
                        " INNER JOIN categories ON beers.category_ID = categories.category_ID WHERE beer_ID = " . $this->getId();
            $result = mysqli_query($connection->getConnection(), $command);
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
    }

}

