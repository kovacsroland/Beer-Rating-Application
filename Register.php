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
                <div class="container mt-5 mb-5 custom-form2">
                    <form action="php/Registration.php" method="post" onsubmit="return validRegForm()">
                        <div class="row">
                            <div class="col-12 text-center mt-3">
                                <h3>Regisztráció</h3>
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
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Felhasználónév" name="username" id="username" minlength="4" maxlength="20" aria-label="username" aria-describedby="basic-addon1" onchange="validRegUsername()">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" placeholder="E-mail cím"  name="email" aria-label="email" id="email" aria-describedby="basic-addon1" onchange="validEmail()">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" placeholder="Jelszó" name="password"  maxlength="20" aria-label="password" aria-describedby="basic-addon1" onchange="validPassword()" oninput="passwordStrength(this)">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" placeholder="Jelszó újra" name="re-password" maxlength="20" aria-label="re-password" aria-describedby="basic-addon1" onchange="confirmPassword()">
                                </div>
                            </div>
                            <div class="col-12 text-center mt-3 d-none" id="progress-bar-div">
                                <div class="progress">
                                    <div class="progress-bar bg-danger" id="progressbar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-danger" id="pwd-strength"></p>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Vezetéknév" name="lastname" aria-label="last-name" aria-describedby="basic-addon1" onchange="validLastName()">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Keresztnév" name="firstname" aria-label="first-name" aria-describedby="basic-addon1" onchange="validFirstName()">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01" name="control" onchange="questionToAnswer(this.options[this.selectedIndex])">
                                        <option selected>Ellenőrző kérdések!</option>
                                        <option>Hogy hívták az első háziállatod?</option>
                                        <option>Ki volt a kedvenc tanárod?</option>
                                        <option>Mi a kedvenc könyved?</option>
                                    </select>
                                    <input type="text" class="form-control" id="answer" name="answer" aria-label="Text input with dropdown button">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01" name="gender" onchange="checkSex()">
                                        <option selected>Válaszd ki a nemed!</option>
                                        <option value="1">Férfi</option>
                                        <option value="2">Nő</option>
                                        <option value="3">Nem nyilatkozom róla.</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01" name="country" onchange="checkCountry()">
                                        <option selected>Válaszd ki az országodat!</option>
                                        <?php
                                        include_once './php/CreateOptionsFromDB.php';
                                        $options = new CreateOptionsFromDB("countries", "country_ID", "country_name");
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <div class="input-group mb-3">
                                    <input type="text" placeholder="Születési idő:" name="birthdate" class="form-control" min="<?php
                                    $time = strtotime("-100 year", time());
                                    $date = date("Y-m-d", $time);
                                    echo $date;
                                    ?>" max="<?php echo date("Y-m-d", strtotime("-18 year", time())); ?>" onclick="textToDate(this)">
                                </div>
                            </div>
                            <div class="col-12 text-center mt-3">
                                <p>A Fiók létrehozása gombra kattintva elfogadja a <strong><a href="#">Felhasználási feltételeket</a></strong> és <strong><a href="#">Adatvédelmi irányelveinket</a></strong>.</p>
                            </div>
                            <div class="col-12 text-center mt-3 mb-5">
                                <input type="submit" value="Fiók létrehozása." class="btn btn-block btn-success">
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
