<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/UntappdCopy/php/GetDataFromProfile.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/UntappdCopy/php/MessageInfo.php";

class Navbar{
    
    public function writeMessage(){
        $message = new MessageInfo();
        if(isset($_COOKIE['username'])){
            if($message->writeMessageInfo()['message_count'] > 0){
                return $message->writeMessageInfo()['message_count'];
            }else{
                return "";
            }
        }else{
            return "";
        }
    }
    
    public function writeProfileData(){
        $data = new GetDataFromProfile();
        if(isset($_COOKIE['username'])){
            return "<li class='nav-item d-lg-none d-xl-block'>
                        <a class='nav-link disabled' href='#'>".$_COOKIE['username']." ( <i class='fas fa-coins checked'></i> ".$data->getProfile()['coin']." )</a>
                    </li>";
        }else{
            return "";
        }
    }
    
    public function writeLogoutButton(){
        if(isset($_COOKIE['username'])){
            return "<form class='form-inline my-2 my-lg-0' action='http://localhost/UntappdCopy/php/Logout.php' method='post'>
                        <button class='btn btn-outline-light my-2 my-sm-0 mr-3' type='submit'>Kijelentkezés</button>
                    </form>";
        }else{
            return "";
        }
    }
    
    public function writeNavbar(){
        $data = new GetDataFromProfile();
        echo              "<nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
                            <a class='navbar-brand' href='#'>Beerodalom</a>
                            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                                <span class='navbar-toggler-icon'></span>
                            </button>
                            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                                <ul class='navbar-nav mr-auto'>
                                    <li class='nav-item dropdown'>
                                        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                            Sörök és Sörfőzdék
                                        </a>
                                        <div class='dropdown-menu bg-dark text-light' aria-labelledby='navbarDropdown'>
                                            <a class='dropdown-item drophover' href='http://localhost/UntappdCopy/pages/BeerList.php'>Sörök</a>
                                            <a class='dropdown-item drophover' href='http://localhost/UntappdCopy/pages/BreweryList.php'>Sörfőzdék</a>
                                            <div class='dropdown-divider'></div>
                                            <a class='dropdown-item drophover' href='http://localhost/UntappdCopy/pages/NewBeer.php'>Új sör megadása</a>
                                            <a class='dropdown-item drophover' href='http://localhost/UntappdCopy/pages/NewBrewery.php'>Új söfőzde megadása</a>
                                        </div>
                                    </li>
                                    <li class='nav-item dropdown'>
                                        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                            Profilom <sup class='text-danger'>".$this->writeMessage()."</sup>
                                        </a>
                                        <div class='dropdown-menu bg-dark text-light' aria-labelledby='navbarDropdown'>
                                            <a class='dropdown-item drophover' href='http://localhost/UntappdCopy/pages/Messages.php'>Üzeneteim <sup class='text-danger'>".$this->writeMessage()."</sup></a>
                                            <a class='dropdown-item drophover' href='http://localhost/UntappdCopy/pages/EditProfile.php'>Profil szerkesztése</a>
                                            <div class='dropdown-divider'></div>
                                            <form id='submitProfile' action='../pages/ProfilePage.php' method='post'>
                                                <input type='hidden' name='profile-id' value='" . $data->getProfile()['profile_ID'] . "' >
                                                <a class='dropdown-item drophover' href='javascript:{}' name='submitProfile' onclick='submitFunction(this)'>Profil megtekintése</a>
                                            </form>
                                        </div>
                                    </li>".
                                    $this->writeProfileData().   
                                "</ul>".
                                    $this->writeLogoutButton().
                                "<div class='bg-light mr-3' id='toggle' onclick='move()'>
                                    <button class='btn rounded-circle bg-dark ml-2 mt-1' id='button' value='0'>
                                </div>".    
                                "<form class='form-inline my-2 my-lg-0' action='http://localhost/UntappdCopy/pages/ListSearch.php' method='post'>
                                    <input class='form-control mr-sm-2' type='search' name='search' placeholder='Search' aria-label='Search'>
                                    <button class='btn btn-outline-light my-2 my-sm-0' type='submit'>Keresés</button>
                                </form> 
                            </div>
                        </nav>";
}

}
if(!(isset($_COOKIE['username']))){
    header('Location: http://localhost/UntappdCopy/index.php');
}
$navbar = new Navbar();
$navbar->writeNavbar();