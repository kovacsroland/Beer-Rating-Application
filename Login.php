<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
        include_once './pages/Header.php';
        ?>
    </head>
    <body>
        <div class="container-fluid">
            <div class="col-12 no-space">
                <div class="row">
                    <div class="col-12 no-space">
                        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                            <a class="navbar-brand" href="index.php">Beerodalom</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="Login.php">Bejelentkezés <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="Register.php">Regisztráció</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#footer">Kapcsolat</a>
                                    </li>
                                    <li class="nav-item dropdown bg-dark">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Adatvédelem
                                        </a>
                                        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item drophover" href="#">Felhasználási feltételek</a>
                                            <a class="dropdown-item drophover" href="#">Adatvédelmi irányelvek</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-12 no-space">
                <div class="container custom-form mt-5 mb-5">
                    <form action="php/LoginProcess.php" method="post" onsubmit="return validLoginForm()">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h3>Bejelentkezés</h3>
                            </div>
                            <div class="col-12 text-center mt-2">
                                <div class='row'>
                                    <div class='col-4'>
                                        <hr>
                                    </div>
                                    <div class='col-4'>
                                        <img src="img/BackgroundImages/beer.ico" class="img-fluid rounded">
                                    </div>
                                    <div class='col-4'>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Felhasználónév" aria-label="Username" name="username" maxlength="20" aria-describedby="basic-addon1" onchange="validUsername()">
                                </div>
                            </div>
                            <div class="col-12 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" placeholder="Jelszó" aria-label="Username" name="password" maxlength="20" aria-describedby="basic-addon1" onchange="validPassword()">
                                </div>
                            </div>
                            <div class="col-12 text-center mt-3 <?php if (empty($_COOKIE['login'])) { echo "d-none"; }?>">
                                <p class="text-danger>">
                                    <?php
                                        if (!empty($_COOKIE['login'])) {
                                            echo "Helytelen felhasználónév / jelszó.";
                                        }
                                    ?>
                                </p>
                            </div>
                            <div class="col-12 text-center mt-3" id="checkboxDiv">
                                <input type="checkbox" class="remember-me" name="remember-me" aria-label="Checkbox for following text input" onchange="checkboxCheck()">&nbsp&nbsp<p class="d-inline" id="remember-label">Jegyezz meg!<p>
                            </div>
                            <div class="col-12 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="submit" class="btn btn-block btn-success" aria-label="" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <a href="pages/ForgottenPasswordOrUsername.php">Elfelejtetted a jelszavad?</a>
                            </div>
                            <div class="col-12 text-center">
                                <hr>
                            </div>
                            <div class="col-12 text-center">
                                <h5>Új vagy itt? <strong><a href="Register.php">Regisztrálj!</a></strong></h5>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        include_once './pages/Footer.php';
        ?>
    </body>
</html>
