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
            header( "refresh:5;url=MainPage.php");
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
        <div class="container-fluid mb-5">
            <div class="col-12 no-space">
                <div class="container custom-form mt-5">
                    <div class="row">
                        <div class="col-12 text-center mt-3">
                            <h3>Sikeres Küldés!</h3>
                        </div>
                        <div class="col-12 text-center mt-2">
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
                        <div class="col-12 text-center mt-5">
                            <p>Kérési szándékát sikeresen elküldtük a másik félnek!</p>
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
