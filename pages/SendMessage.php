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
                <div class="container custom-form2 mt-5">
                    <form action="../php/Send.php" method="post">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h3>Üzenet Küldés</h3>
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
                            <div class="col-12 text-center mt-5">
                                <div class="input-group mb-3">
                                    <textarea class="form-control" placeholder="Üzenet." rows="5" id="message" name="message"></textarea>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-5 mb-3">
                                <div class="input-group mb-3">
                                    <input type="hidden" name="profile-id" value="<?php echo $_POST['profile-id']; ?>">
                                    <input type="submit" class="form-control btn btn-success btn-block" value="Küldés" aria-describedby="basic-addon1">
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
