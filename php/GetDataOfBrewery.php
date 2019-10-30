<?php

include_once 'DatabaseConnection.php';

class GetDataOfBrewery {
    
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
    
    public function isActive($element){
        if($element == 0){
            return "Nem aktív";
        }else{
            return "Aktív";
        }
    }
    
    public function getImage($brewery_name, $image){
        $image_src = "../img/Breweries/".$brewery_name."/BreweryPage/".$image;
        return $image_src;
    }

    public function getBrewery() {
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $command = "SELECT * FROM breweries INNER JOIN countries ON breweries.country_ID = countries.country_ID WHERE brewery_ID = " . $this->getId();
            $result = mysqli_query($connection->getConnection(), $command);
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
    }

}


