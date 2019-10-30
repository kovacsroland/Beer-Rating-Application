<!DOCTYPE html>
<html>
    <head>
        <?php
        include_once './Header.php';
        ?>
    </head>
    <body>
        <?php
        include_once '../php/GetDataOfBrewery.php';
        $breweryData = new GetDataOfBrewery($_POST['brewery-id']);
        ?>
        <div class="container-fluid">
            <div class="col-12 no-space">
                <div class="row">
                    <div class="col-12 no-space">
                        <?php
                        include_once './Navbar.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-12 no-space">
                <div class="container text-center mt-5 custom-form2 mb-5">
                    <div class="row">
                        <div class="col-12">
                            <h3><?php echo $breweryData->getBrewery()['brewery_name']; ?></h3>
                            <h4><?php echo $breweryData->getBrewery()['country_name']; ?></h4>
                        </div>
                        <div class="col-4 mt-5 mb-5 text-center">
                            <hr class="mt-5 d-none d-md-block">
                        </div>
                        <div class="col-12 col-md-4 mb-5 mt-3 text-center">
                            <img src="<?php echo $breweryData->getImage($breweryData->getBrewery()['brewery_name'], $breweryData->getBrewery()['image']); ?>" class="img-fluid rounded">
                        </div>
                        <div class="col-4 mt-5 mb-5 text-center">
                            <hr class="mt-5 d-none d-md-block">
                        </div>
                        <div class="col-12 col-lg-8 pt-3 pb-3 text-center border">
                            <h3 class="mt-3"><?php echo $breweryData->getBrewery()['place']; ?></h3>
                        </div>
                        <div class="col-12 col-lg-4 pt-4 pb-3 text-center border">
                            <a href="https://www.facebook.com/<?php echo $breweryData->getBrewery()['facebook_link']; ?>"  target="_blank"><i class="fab fa-facebook-f bg-icon"></i></a>
                            <a href="https://www.instagram.com/<?php echo $breweryData->getBrewery()['instagram_name']; ?>" target="_blank"><i class="fab fa-instagram bg-icon"></i></a>
                            <a href="https://twitter.com/<?php echo $breweryData->getBrewery()['twitter_name']; ?>" target="_blank"><i class="fab fa-twitter bg-icon"></i></a>
                            <a href="<?php echo $breweryData->getBrewery()['website']; ?>" target="_blank"><i class="fas fa-passport bg-icon"></i></a>
                        </div>
                        <div class="col-12 col-lg-4 border">
                            <div class="row">
                                <div class="col-12 border-bottom mt-3 mb-3 pt-2 pb-2">
                                    <h3><i class="fas fa-thumbs-up text-success"></i> : <?php echo $breweryData->getBrewery()['all_like']; ?></h3>
                                </div>
                                <div class="col-12 pb-2">
                                    <h3>Söreinek száma: <?php echo $breweryData->getBrewery()['beers_count']; ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 border">
                            <div class="row">
                                <div class="col-12 border-bottom mt-3 mb-3 pt-2 pb-2">
                                    <h3><i class="fas fa-thumbs-down text-danger"></i> : <?php echo $breweryData->getBrewery()['all_unlike']; ?></h3>
                                </div>
                                <div class="col-12">
                                    <h3>Értékelések: <?php echo $breweryData->getBrewery()['rating_count']; ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 border">
                            <div class="row">
                                <div class="col-12 border-bottom mt-3 mb-3 pt-2 pb-2">
                                    <h3><?php echo $breweryData->isActive($breweryData->getBrewery()['active']); ?></h3>
                                </div>
                                <div class="col-12">
                                    <h3><?php echo $breweryData->stars($breweryData->getBrewery()['rating_overall'], $breweryData->getBrewery()['rating_count']); ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 pt-3 pb-2 text-center border">
                            <h3>Alakulás:</h3>
                        </div>
                        <div class="col-12 col-lg-3 pt-3 pb-2 text-center border">
                            <h3><?php echo $breweryData->getBrewery()['introduced_date']; ?></h3>
                        </div>
                        <div class="col-12 col-lg-3 pt-3 pb-2 text-center border">
                            <h3>Hozzáadva:</h3>
                        </div>
                        <div class="col-12 col-lg-3 pt-3 pb-2 text-center border">
                            <h3><?php echo $breweryData->getBrewery()['adding_tmp']; ?></h3>
                        </div>
                        <div class="col-12 mt-5 text-center">
                            <p><?php echo $breweryData->getBrewery()['description']; ?></p>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="row">
                                <div class="col-12 col-md-6 mt-3 mb-3">
                                    <form action="EditBrewery.php" method="post">
                                        <input type='hidden' name='brewery-id' value='<?php echo $breweryData->getBrewery()['brewery_ID']; ?>'>
                                        <input type="submit" class="btn btn-success btn-block" value="Szerkeszt">
                                    </form>
                                </div>
                                <div class="col-12 col-md-6 mt-3 mb-3">
                                    <form action="RateBrewery.php" method="post">
                                        <input type='hidden' name='brewery-id' value='<?php echo $breweryData->getBrewery()['brewery_ID']; ?>'>
                                        <input type="submit" class="btn btn-success btn-block" value="Értékel">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mb-5 mt-3">
            <div class="col-12 no-space">
                <div class="container text-center mt-5">
                    <div class="row">
                        <?php
                        include_once '../php/ListRatings.php';
                        $list = new ListRatings($breweryData->getBrewery()['brewery_ID'], "brewery");
                        $list->listRatingsHeader();
                        $list->listBreweryRatings();
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
            include_once './Footer.php';
        ?>
    </body>
</html>
