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
        $id = $_POST['profile-id']
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
                <div class="container text-center bg-light custom-form2 mt-5 mb-5">
                    <div class="row">
                        <div class="col-12 mt-5 mb-3">
                            <img src="<?php echo $profile->getProfilePicture($profile->getOtherProfile($id)['username'], $profile->getOtherProfile($id)['profile_pic']); ?>" alt="<?php echo $profile->getOtherProfile($id)['username'] ?>" class="img-fluid rounded">
                        </div>
                        <div class="col-12 mt-5 mb-3">
                            <h3><?php echo "Felhasználónév: " . $profile->getOtherProfile($id)['username']; ?></h3>
                        </div>
                        <div class="col-12 col-md-6 mt-5 mb-3">
                            <h3><?php echo "Csatlakozás dátuma:" . $profile->getOtherProfile($id)['join_tmp']; ?></h3>
                        </div>
                        <div class="col-12 col-md-6 mt-5 mb-3">
                            <h3><?php echo "Érmék: " . $profile->getOtherProfile($id)['coin']; ?></h3>
                        </div>
                        <div class="col-12 col-md-6 mt-5 mb-3">
                            <h3><?php echo "Utoljára belépve: " . $profile->getOtherProfile($id)['last_enter']; ?></h3>
                        </div>
                        <div class="col-12 col-md-6 mt-5 mb-3">
                            <h3><?php echo "Értékeléseinek száma: " . $profile->getOtherProfile($id)['rating_count']; ?></h3>
                        </div>
                        <div class="col-12 col-md-6 mt-3 mb-3">
                            <form action="SendMessage.php" method="post">
                                <input type='hidden' name='profile-id' value='<?php echo $profile->getOtherProfile($id)['profile_ID']; ?>'>
                                <input type="submit" class="btn btn-success btn-block" value="Üzenet Küldése">
                            </form>
                        </div>
                        <div class="col-12 col-md-6 mt-3 mb-3">
                            <form action="../php/SendFriendRequest.php" method="post">
                                <input type='hidden' name='profile-id' value='<?php echo $profile->getOtherProfile($id)['profile_ID']; ?>'>
                                <input type="submit" class="btn btn-success btn-block" value="Barátnak Jelölöm">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mb-5">
            <div class="col-12 no-space">
                <div class="container text-center mt-5">
                    <div class="row">
                        <?php
                            include_once '../php/ListRatings.php';
                            $list = new ListRatings($id,"profile");
                            $list->listRatingsHeader();
                            $list->listBeerRatings();
                            $list->listBreweryRatings();
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
