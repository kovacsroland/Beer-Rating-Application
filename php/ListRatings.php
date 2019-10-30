<?php

include_once 'DatabaseConnection.php';

class ListRatings {
    
    private $id, $basedon;

    public function __construct($id, $basedon) {
        $this->setId($id);
        $this->setBasedon($basedon);
    }
    
    function getId() {
        return $this->id;
    }

    function getBasedon() {
        return $this->basedon;
    }

    function setId($id) {
        $this->id = $id;
    }
    
    public function likeOrUnlike($likeunlike){
        if($likeunlike == 0){
            return "<i class='fas fa-thumbs-down text-danger'></i>";
        }else{
            return "<i class='fas fa-thumbs-up text-success'></i>";
        }
    }

    function setBasedon($basedon) {
        if($basedon == "profile"){
            $this->basedon = "profile_ID = ";
        }else if($basedon == "beer"){
            $this->basedon = "beer_ID = ";
        }else if($basedon == "brewery"){
            $this->basedon = "brewery_ID = ";
        }
        
    }

    public function editRatingImage($id, $image, $rating) {
        return "../img/Ratings/".$rating."/".$id."/".$image;
    }
    
    public function editProfilePicture($username, $image){
        if($image != ""){
            return "../img/Profiles/".md5($username)."/".$image;
        }else{
            return "../img/Profiles/Default Profile/Default Profile.png";
        }
    }

    public function listRatingsHeader(){
        echo "<div class='container-fluid custom-form2 mb-5 mt-3'>
                <div class='col-12 no-space'>
                     <div class='col-12 text-center'>
                        <h3>Értékelések</h3>
                    </div>
                </div>
             </div>";
    }
    
    public function noRatings(){
        echo "<div class='container-fluid custom-form2 mb-5 mt-3'>
                <div class='col-12 no-space'>
                     <div class='col-12 text-center'>
                        <h3>Még nincsenek értékelések.</h3>
                    </div>
                </div>
             </div>";
    }
    
