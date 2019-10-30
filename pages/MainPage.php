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
            <div class="col-12 no-space over">
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
            <div class="col-12 no-space over">
                <div class="row">
                    <div class="col-12 no-space">
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="../img/BackgroundImages/Beer-Background.jpg" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="../img/BackgroundImages/Beer.jpg" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="../img/BackgroundImages/Beers.jpg" alt="Third slide">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include_once './Footer.php';
        ?>
    </body>
</html>
