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
                    <form action="../php/UploadNewBrewery.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 text-center mt-3">
                                <h3>Új Sörfőzde Feltöltése</h3>
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
                                    <input type="text" class="form-control" placeholder="Sörfőzde neve" name="brewery" aria-label="brewery" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01" name="country">
                                        <option selected>Ország</option>
                                        <?php
                                        include_once '../php/CreateOptionsFromDB.php';
                                        $options = new CreateOptionsFromDB("countries", "country_ID", "country_name");
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Facebook név" name="facebook" id="facebook" maxlength="20" aria-label="facebook" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Instagram név" name="instagram" id="instagram" maxlength="20" aria-label="instagram" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Twitter név" name="twitter" id="twitter" maxlength="40" aria-label="twitter" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Honlap címe" name="website" id="website" maxlength="40" aria-label="website" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Címe" name="place" id="place" maxlength="40" aria-label="place" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control" value="" name="introduced-date" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-md-8 text-center mt-3">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input image" id="fileInput" name="image" multiple onchange="editLabel()" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01" id="fileLabel">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" placeholder="Söreinek száma" name="beer-count" id="beer-count" maxlength="20" aria-label="beer-count" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 text-center mt-3 profile-picture" id="profile">
                                <img id="profile_pic" src="#" class="img-fluid rounded" alt="Your profile picture">
                            </div>
                            <div class="col-12 text-center mt-3">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check float-right">
                                            <input class="form-check-input" type="radio" name="active" id="exampleRadios1" value="1" checked>
                                            <label class="form-check-label radio-inline" for="exampleRadios1">
                                                Aktív
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check float-left">
                                            <input class="form-check-input" type="radio" name="active" id="exampleRadios2" value="0">
                                            <label class="form-check-label radio-inline" for="exampleRadios2">
                                                Inaktív
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-3">
                                <div class="input-group mb-3">
                                    <textarea class="form-control" placeholder="Leírás: (Vigyázzon nem személyes vélemény! Maradjon szubjektív. Köszönjük.)" rows="5" id="description" name="description"></textarea>
                                </div>
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
