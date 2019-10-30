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
        include_once '../php/GetDataOfBeer.php';
        $beerData = new GetDataOfBeer($_POST['beer-id']);
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
                            <h3 class="col-12 no-space d-none d-lg-block"><?php echo $beerData->getBeer()['brewery_name'] . " - " . $beerData->getBeer()['beer_name'] . " " . $beerData->getBeer()['capacity'] . "L"; ?></h3>
                            <h3 class="col-12 no-space d-none d-md-block d-lg-none"><?php echo $beerData->getBeer()['brewery_name']; ?></h3>
                            <h3 class="col-12 no-space d-none d-md-block d-lg-none"> - </h3>
                            <h3 class="col-12 no-space d-none d-md-block d-lg-none"><?php echo $beerData->getBeer()['beer_name'] . " " . $beerData->getBeer()['capacity'] . "L"; ?></h3>
                            <h3 class="col-12 no-space d-block d-md-none"><?php echo $beerData->editTitle($beerData->getBeer()['brewery_name']); ?></h3>
                            <h3 class="col-12 no-space d-block d-md-none"> - </h3>
                            <h3 class="col-12 no-space d-block d-md-none"><?php echo $beerData->getBeer()['beer_name'] . " " . $beerData->getBeer()['capacity'] . "L"; ?></h3>
                        </div>
                        <div class="col-12 col-lg-4 text-center mt-5 mb-3">
                            <img src="<?php echo $beerData->getImage($beerData->getBeer()['beer_name'], $beerData->getBeer()['image']) ?>" alt="<?php echo $beerData->getBeer()['image']; ?>" class="img-fluid rounded">
                        </div>
                        <div class="col-12 col-lg-8 text-center mt-3">
                            <div class="row">
                                <div class="col-12 no-space">
                                    <h3 class="mb-4">Adatok</h3>
                                    <hr>
                                </div>
                                <div class="col-12 no-space">
                                    <div class="row no-space">
                                        <div class="col-12 col-md-6 no-space text-center">
                                            <table class="table table-striped text-center">
                                                <tbody>
                                                    <tr>
                                                        <th title="<?php echo $beerData->getBeer()['taste']; ?>" scope="row">Íz:</th>
                                                        <td title="<?php echo $beerData->getBeer()['taste']; ?>"><?php echo $beerData->editData($beerData->getBeer()['taste']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th title="<?php echo $beerData->getBeer()['smell']; ?>" scope="row">Illat:</th>
                                                        <td title="<?php echo $beerData->getBeer()['smell']; ?>"><?php echo $beerData->editData($beerData->getBeer()['smell']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th title="<?php echo $beerData->getBeer()['foam']; ?>" scope="row">Hab:</th>
                                                        <td title="<?php echo $beerData->getBeer()['foam']; ?>"><?php echo $beerData->editData($beerData->getBeer()['foam']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th title="<?php echo $beerData->getBeer()['color']; ?>" scope="row">Szín:</th>
                                                        <td title="<?php echo $beerData->getBeer()['color']; ?>"><?php echo $beerData->editData($beerData->getBeer()['color']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Fő típus:</th>
                                                        <td><?php echo $beerData->getBeerType($beerData->getBeer()['parent']); ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-12 mb-3 d-block d-md-none pr-0 pl-0"><hr></div>
                                        <div class="col-12 col-md-6 no-space text-center">
                                            <table class="table table-striped text-center">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Íz:</th>
                                                        <td><?php echo $beerData->progressBar($beerData->getBeer()['overall_taste_point'], $beerData->getBeer()['rating_count']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Illat:</th>
                                                        <td><?php echo $beerData->progressBar($beerData->getBeer()['overall_smell_point'], $beerData->getBeer()['rating_count']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Hab:</th>
                                                        <td><?php echo $beerData->progressBar($beerData->getBeer()['overall_foam_point'], $beerData->getBeer()['rating_count']); ?></td>                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Szín:</th>
                                                        <td><?php echo $beerData->progressBar($beerData->getBeer()['overall_color_point'], $beerData->getBeer()['rating_count']); ?></td>                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Össz:</th>
                                                        <td><?php echo $beerData->stars($beerData->getBeer()['overall_rating_point'], $beerData->getBeer()['rating_count']); ?></td>                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-12 mb-3 d-block d-md-none pr-0 pl-0"><hr></div>
                                        <div class="col-12 col-md-6 no-space text-center">
                                            <table class="table table-striped text-center">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Típus:</th>
                                                        <td><?php echo $beerData->getBeer()['category_name']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Származás:</th>
                                                        <td><?php echo $beerData->getCountryName($beerData->getBeer()['country_ID']); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">ABV:</th>
                                                        <td><?php echo $beerData->getBeer()['ABV']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">IBU:</th>
                                                        <td><?php echo $beerData->getBeer()['IBU']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">EBC:</th>
                                                        <td><?php echo $beerData->getBeer()['EBC']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Pohár:</th>
                                                        <td><?php echo $beerData->getBeer()['glass_type']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-12 mb-3 d-block d-md-none pr-0 pl-0"><hr></div>
                                        <div class="col-12 col-md-6 no-space text-center">
                                            <table class="table table-striped text-center">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Hőmérséklet:</th>
                                                        <td><?php echo $beerData->getBeer()['serving_temp']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Bemutatás:</th>
                                                        <td><?php echo $beerData->getBeer()['making_tmp']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Hozzáadva:</th>
                                                        <td><?php echo $beerData->getBeer()['add_tmp']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Értékelések:</th>
                                                        <td><?php echo $beerData->getBeer()['rating_count']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Like:</th>
                                                        <td><?php echo $beerData->getBeer()['all_like']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Unlike:</th>
                                                        <td><?php echo $beerData->getBeer()['all_unlike']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center mb-5 mt-3">
                            <h3>Leírás</h3>
                            <hr>
                            <p>
                                <?php
                                echo $beerData->getBeer()['beer_description'];
                                ?>
                            </p>
                        </div>
                        <div class="col-12 mb-5">
                            <div class="row">
                                <div class="col-12 col-md-6 mt-3 mb-3">
                                    <form action="EditBeer.php" method="post">
                                        <input type='hidden' name='beer-id' value='<?php echo $beerData->getBeer()['beer_ID']; ?>'>
                                        <input type="submit" class="btn btn-success btn-block" value="Szerkeszt">
                                    </form>
                                </div>
                                <div class="col-12 col-md-6 mt-3 mb-3">
                                    <form action="RateBeer.php" method="post">
                                        <input type='hidden' name='beer-id' value='<?php echo $beerData->getBeer()['beer_ID']; ?>'>
                                        <input type="submit" class="btn btn-success btn-block" value="Értékel">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mb-5 mt-3">
            <div class="col-12 no-space">
                <div class="container text-center mt-5">
                    <div class="row">
                        <?php
                        include_once '../php/ListRatings.php';
                        $list = new ListRatings($beerData->getBeer()['beer_ID'], "beer");
                        $list->listRatingsHeader();
                        $list->listBeerRatings();
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
