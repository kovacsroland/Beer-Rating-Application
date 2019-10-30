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
        <div class="container-fluid bg-white text-dark message-div">
            <div class="col-12 no-space">
                <div class="row">
                    <div class="col-12 text-center mt-3">
                        <h3>Üzenetek</h3>
                    </div>
                    <div class="col-12 text-center mt-2 mb-5">
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
                    <div class="col-2 text-center no-space bg-success rounded">
                        <div class="row">
                            <div class="col-12 text-center pt-3 pb-3 text-light hover" id="submit" onClick="submit(this)">
                                <form id='submit' action='#' method='post'>
                                    <h3 class="d-inline"><i class="fas fa-plus"></i></h3><h3 class="d-lg-inline d-none"> Új Üzenet</h3>
                                    <input type='hidden' name='send-message' value='0' >
                                </form>
                            </div>
                            <div class="col-12 text-center pt-3 pb-3 text-light hover" id="submit1" onClick="submit(this)" onmouseover="messageShowing()">
                                <form id='submit1' action='#' method='post'>
                                    <p class="d-inline"><i class="fas fa-envelope-open"></i></p><p class="d-lg-inline d-none">  Bejövő üzenetek</p>
                                    <input type='hidden' name='basedon' value='0'>
                                    <input type='hidden' name='seen' value='0' >
                                </form>
                            </div>
                            <div class="col-12 text-center pt-3 pb-3 text-light hover" id="submit2" onClick="submit(this)" onmouseover="messageShowing()">
                                <form id='submit2' action='#' method='post'>
                                    <p class="d-inline"><i class="fas fa-envelope"></i></p><p class="d-lg-inline d-none">  Elküldött üzenetek</p>
                                    <input type='hidden' name='basedon' value='1' >
                                </form>
                            </div>
                            <div class="col-12 text-center pt-3 pb-3 text-light hover" id="submit3" onClick="submit(this)">
                                <form id='submit3' action='#' method='post'>
                                    <p class="d-inline"><i class="fas fa-user-friends"></i></p><p class="d-lg-inline d-none">  Barátok</p>
                                    <input type='hidden' name='friends' value='1' >
                                </form>
                            </div>
                            <div class="col-12 text-center pt-3 pb-3 text-light hover" id="submit4" onClick="submit(this);" onmouseover="messageShowing()">
                                <form id='submit4' action='#' method='post'>
                                    <p class='d-inline'><i class="fas fa-info"></i></p><p class='d-lg-inline d-none'> Rendszerüzenet</p>
                                    <input type='hidden' name='basedon' value='3' >
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-10 col-md-4 d-none d-md-block text-center border-right message-div" id='msg-list'>
                        <div class="row">
                            <div class="col-12 text-center text-dark hover">
                                <form id='submit5' action="#" method="post">
                                    <div class="input-group mb-3">
                                        <select class="custom-select" id="inputGroupSelect01" name="capacity" id='submit5' onchange="setList(this.options[this.selectedIndex]); submit(this);">
                                            <option selected disabled>Rendezés</option>
                                            <option <?php if(isset($_POST['basedon']) && $_POST['basedon'] == 0){ echo "value='0'";}else{ echo "value='1'";} ?>>Legutóbbi</option>
                                            <option <?php if(isset($_POST['basedon']) && $_POST['basedon'] == 0){ echo "value='4'";}else{ echo "value='5'";} ?>>Legrégebbi</option>                                        
                                        </select>
                                        <input type="hidden" name="basedon" id="option-based">
                                    </div>
                                </form>
                            </div>
                            <?php
                            include_once '../php/GetMessages.php';
                            if (isset($_POST['basedon'])) {
                                $messages = new GetMessages($_POST['basedon']);
                                $messages->writeMessages();
                            } else {
                                $messages = new GetMessages(0);
                                $messages->writeMessages();
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-10 col-md-6 no-space text-center message-div" id='msg'>
                        <div class='col-12 text-center text-dark' id="message-box">
                            <?php
                            if (isset($_POST['msg-id'])) {
                                $id = $_POST['msg-id'];
                                $messages->showMessage($id);
                                $messages->setSeen($id);
                            } else if (isset($_POST['friends'])) {
                                $messages->writeFriends();
                                $messages->writeFriendRequest();
                            } else if (isset($_POST['friend-id']) && isset($_POST['access-request'])) {
                                $messages->requestConfirmation($_POST['access-request'], $_POST['friend-id']);
                            } else if (isset($_POST['send-message'])) {
                                $messages->writeNewMessage();
                            } else {
                                echo '<img src="../img/BackgroundImages/Beer-Background.jpg" class="img-fluid rounded no-space">';
                            }
                            ?>
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
