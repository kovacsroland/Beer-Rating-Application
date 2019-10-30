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
                <div class="container mt-5 mb-5 custom-form2">
                    <form action="../php/UploadNewBeer.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 text-center mt-3">
                                <h3>Új Sör Feltöltése</h3>
                            </div>
                            <div class="col-12 text-center mt-2 mb-3">
                                <div class='row'>
                                    <div class='col-4'>
                                        <hr>
                                    </div>
                                    <div class='col-4'>
                                        <img src="../img/BackgroundImages/beer.ico" class="img-fluid rounded">
                                    </div>
                                    <div class='col-4'>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01" name="brewery">
                                        <option selected>Sörfőzde</option>
                                        <?php
                                        include_once '../php/CreateOptionsFromDB.php';
                                        $options = new CreateOptionsFromDB("breweries", "brewery_ID", "brewery_name");
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Sör neve" name="beer" aria-label="beer" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01" name="category">
                                        <option selected>Sör típusa</option>
                                        <?php
                                        include_once '../php/CreateOptionsFromDB.php';
                                        $options = new CreateOptionsFromDB("categories", "category_ID", "category_name");
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="capacity" onchange="optionsToText(this.options[this.selectedIndex])" name="capacity">
                                        <option selected>Űrtartalom</option>
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
                                        <option value="Egyéb">Egyéb</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="Adja meg a sör űrmértékét ml-ben!" name="capacity"  id="liter" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01" name="glass">
                                        <option selected>Üveg típusa</option>
                                        <?php
                                        include_once '../php/CreateOptionsFromDB.php';
                                        $options = new CreateOptionsFromDB("glasses", "glass_ID", "glass_type");
                                        ?>
                                    </select>
                                    <i class="fas fa-image bg-icon" onclick="showBeerTypesImage()"></i>
                                    <div id='myModal' class='pt-5 bg-dark text-light'>
                                        <h3 onclick="hideBeerTypesImage()"><i class="fas fa-times"></i></h3>
                                        <img src="../img/BackgroundImages/types-of-beer-glasses.jpg" class="img-fluid rounded">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mt-3">
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" placeholder="From" name="from" min="0" max="20" aria-label="from" aria-describedby="basic-addon1">
                                    <input type="text" class="form-control text-center" placeholder="-" disabled  aria-label="-" aria-describedby="basic-addon1">
                                    <input type="number" class="form-control" placeholder="To" name="to" min="4" max="24" aria-label="to" aria-describedby="basic-addon1">
                                    <select class="custom-select" id="inputGroupSelect01" name="degree">
                                        <option selected>°C</option>
                                        <option>°K</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Íz: (Kérjük jellemezd pár szóval)" name="taste" aria-label="taste" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Szín: (Kérjük jellemezd pár szóval)" name="color" aria-label="color" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Hab: (Kérjük jellemezd pár szóval)" name="foam" aria-label="foam" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Illat: (Kérjük jellemezd pár szóval)" name="smell" aria-label="smell" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-md-4 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="ABV(Alkoholszázalék)" name="ABV" aria-label="ABV" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-md-4 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="IBU(Keserűség)" name="IBU" aria-label="IBU" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-md-4 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="EBC(Szín)" name="EBC" aria-label="EBC" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control"  name="making-tmp" aria-label="making-tmp" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input image" id="fileInput" name="image" multiple onchange="editLabel()" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01" id="fileLabel">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-3 profile-picture" id="profile">
                                <img id="profile_pic" src="#" class="img-fluid rounded" alt="Your profile picture">
                            </div>
                            <div class="col-12 text-center mt-3">
                                <div class="input-group mb-3">
                                    <textarea class="form-control" placeholder="Leírás: (Vigyázzon nem személyes vélemény! Maradjon szubjektív. Köszönjük.)" rows="5" id="description" name="description"></textarea>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-3">
                                <a href="NewBrewery.php">Nem találtad a listában a söfőzdét? Segíts a bővitésükben!</a>
                            </div>
                            <div class="col-12 text-center mt-3 mb-5">
                                <input type="submit" class="btn btn-block btn-success">
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
