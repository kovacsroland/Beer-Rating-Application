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
        include_once '../php/GetDataFromProfile.php';
            $profile = new GetDataFromProfile();
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
                <div class="container mt-5 mb-5 custom-form2">
                    <form action="../php/ProfileEdit.php" method="post" onsubmit="return validEditForm();" id="form1" runat="server" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 text-center mt-3">
                                <h3>Adatok Szerkesztése</h3>
                            </div>
                            <div class="col-12 text-center mt-2">
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
                            <div class="col-12 text-center mt-3">
                                <h3>Személyes Adatok</h3>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <h6 class="float-left">Vezetéknév</h6>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="<?php echo $profile->getProfile()['last_name']; ?>" name="lastname" id="lastname" maxlength="20" aria-label="username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <h6 class="float-left">Keresztnév</h6>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="<?php echo $profile->getProfile()['first_name']; ?>" name="firstname" id="firstname" maxlength="20" aria-label="username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <h6 class="float-left">E-mail</h6>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" placeholder="<?php echo $profile->getProfile()['email']; ?>" name="email" id="email" maxlength="20" aria-label="username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <h6 class="float-left">Ország</h6>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01" name="country">
                                        <option selected value="<?php echo $profile->getProfile()['country_ID']; ?>"><?php echo $profile->getCountryName($profile->getProfile()['country_ID']); ?></option>
                                        <?php
                                        include_once '../php/CreateOptionsFromDB.php';
                                        $options = new CreateOptionsFromDB("countries", "country_ID", "country_name");
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <h6 class="float-left">Ellenőrző kérdés</h6>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="<?php echo $profile->getProfile()['check_question']; ?>" name="question" id="check-question" maxlength="20" aria-label="username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <h6 class="float-left">Ellenőrző Válasz</h6>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="<?php echo $profile->getProfile()['check_answer']; ?>" name="answer" id="check-answer" maxlength="20" aria-label="username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 text-center mt-3">
                                <h3>Profil Adatok</h3>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <h6 class="float-left">Felhasználónév</h6>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="<?php echo $profile->getProfile()['username']; ?>" name="username"  id="username" maxlength="20" aria-label="username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 text-center mt-3">
                                <h6 class="float-left">Új jelszó</h6>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" placeholder="Jelszó" name="password" id="password" maxlength="20" aria-label="password" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 text-center mt-3">
                                <h6 class="float-left">Profil kép</h6>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input image" id="fileInput" name="image" multiple onchange="editLabel()" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01" id="fileLabel">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-3 profile-picture" id="profile">
                                <img id="profile_pic" src="#" class="img-fluid rounded" alt="Your profile picture">
                            </div>
                            <div class="col-12 text-center mt-3">
                                <h6 class="float-left">Jelszó</h6>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" placeholder="Jelszó" name="check-password" id="password" maxlength="20" aria-label="password" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-12 text-center mt-5 mb-3">
                                <div class="input-group mb-3">
                                    <input type="hidden" name="profile-id" value="<?php echo $profile->getProfile()['profile_ID']; ?>">
                                    <input type="hidden" name="person-id" value="<?php echo $profile->getProfile()['person_ID']; ?>">
                                    <input type="submit" class="form-control btn btn-success btn-block" onclick="setData3()" value="Változtatások mentése" aria-describedby="basic-addon1">
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
