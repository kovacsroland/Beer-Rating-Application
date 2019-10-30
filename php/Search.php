<?php

include_once 'DatabaseConnection.php';

class Search {

    private $searched, $i;
    
    public function __construct($searched) {
        $this->setSearched($searched);
    }

    function getSearched() {
        return $this->searched;
    }
    
    function getI() {
        return $this->i;
    }

    function setSearched($searched) {
        $this->searched = $searched;
    }
    
    function setI($i) {
        $this->i = $i;
    }

    public function editBeerImage($beerName, $image) {
        return "../img/Beers/" . $beerName . "/BeerList/" . $image;
    }
    
    public function editBreweryImage($breweryName, $image) {
        return "../img/Breweries/" . $breweryName . "/BreweryList/" . $image;
    }

    public function searchingBeer() {
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $query = "SELECT *,beers.description AS beer_description,beers.image AS image FROM beers INNER JOIN breweries ON beers.brewery_ID = breweries.brewery_ID INNER JOIN glasses ON beers.glass_ID = glasses.glass_ID" .
                    " INNER JOIN categories ON beers.category_ID = categories.category_ID WHERE beer_name LIKE '%" . $this->getSearched() . "%';";
            $result = mysqli_query($connection->getConnection(), $query);
            $i = 0;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col-12 custom-form text-center mb-3 mt-3'>
                    <div class='row  text-center'>
                     <div class='col-12 col-md-3'>" .
                    '<img src="' . $this->editBeerImage($row["beer_name"], $row["image"]) . '" alt="' . $row['beer_name'] . '" class="img-fluid rounded">' .
                    "</div>
                    <div class='col-12 col-md-9 mt-3'>
                    <form id='submit" . $i . "' action='../pages/BeerPage.php' method='post'>
                        <input type='hidden' name='beer-id' value='" . $row['beer_ID'] . "' >
                        <h3><a href='javascript:{}' name='submit" . $i++ . "' onclick='submitFunction(this)'>" . $row['beer_name'] . " (" . $row['add_tmp'] . ")" . "</a></h3>
                    </form>
                    <form id='submit" . $i . "' action='../pages/BreweryPage.php' method='post'>
                        <input type='hidden' name='brewery-id' value='" . $row['brewery_ID'] . "' >
                        <p><a href='javascript:{}' name='submit" . $i++ . "' onclick='submitFunction(this)'>" . $row['brewery_name'] . "</a></p>
                    </form>
                    <p class='type'>" . $row["category_name"] . "</p>";
                    if (strlen($row["beer_description"]) > 150) {
                        echo "<p>" . substr($row["beer_description"], 0, 149) . "...</p>";
                    } else {
                        echo "<p>" . $row["beer_description"] . "</p>";
                    }
                    echo "</div>"
                    . "<div class='col-12'><hr></div>"
                    . "<div class='col-12'>"
                    . "<div class='row'>"
                    . "<div class='col-4 col-md-2 right-border'>ABV: " . $row["ABV"] . " %</div>"
                    . "<div class='col-2 right-border d-none d-md-block'>IBU: " . $row["IBU"] . "</div>"
                    . "<div class='col-2 right-border d-none d-md-block'>EBC: " . $row["EBC"] . "</div>"
                    . "<div class='col-4 col-md-3 right-border'>Fogyasztási hőmérséklet: " . $row["serving_temp"] . "</div>"
                    . "<div class='col-4 col-md-3'>Hozzáadva: " . $row["add_tmp"] . "</div>"
                    . "</div>"
                    . "</div>"
                    . "</div>"
                    . "</div>";
                }
                $this->setI($i);
            } else {
                echo "";
            }
        } else {
            echo "Nem sikerült csatlakozni";
        }
    }

    public function searchingBrewery() {
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $query = "SELECT * FROM breweries INNER JOIN countries ON breweries.country_ID = countries.country_ID WHERE brewery_name LIKE '%" . $this->getSearched() . "%';";
            $result = mysqli_query($connection->getConnection(), $query);
            $i = $this->getI();
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='col-12 custom-form text-center mb-3 mt-3'>
                    <div class='row  text-center'>
                     <div class='col-12 col-md-3'>" .
                    '<img src="' . $this->editBreweryImage($row["brewery_name"], $row["image"]) . '" alt="' . $row['brewery_name'] . '" class="img-fluid rounded">' .
                    "</div>
                    <div class='col-12 col-md-9 mt-3'>
                    <form id='submit" . $i . "' action='../pages/BreweryPage.php' method='post'>
                        <input type='hidden' name='brewery-id' value='" . $row['brewery_ID'] . "' >
                        <h3><a href='javascript:{}' name='submit" . $i++ . "' onclick='submitFunction(this)'>" . $row['brewery_name'] . "</a></h3>
                    </form>";
                    if (strlen($row["description"]) > 150) {
                        echo "<p>" . substr($row["description"], 0, 149) . "...</p>";
                    } else {
                        echo "<p>" . $row["description"] . "</p>";
                    }
                    echo "<hr class='line'>"
                    ."<p>".$row['place']."</p>"
                    ."</div>"
                    . "<div class='col-12'><hr></div>"
                    . "<div class='col-12'>"
                    . "<div class='row'>"
                    . "<div class='col-2 d-none d-md-block right-border'><i class='fas fa-thumbs-up text-success'></i>  : " . $row["all_like"] . " </div>"
                    . "<div class='col-2 right-border d-none d-md-block'><i class='fas fa-thumbs-down text-danger'></i>  : " . $row["all_unlike"] . "</div>"
                    . "<div class='col-4 col-md-2 right-border'>Sörök: " . $row["beers_count"] . "</div>"
                    . "<div class='col-4 col-md-3 right-border'>Alakulás: " . $row["introduced_date"] . "</div>"
                    . "<div class='col-4 col-md-3'>Hozzáadva: " . $row["adding_tmp"] . "</div>"
                    . "</div>"
                    . "</div>"
                    . "</div>"
                    . "</div>";
                }
            } else {
                echo "";
            }
        } else {
            echo "Nem sikerült csatlakozni";
        }
    }

}
