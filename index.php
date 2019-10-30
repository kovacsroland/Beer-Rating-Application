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
        <div class='container-fluid bg-dark text-light modal text-center' id='modal'>
            <div class="col-12 mt-5">
                <div class="container">
                    <div class="col-12">
                        <div class="row mt-5">
                            <div class="col-12 mt-5 text-center">
                                <h3>Az oldalt csak 18 éven felüliek használhatják. Ha nem múltál még el 18 éves akkor kérlek hagyd el az oldalt!</h3>
                            </div>
                            <div class="col-6 mt-5 float-right">
                                <button class="btn btn-success" onclick="location.href = 'https://www.google.com/'">Nem múltam még el 18 éves</button>
                            </div>
                            <div class="col-6 mt-5 float-left">
                                <button class="btn btn-success" onclick="hideModal()">Elmúltam 18 éves</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid text-center bg-dark text-ligt border-bottom">
            <div class="col-12 no-space">
                <div class="row pt-3 pb-3">
                    <div class="col-12 no-space">
                        <img src="img/BackgroundImages/ToBeerOrNotToBeer.png" class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-12 no-space">
                <div class="row">
                    <div class="col-12 no-space">
                        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                            <a class="navbar-brand" href="#">Beerodalom</a>
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
        <div class="container-fluid no-space">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 img-fluid no-space">
                        <img src="img/BackgroundImages/Beer.jpg" class="img-fluid">
                        <div class="row centered">
                            <div class="col-12 col-md-6 text-center">
                                <a href="Login.php"><button class="buttons mt-5 float-none float-md-right">Bejelentkezés</button></a>
                            </div>
                            <div class="col-12 col-md-6 text-center">
                                <a href="Register.php"><button class="buttons mt-5 float-none float-md-left">Regisztráció</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include_once './pages/Footer.php';
        ?>
    </body>
</html>