    public function listBeerRatings() {
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $query = "SELECT *,beers_ratings.image AS image FROM beers_ratings INNER JOIN beers ON beers_ratings.beer_ID = beers.beer_ID INNER JOIN profiles ON beers_ratings.profile_ID = profiles.profile_ID WHERE beers_ratings.".$this->getBasedon($this->getBasedon()).$this->getId();
            $this->getBasedon().$this->getId();
            $result = mysqli_query($connection->getConnection(), $query);
            $i = 0;
            $x = 1000;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col-12 custom-form text-center mb-3 mt-3'>
                    <div class='row  text-center'>
                     <div class='col-12 col-md-3'>" .
                    '<img src="' . $this->editProfilePicture($row["username"], $row['profile_pic']) . '" alt="' . $row['username'] . '" class="img-fluid rounded">' .
                    "</div>
                    <div class='col-12 col-md-9 mt-3'>
                    <form id='submit" . $i . "' action='../pages/BeerPage.php' method='post'>
                        <input type='hidden' name='brewery-id' value='" . $row['beer_ID'] . "' >
                        <h3><a href='javascript:{}' name='submit" . $i++ . "' onclick='submitFunction(this)'>" . $row['beer_name'] . "</a></h3>
                    </form>".
                    "<form id='submit" . $x . "' action='../pages/ProfilePage.php' method='post'>
                        <input type='hidden' name='profile-id' value='" . $row['profile_ID'] . "' >
                        <p><a href='javascript:{}' name='submit" . $x++ . "' onclick='submitFunction(this)'>" . $row['username'] . "</a></p>
                    </form>".
                    
                    '<img src="'.$this->editRatingImage($row['beer_rating_ID'], $row['image'], "Beers Ratings").'" alt="Rating Image" class="img-fluid rounded rating-img">';
                    echo "</div>"
                    . "<div class='col-12'><hr class='line'></div>"
                    . "<div class='col-12 text-center overflow-auto'>"
                    . "<h4 class='float-left'>Értékelve: ".$row['rating_tmp']."</h4>"
                    . "<p class='mt-5 mb-5 pt-3 text-center'>".$row['opinion']."</p>"        
                    . "</div>"
                    . "<div class='col-12'><hr class='line'></div>"
                    . "<div class='col-12'>"
                    . "<div class='row'>"
                    . "<div class='col-4 col-md-2 mt-3 right-border'>".$this->likeOrUnlike($row['like_unlike'])."</div>"
                    . "<div class='col-4 col-md-2 mt-3 right-border'>Íz: ".$row["taste_point"]."</div>"
                    . "<div class='col-4 col-md-2 mt-3 right-border'>Illat: " . $row["smell_point"] . "</div>"
                    . "<div class='col-4 col-md-2 mt-3 right-border'>Hab: " . $row["color_point"] . "</div>"
                    . "<div class='col-4 col-md-2 mt-3 right-border'>Szín: " . $row["color_point"] . "</div>"
                    . "<div class='col-4 col-md-2 mt-3 '>Össz: " . $row["overall_point"] . "</div>"
                    . "</div>"
                    . "</div>"
                    . "</div>"
                    . "</div>";
                }
            } else {
                $this->noRatings();
            }
        } else {
            echo "Nem sikerült csatlakozni";
        }
    }
    public function listBreweryRatings() {
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $query = "SELECT *,brewery_ratings.image AS image FROM brewery_ratings INNER JOIN breweries ON brewery_ratings.brewery_ID = breweries.brewery_ID INNER JOIN profiles ON brewery_ratings.profile_ID = profiles.profile_ID WHERE brewery_ratings.".$this->getBasedon($this->getBasedon()).$this->getId();
            $result = mysqli_query($connection->getConnection(), $query);
            $i = 0;
            $x = 1000;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col-12 custom-form text-center mb-3 mt-3'>
                    <div class='row  text-center'>
                     <div class='col-12 col-md-3'>" .
                    '<img src="' . $this->editProfilePicture($row["username"], $row['profile_pic']) . '" alt="' . $row['username'] . '" class="img-fluid rounded">' .
                    "</div>
                    <div class='col-12 col-md-9 mt-3'>
                    <form id='submit" . $i . "' action='../pages/BeerPage.php' method='post'>
                        <input type='hidden' name='brewery-id' value='" . $row['brewery_ID'] . "' >
                        <h3><a href='javascript:{}' name='submit" . $i++ . "' onclick='submitFunction(this)'>" . $row['brewery_name'] . "</a></h3>
                    </form>".
                    "<form id='submit" . $x . "' action='../pages/ProfilePage.php' method='post'>
                        <input type='hidden' name='profile-id' value='" . $row['profile_ID'] . "' >
                        <p><a href='javascript:{}' name='submit" . $x++ . "' onclick='submitFunction(this)'>" . $row['username'] . "</a></p>
                    </form>".
                    
                    '<img src="'.$this->editRatingImage($row['brewery_rating_ID'], $row['image'], "Brewery Ratings").'" class="img-fluid rounded rating-img">';
                    echo "</div>"
                    . "<div class='col-12'><hr class='line'></div>"
                    . "<div class='col-12 text-center'>"
                    . "<h4 class='float-left'>Értékelve: ".$row['rating_tmp']."<h4>"
                    . "<p class='mt-5 mb-5 pt-3'>".$row['opinion']."</p>"        
                    . "</div>"
                    . "<div class='col-12'><hr class='line'></div>"
                    . "<div class='col-12'>"
                    . "<div class='row'>"
                    . "<div class='col-6 mt-3 right-border'>".$this->likeOrUnlike($row['like_unlike'])."</div>"
                    . "<div class='col-6 mt-3'>Értékelés: ".$row["rating"]."</div>"
                    . "</div>"
                    . "</div>"
                    . "</div>"
                    . "</div>";
                }
            } else {
                $this->noRatings();
            }
        } else {
            echo "Nem sikerült csatlakozni";
        }
    }

}
