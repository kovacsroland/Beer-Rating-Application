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
            include_once '../php/GetDataOfBeer.php';
            $beer = new GetDataOfBeer($_POST["beer-id"]);
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
                <div class="container custom-form2 mt-5">
                    <form action="../php/BeerEdit.php" method="post">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h3><?php echo $beer->getBeer()['beer_name']." Sör Szerkesztése";?></h3>
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
                                <h6 class="float-left">Sörfőzde</h6>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01" name="brewery">
                                        <option class='bg-success' value="<?php echo $beer->getBeer()['brewery_ID']?>" selected><?php echo $beer->getBeer()['brewery_name']; ?></option>
                                        <?php
                                            include_once '../php/CreateOptionsFromDB.php';
                                            $options = new CreateOptionsFromDB("breweries", "brewery_ID", "brewery_name");
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <h6 class="float-left">Sör neve</h6>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="<?php echo $beer->getBeer()['beer_name']; ?>" name="beer" id="beer" maxlength="20" aria-label="beer" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <h6 class="float-left">Típus</h6>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01" name="category">
                                        <option class='bg-success' value="<?php echo $beer->getBeer()['category_ID']?>" selected><?php echo $beer->getBeer()['category_name']; ?></option>
                                        <?php
                                            include_once '../php/CreateOptionsFromDB.php';
                                            $options = new CreateOptionsFromDB("categories", "category_ID", "category_name");
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <h6 class="float-left">Üveg típusa</h6>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01" name="glass">
                                        <option class='bg-success' value="<?php echo $beer->getBeer()['glass_ID']?>" selected><?php echo $beer->getBeer()['glass_type']; ?></option>
                                        <?php
                                            include_once '../php/CreateOptionsFromDB.php';
                                            $options = new CreateOptionsFromDB("glasses", "glass_ID", "glass_type");
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 text-center mt-3">
                                <h6 class="float-left">ABV</h6>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="<?php echo $beer->getBeer()['ABV']." %"; ?>" name="ABV" id="ABV" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-6 col-md-3 text-center mt-3">
                                <h6 class="float-left">IBU</h6>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" placeholder="<?php echo $beer->getBeer()['IBU']; ?>" name="IBU" id="IBU" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-6 col-md-3 text-center mt-3">
                                <h6 class="float-left">EBC</h6>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" placeholder="<?php echo $beer->getBeer()['EBC']; ?>" name="EBC" id="EBC" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-6 col-md-3 text-center mt-3">
                                <h6 class="float-left">Űrtartalom</h6>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01" name="capacity">
                                        <option class='bg-success' value="<?php echo $beer->getBeer()['capacity']; ?>" selected><?php echo $beer->getBeer()['capacity']."L"; ?></option>
                                        <option value="0.25">0.25L - 250ml</option>
                                        <option value="0.33">0.33L - 330ml</option>
                                        <option value="0.355">0.355L - 355ml</option>
                                        <option value="0.375">0.375L - 375ml</option>
                                        <option value="0.4">0.4L - 400ml</option>
                                        <option value="0.5">0.5L - 500ml</option>
                                        <option value="0.66">0.66L - 660ml</option>
                                        <option value="0.75">0.75L - 750ml</option>
                                        <option value="1.0">1L - 1000ml</option>
                                        <option value="1.5">1.5L - 1500ml</option>
                                        <option value="2.0">2L - 2000ml</option>
                                        <option value="5.0">5L - 5000ml</option>
                                        <option value="10.0">10L</option>
                                        <option value="20.0">20L</option>
                                        <option value="25.0">25L</option>
                                        <option value="30.0">30L</option>
                                        <option value="40.0">40L</option>
                                        <option value="50.0">50L</option>
                                        <option onclick="">Egyéb</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="Adja meg az űrmértéket!" name=""  id="liter" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-6 text-center mt-3">
                                <h6 class="float-left">Hőmérséklet</h6>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control"  placeholder="<?php echo $beer->getBeer()['serving_temp']; ?>" name="temperature" id="temperature" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-6 text-center mt-3">
                                <h6 class="float-left">Bemutatás ideje</h6>
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control" value="<?php echo $beer->getBeer()['making_tmp']; ?>" name="making-tmp" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 text-center mt-5 mb-3">
                                <div class="input-group mb-3">
                                    <input type="hidden" name="beer-id" value="<?php echo $beer->getBeer()['beer_ID']; ?>">
                                    <input type="submit" class="form-control btn btn-success btn-block" onclick="setData()" value="Változtatások mentése" aria-describedby="basic-addon1">
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
