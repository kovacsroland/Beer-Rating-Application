<?php

include_once 'DatabaseConnection.php';

class BeerRating {

    private $overall, $taste, $color, $foam, $smell, $image, $like_unlike, $opinion, $beer;

    public function __construct($overall, $taste, $color, $foam, $smell, $image, $like_unlike, $opinion, $beer) {
        $this->setOverall($overall);
        $this->setTaste($taste);
        $this->setColor($color);
        $this->setFoam($foam);
        $this->setSmell($smell);
        $this->setImage($image);
        $this->setLike_unlike($like_unlike);
        $this->setOpinion($opinion);
        $this->setBeer($beer);
    }

    function getOverall() {
        return $this->overall;
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

    function getImage() {
        return $this->image;
    }

    function getLike_unlike() {
        return $this->like_unlike;
    }

    function getOpinion() {
        return $this->opinion;
    }

    function getBeer() {
        return $this->beer;
    }

    function setOverall($overall) {
        $this->overall = $overall;
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

    function setImage($image) {
        $this->image = $image;
    }

    function setLike_unlike($like_unlike) {
        $this->like_unlike = $like_unlike;
    }

    function setOpinion($opinion) {
        $this->opinion = $opinion;
    }

    function setBeer($beer) {
        $this->beer = $beer;
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
            $query = "SELECT beer_rating_ID FROM beers_ratings ORDER BY beer_rating_ID DESC LIMIT 1";
            $result = mysqli_query($connection->getConnection(), $query);
            $row = mysqli_fetch_assoc($result);
        }
        if ($this->getImage()['type'] == 'image/jpeg' || $this->getImage()['type'] == 'image/jpg' || $this->getImage()['type'] == 'image/png') {
            if ($this->getImage()['size'] <= (1024 * 1024 * 3)) {
                $dir = "../img/Ratings/Beers Ratings/" . $row['beer_rating_ID'] . "/";
                if (!file_exists($dir)) {
                    mkdir($dir, 0777, true);
                }
                $file_destination = "../img/Ratings/Beers Ratings/" . $row['beer_rating_ID'] . "/". $this->getImage()['name'];
                echo $file_destination;
                echo "fájlméret ok<br>";
                move_uploaded_file($this->getImage()['tmp_name'], $file_destination);
            }
        }
    }

    public function isRateable() {

        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $query = "SELECT * FROM beers_ratings WHERE profile_ID = (SELECT profile_ID FROM profiles WHERE username = '" . $_COOKIE['username'] . "') AND beer_ID = " . $this->getBeer();
            $result = mysqli_query($connection->getConnection(), $query);
            if (mysqli_num_rows($result) > 0) {
                return false;
            } else {
                return true;
            }
        }
    }

    public function rateBeer() {
        if ($this->isRateable()) {
            $connection = new DatabaseConnection();
            if ($connection->connectDB()) {
                $query = "INSERT INTO beers_ratings (beer_rating_ID, profile_ID, beer_ID, taste_point, color_point, foam_point, smell_point, overall_point, like_unlike, rating_tmp, image, opinion)"
                        . " VALUES('', (SELECT profile_ID FROM profiles WHERE username = '" . $_COOKIE['username'] . "'), " . $this->getBeer() . ", " . $this->getTaste() . ", " . $this->getColor() . ", " . $this->getFoam() . ", " . $this->getSmell() . ", " . $this->getOverall() . ", " . $this->getLike_unlike() . ", CURRENT_TIMESTAMP, '" . $this->getImage()['name'] . "', '" . $this->getOpinion() . "'); "
                        . "UPDATE beers SET overall_taste_point = overall_taste_point + " . $this->getTaste() . ", overall_color_point = overall_color_point + " . $this->getColor() . ", overall_foam_point = overall_foam_point + " . $this->getFoam() . ", overall_smell_point = overall_smell_point + " . $this->getSmell() . ", overall_rating_point = overall_rating_point + " . $this->getOverall() . ", rating_count = rating_count + 1, " . $this->likeUnlike($this->getLike_unlike()) . " WHERE beer_ID = " . $this->getBeer() . ";"
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

$rate = new BeerRating($_POST["overall"], $_POST["taste"], $_POST["color"], $_POST["foam"], $_POST["smell"], $_FILES["image"], $_POST["like-unlike"], $_POST["opinion"], $_POST["beer-id"]);
$rate->rateBeer();
