<?php

include_once 'DatabaseConnection.php';

class SendFriendRequest {

    private $id;

    public function __construct($id) {
        $this->setId($id);
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    public function friendRequestMessage() {
        return "<div class='col-12 text-center'>"
                . "<div class='row'>"
                . "<div class='col-12'>"
                . "<p>A " . $_COOKIE['username'] . " nevű felhasználó baráti kérelmet küldött önnek.Ha elfogadja kattinton az efodaom gombra ha nem kattintson a elutasítás gombra.</p>"
                . "</div>"
                . "<div class='col-6 text-center'>"
                . "<input type='submit' class='btn btn-success' value='Elfogadom'>"
                . "</div>"
                . "<div class='col-6 text-center'>"
                . "<input type='submit' class='btn btn-success' value='Elutasítom'>"
                . "</div>"
                . "</div>"
                . "</div>";
    }

    public function isSendable() {
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $command = "SELECT * FROM friends WHERE initiator_ID = (SELECT profile_ID FROM profiles WHERE username = '" . $_COOKIE['username'] . "') AND acceptor_ID = " . $this->getId();
            $result = mysqli_query($connection->getConnection(), $command);
            if (mysqli_num_rows($result) > 0) {
                return false;
            } else {
                return true;
            }
        }
    }

    public function sendRequest() {
        if ($this->isSendable()) {
            $connection = new DatabaseConnection();
            if ($connection->connectDB()) {
                $command = "INSERT INTO friends (friend_ID, initiator_ID, acceptor_ID, active) "
                        . "VALUES('', (SELECT profile_ID FROM profiles WHERE username = '" . $_COOKIE['username'] . "'),"
                        . " " . $this->getId() . ", 0);";
                if (mysqli_query($connection->getConnection(), $command)) {
                    header('Location: ../pages/SuccessFriendRequest.php');
                } else {
                    echo "Sikertelen adatfrissítés.";
                    echo $command;
                }
            }
        }
    }

}

$friendRequest = new SendFriendRequest($_POST['profile-id']);
$friendRequest->sendRequest();


