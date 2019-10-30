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
    <?php
        include_once '../php/GetDataFromProfile.php';
        $profile = new GetDataFromProfile();
    ?>
    <body onload="kuki()">
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
        <div class="container-fluid text-center">
            <div class="col-12 no-space">
                <div class="container">
                    <div class="col-12 mt-5">
                        <div class="row">
                            <div class="col-12">
                                <img src="../img/Coin.png" class="img-fluid rounded coin">
                            </div>
                            <div class="col-12 mt-5">
                                <input type="hidden" value='<?php echo ($profile->getProfile()['coin']- 5); ?>' id="coinValue">
                                <h3 id="coin"><?php echo ($profile->getProfile()['coin']- 5); ?></h3>
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
