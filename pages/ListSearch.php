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
        <div class="container-fluid mb-5">
            <div class="col-12 no-space">
                <div class="container text-center mt-5">
                    <div class="row">
                        <?php
                            include_once '../php/Search.php';
                            $list = new Search($_POST["search"]);
                            $list->searchingBeer();
                            $list->searchingBrewery();
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
