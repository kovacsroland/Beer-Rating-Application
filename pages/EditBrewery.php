<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
            include_once './Header.php';
        ?>
    </head>
    <body>
        <?php
            include_once '../php/GetDataOfBrewery.php';
            $brewery = new GetDataOfBrewery($_POST["brewery-id"]);
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
                <div class="container custom-form2 mt-5 mb-5">
                    <form action="../php/BreweryEdit.php" method="post">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h3><?php echo $brewery->getBrewery()['brewery_name']." Szerkesztése";?></h3>
                            </div>
                            <div class="col-12 text-center mt-2 mb-3">
                                <div class='row'>
                                    <div class='col-4'>
                                        <hr>
                                    </div>
                                    <div class='col-4'>
                                        <img src="../img/BackgroundImages/beer.ico" class="img-fluid">
                                    </div>
                                    <div class='col-4'>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <h6 class="float-left">Sörfőzde neve</h6>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="<?php echo $brewery->getBrewery()['brewery_name']; ?>" name="brewery" id="brewery" maxlength="20" aria-label="brewery" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <h6 class="float-left">Ország</h6>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01" name="country">
                                        <option class='bg-success' value="<?php echo $brewery->getBrewery()['country_ID']; ?>" selected><?php echo $brewery->getBrewery()['country_name']; ?></option>
                                        <?php
                                            include_once '../php/CreateOptionsFromDB.php';
                                            $options = new CreateOptionsFromDB("countries", "country_ID", "country_name");
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <h6 class="float-left">Facebook név</h6>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="<?php echo $brewery->getBrewery()['facebook_link']; ?>" name="facebook" id="facebook" maxlength="20" aria-label="facebook" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <h6 class="float-left">Instagram név</h6>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="<?php echo $brewery->getBrewery()['instagram_name']; ?>" name="instagram" id="instagram" maxlength="20" aria-label="instagram" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <h6 class="float-left">Twitter név</h6>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="<?php echo $brewery->getBrewery()['twitter_name']; ?>" name="twitter" id="twitter" maxlength="20" aria-label="twitter" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <h6 class="float-left">Honlap címe</h6>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="<?php echo $brewery->getBrewery()['website']; ?>" name="website" id="website" maxlength="20" aria-label="website" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 text-center mt-3">
                                <h6 class="float-left">Címe</h6>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="<?php echo $brewery->getBrewery()['place']; ?>" name="place" id="place" maxlength="20" aria-label="place" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 text-center mt-3">
                                <h6 class="float-left">Alakulás</h6>
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control" value="<?php echo $brewery->getBrewery()['introduced_date']; ?>" name="introduced-date" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 text-center mt-5 mb-3">
                                <div class="input-group mb-3">
                                    <input type="hidden" name="brewery-id" value="<?php echo $brewery->getBrewery()['brewery_ID']; ?>">
                                    <input type="submit" class="form-control btn btn-success btn-block" onclick="setData2()" value="Változtatások mentése" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
            include_once './Footer.php';
        ?>
    </body>
</html>
