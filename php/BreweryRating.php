<?php

include_once 'DatabaseConnection.php';

class BreweryRating {

    private $rate, $image, $like_unlike, $opinion, $brewery;

    public function __construct($rate, $image, $like_unlike, $opinion, $brewery) {
        $this->setRate($rate);
        $this->setImage($image);
        $this->setLike_unlike($like_unlike);
        $this->setOpinion($opinion);
        $this->setBrewery($brewery);
    }

    function getRate() {
        return $this->rate;
    }

    function getImage() {
        return $this->image;
    }

    function getLike_unlike() {
        return $this->like_unlike;
    }

    function getOpinion() {
        return $this->opinion;
    }

    function getBrewery() {
        return $this->brewery;
    }

    function setRate($rate) {
        $this->rate = $rate;
    }

    function setImage($image) {
        $this->image = $image;
    }

    function setLike_unlike($like_unlike) {
        $this->like_unlike = $like_unlike;
    }

    function setOpinion($opinion) {
        $this->opinion = $opinion;
    }

    function setBrewery($brewery) {
        $this->brewery = $brewery;
    }

    public function likeUnlike($likeUnlike) {
        if ($likeUnlike == 0) {
            return "all_unlike = all_unlike + 1";
        } else {
            return "all_like = all_like + 1";
        }
    }

    public function uploadImage() {
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $query = "SELECT brewery_rating_ID FROM brewery_ratings ORDER BY brewery_rating_ID DESC LIMIT 1";
            $result = mysqli_query($connection->getConnection(), $query);
            $row = mysqli_fetch_assoc($result);
        }
        if ($this->getImage()['type'] == 'image/jpeg' || $this->getImage()['type'] == 'image/jpg' || $this->getImage()['type'] == 'image/png') {
            if ($this->getImage()['size'] <= (1024 * 1024 * 3)) {
                $dir = "../img/Ratings/Brewery Ratings/" . $row['brewery_rating_ID'] . "/";
                if (!file_exists($dir)) {
                    mkdir($dir, 0777, true);
                }
                $file_destination = "../img/Ratings/Brewery Ratings/" . $row['brewery_rating_ID'] . "/".$this->getImage()['name'];
                echo $file_destination;
                echo "fájlméret ok<br>";
                move_uploaded_file($this->getImage()['tmp_name'], $file_destination);
            }else{
                echo "Túl nagy a fájl mérete.";
            }
        }else{
            echo "Nem jó a kép formátuma";
        }
    }

    public function isRateable() {
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $query = "SELECT * FROM brewery_ratings WHERE profile_ID = (SELECT profile_ID FROM profiles WHERE username = '" . $_COOKIE['username'] . "') AND brewery_ID = " . $this->getBrewery();
            $result = mysqli_query($connection->getConnection(), $query);
            if (mysqli_num_rows($result) > 0) {
                return false;
            } else {
                return true;
            }
        }
    }

    public function rateBrewery() {
        if ($this->isRateable()) {
            $connection = new DatabaseConnection();
            if ($connection->connectDB()) {
                $query = "INSERT INTO brewery_ratings (brewery_rating_ID, profile_ID, brewery_ID,image, rating, like_unlike, rating_tmp, opinion) VALUES('', (SELECT profile_ID FROM profiles WHERE username = '" . $_COOKIE['username'] . "'), " . $this->getBrewery() . ", '" . $this->getImage()['name'] . "', " . $this->getRate() . ", " . $this->getLike_unlike() . ", CURRENT_TIMESTAMP, '" . $this->getOpinion() . "'); "
                        . "UPDATE breweries SET rating_overall = rating_overall + " . $this->getRate() . ", rating_count = rating_count + 1, " . $this->likeUnlike($this->getLike_unlike()) . " WHERE brewery_ID = " . $this->getBrewery() . ";"
                        . "UPDATE profiles SET coin = coin + 5, rating_count = rating_count + 1 WHERE username = '" . $_COOKIE['username'] . "';";
                if (mysqli_multi_query($connection->getConnection(), $query)) {
                    $this->uploadImage();
                    header('Location: ../pages/MainPage.php');
                } else {
                    echo "Sikertelen adatfrissítés.";
                }
            }
        }
    }

}

$rate = new BreweryRating($_POST["rate"], $_FILES["image"], $_POST["like-unlike"], $_POST["opinion"], $_POST["brewery-id"]);
$rate->rateBrewery();

