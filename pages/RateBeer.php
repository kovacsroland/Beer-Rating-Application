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
        $beer = new GetDataOfBeer($_POST['beer-id']);
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
                    <form action="../php/BeerRating.php" method="post" id="form1" runat="server" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h3><?php echo $beer->getBeer()['beer_name'] . " Sör Értékelése"; ?></h3>
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
                            <div class="col-12 text-center mt-5 d-none d-md-block">
                                <h3 class="float-left">Össz:</h3>
                                <span class="fa fa-star bg-icon" id="0" onclick="rating(this)"></span>
                                <span class="fa fa-star bg-icon" id="1" onclick="rating(this)"></span>
                                <span class="fa fa-star bg-icon" id="2" onclick="rating(this)"></span>
                                <span class="fa fa-star bg-icon" id="3" onclick="rating(this)"></span>
                                <span class="fa fa-star bg-icon" id="4" onclick="rating(this)"></span>
                                <span class="fa fa-star bg-icon" id="5" onclick="rating(this)"></span>
                                <span class="fa fa-star bg-icon" id="6" onclick="rating(this)"></span>
                                <span class="fa fa-star bg-icon" id="7" onclick="rating(this)"></span>
                                <span class="fa fa-star bg-icon" id="8" onclick="rating(this)"></span>
                                <span class="fa fa-star bg-icon" id="9" onclick="rating(this)"></span>
                                <input type="hidden" value="" id="rate" name="overall">
                            </div>
                            <div class="col-12 text-center mt-5">
                                <div class="form-group">
                                    <h3 class="float-left"><strong>Íz:</strong></h3>
                                    <label for="formControlRange" class="float-right"></label>
                                    <input type="range" min="1" max="100" value="50" class="form-control-range slider" name="taste" id="formControlRange" onmousedown="showValue(this)">
                                </div>
                            </div>
                            <div class="col-12 text-center mt-3">
                                <div class="form-group">
                                    <h3 class="float-left"><strong>Szín:</strong></h3>
                                    <label for="formControlRange" class="float-right"></label>
                                    <input type="range" min="1" max="100" value="50" class="form-control-range slider" name="color" id="formControlRange2" onmousedown="showValue(this)">
                                </div>
                            </div>
                            <div class="col-12 text-center mt-3">
                                <div class="form-group">
                                    <h3 class="float-left"><strong>Hab:</strong></h3>
                                    <label for="formControlRange" class="float-right"></label>
                                    <input type="range" min="1" max="100" value="50" class="form-control-range slider" name="foam" id="formControlRange3" onmousedown="showValue(this)">
                                </div>
                            </div>
                            <div class="col-12 text-center mt-3">
                                <div class="form-group">
                                    <h3 class="float-left"><strong>Illat:</strong></h3>
                                    <label for="formControlRange" class="float-right"></label>
                                    <input type="range" min="1" max="100" value="50" class="form-control-range slider" name="smell" id="formControlRange4" onmousedown="showValue(this)">
                                </div>
                            </div>
                            <div class="col-12 text-center mt-5">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input image" id="fileInput" name="image" multiple onchange="editLabel()" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01" id="fileLabel">Tölts fel egy képet!</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-3 profile-picture" id="profile">
                                <img id="profile_pic" src="#" class="img-fluid rounded" alt="Your profile picture">
                            </div>
                            <div class="col-12 text-center mt-5">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check float-right">
                                            <input class="form-check-input like-unlike" type="radio" name="like-unlike" id="exampleRadios1" value="1" checked>
                                            <label class="form-check-label radio-inline" for="exampleRadios1">
                                                <i class="fas fa-thumbs-up text-success bg-icon"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check float-left">
                                            <input class="form-check-input like-unlike" type="radio" name="like-unlike" id="exampleRadios2" value="0">
                                            <label class="form-check-label radio-inline" for="exampleRadios2">
                                                <i class="fas fa-thumbs-down text-danger bg-icon"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-5">
                                <div class="input-group mb-3">
                                    <textarea class="form-control" placeholder="Kérjük írja meg véleményét! Kérjük tartózkodjon a trágár szavaktól. Köszönjük." rows="5" maxlength="350" id="opinion" name="opinion"></textarea>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-3 mb-3">
                                <input type="hidden" name="beer-id" value="<?php echo $beer->getBeer()['beer_ID']; ?>">
                                <input type="submit" class="btn btn-block btn-success" value="Értékelés leadása">
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
