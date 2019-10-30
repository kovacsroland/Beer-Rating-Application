<?php

include_once 'DatabaseConnection.php';

class GetMessages {

    private $basedon, $editseen;

    public function __construct($basedon) {
        $this->setBasedon($basedon);
    }

    function getBasedon() {
        return $this->basedon;
    }

    function getEditseen() {
        return $this->editseen;
    }

    function setBasedon($basedon) {
        $this->basedon = $basedon;
    }

    function setEditseen($editseen) {
        $this->editseen = $editseen;
    }

    public function selectBased() {
        $command = "SELECT * FROM private_message INNER JOIN profiles ON private_message.sender_ID = profiles.profile_ID WHERE ";
        switch ($this->getBasedon()) {
            case 0:
                return $command . "consignee_ID = (SELECT profile_ID FROM profiles WHERE username = '" . $_COOKIE['username'] . "') ORDER BY send_timestamp DESC";
                break;
            case 1:
                return $command . "sender_ID = (SELECT profile_ID FROM profiles WHERE username = '" . $_COOKIE['username'] . "') ORDER BY send_timestamp DESC";
                break;
            case 3:
                return $command . "consignee_ID = (SELECT profile_ID FROM profiles WHERE username = '" . $_COOKIE['username'] . "') AND sender_ID = 1";
                break;
            case 4:
                return $command . "consignee_ID = (SELECT profile_ID FROM profiles WHERE username = '" . $_COOKIE['username'] . "') ORDER BY send_timestamp ASC";
                break;
            case 5:
                return $command . "sender_ID = (SELECT profile_ID FROM profiles WHERE username = '" . $_COOKIE['username'] . "') ORDER BY send_timestamp ASC";
                break;
            default:
                return "";
        }
    }

    public function getProfilePicture($username, $image) {
        if ($image != "") {
            return "../img/Profiles/" . md5($username) . "/" . $image;
        } else {
            return "../img/Profiles/Default Profile/Default Profile.png";
        }
    }

    public function setSeen($id) {
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $query = "SELECT seen FROM private_message WHERE msg_ID = " . $id . " AND consignee_ID = (SELECT profile_ID FROM profiles WHERE username = '" . $_COOKIE["username"] . "')";
            $result = mysqli_query($connection->getConnection(), $query);
            $row = mysqli_fetch_assoc($result);
            if ($row['seen'] == 0) {
                $command = "UPDATE private_message SET seen = 1 WHERE msg_ID = " . $id . " AND consignee_ID = (SELECT profile_ID FROM profiles WHERE username = '" . $_COOKIE["username"] . "')";
                if (!(mysqli_query($connection->getConnection(), $command))) {
                    die("Hiba lépett fel.");
                }
            }
        }
    }

    public function writeFriends() {
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $query = "SELECT profile_ID FROM profiles WHERE username = '" . $_COOKIE['username'] . "'";
            $result = mysqli_query($connection->getConnection(), $query);
            $row = mysqli_fetch_assoc($result);
            $command = "SELECT * FROM friends INNER JOIN profiles ON friends.initiator_ID = profiles.profile_ID OR friends.acceptor_ID = profiles.profile_ID WHERE friends.initiator_ID = " . $row['profile_ID'] . " OR friends.acceptor_ID = " . $row['profile_ID'] . " AND profiles.username <> '" . $_COOKIE['username'] . "' AND profiles.profile_ID <> " . $row['profile_ID'] . " AND friends.active = 1";
            $result2 = mysqli_query($connection->getConnection(), $command);
            echo "<div class='row text-center'>";
            if (mysqli_num_rows($result2) > 0) {
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    if ($row2['username'] != $_COOKIE['username']) {
                        echo "<div class='col-6 col-md-4 col-lg-3 mt-3'>
			<div class='row'>
			<div class='col-12' id='myDiv' onclick='showHiddenButton()'>
			<img src='" . $this->getProfilePicture($row2['username'], $row2['profile_pic']) . "' title='" . $row2['username'] . "' class='img-fluid rounded friend-img'>
			</div>
			<div class='col-12 hidden-buttons text-center'>
			<div class='row text-center'>
			<div class='col-12 mt-3 text-center'>
                        <form action='ProfilePage.php' method='post'>
                        <input type='hidden' name='profile-id' value='".$row2['profile_ID']."'>
			<input type='submit' class='btn btn-success btn-submit' value='Profil megtekintése'>
			</form>
                        </div>
			<div class='col-12 mt-3 text-center'>
                        <form action='SendMessage.php' method='post'>
                        <input type='hidden' name='profile-id' value='".$row2['profile_ID']."'>
			<input type='submit' class='btn btn-success btn-submit' value='Üzenet küldése'>
			</form>
                        </div>
			</div>
			</div>
			</div>
	            </div>";
                    }
                }
            } else {
                echo "<h1 class='text-center pl-5 ml-5'>Nincsenek barátaid.</h1>";
            }
            echo "</div>";
        }
    }

    public function requestConfirmation($id, $friend) {
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $command = "UPDATE friends SET active = " . $id . " WHERE friend_ID = " . $friend;
            if (mysqli_query($connection->getConnection(), $command)) {
                
            } else {
                die('Sikertelen barát visszaigazolás.');
            }
        }
    }

    public function writeFriendRequest() {
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $command = "SELECT * FROM friends INNER JOIN profiles ON friends.initiator_ID = profiles.profile_ID WHERE initiator_ID <> (SELECT profile_ID FROM profiles WHERE username = '" . $_COOKIE['username'] . "') AND friends.active = 0;";
            $result = mysqli_query($connection->getConnection(), $command);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='row mt-3 pb-3 border-bottom'>"
                    . "<div class='col-12 text-center'>"
                    . "<h3>Baráti kérelem érkezett önnek</h3>"
                    . "</div>"
                    . "<div class='col-12 text-center'>"
                    . "<p>A(z) " . $row['username'] . " nevű felhasználó baráti kérelmet küldött önnek.</p>"
                    . "</div>"
                    . "<div class='col-6 text-center'>"
                    . "<form action='#' method='post'>"
                    . "<input type='hidden' name='access-request' value='1'>"
                    . "<input type='hidden' name='friend-id' value='" . $row['friend_ID'] . "'>"
                    . "<input type='submit' class='btn btn-block btn-success' value='Elfogadás'>"
                    . "</form>"
                    . "</div>"
                    . "<div class='col-6 text-center'>"
                    . "<form action='#' method='post'>"
                    . "<input type='hidden' name='access-request' value='2'>"
                    . "<input type='hidden' name='friend-id' value='" . $row['friend_ID'] . "'>"
                    . "<input type='submit' class='btn btn-block btn-success' value='Elutasítás'>"
                    . "</form>"
                    . "</div>"
                    . "</div>";
                }
            }
        }
    }

    public function writeNewMessage() {
        $connection = new DatabaseConnection();
        $string = "<div class='input-group mb-3'>
                    <select class='custom-select' id='friends-options' onchange='setConsignee(this.options[this.selectedIndex])'>
                    <option selected disabled>Barátok</option>";
        if ($connection->connectDB()) {
            $query = "SELECT profile_ID FROM profiles WHERE username = '" . $_COOKIE['username'] . "'";
            $result = mysqli_query($connection->getConnection(), $query);
            $row = mysqli_fetch_assoc($result);
            $command = "SELECT * FROM friends INNER JOIN profiles ON friends.initiator_ID = profiles.profile_ID OR friends.acceptor_ID = profiles.profile_ID WHERE friends.initiator_ID = " . $row['profile_ID'] . " OR friends.acceptor_ID = " . $row['profile_ID'] . " AND profiles.username <> '" . $_COOKIE['username'] . "' AND profiles.profile_ID <> " . $row['profile_ID'] . " AND friends.active = 1";
            $result2 = mysqli_query($connection->getConnection(), $command);
            $i = 0;
            $result2 = mysqli_query($connection->getConnection(), $command);
            if (mysqli_num_rows($result2) > 0) {
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    if ($row2['username'] != $_COOKIE['username']) {
                        $string .= "<option value='" . $row2['profile_ID'] . "'>" . $row2['username'] . "</option>";
                    }
                }
            }
        }
        $string .= "</select>
                    </div>";
        echo "<form action='../php/Send.php' method='post'>"
        . "<div class='row'>"
        . "<div class='col-12'>"
        . "<p class='float-left'><strong>Feladó:</strong> " . $_COOKIE['username'] . "</p>"
        . "</div>"
        . "<div class='col-12'>"
        . "<p class='float-left' id='consignee-id'><strong>Címzett:</strong> </p>"
        . $string
        . "<input type='hidden' id='msg-profile-id' name='profile-id'>"
        . "</div>"
        . "<div class='col-12 text-center'>
                        <div class='input-group mb-3'>
                            <textarea class='form-control' placeholder='Üzenet.' rows='5' id='message' name='message'></textarea>
                        </div>
                    </div>"
        . "<div class='col-12'>"
        . "<input type='submit' class='btn btn-block btn-success' onclick='alert(document.getElementById('consignee-id').value);' value='Küldés'>"
        . "</div>"
        . "</div>"
        . "</form>";
    }

    public function showMessage($id) {
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $command = "SELECT * FROM private_message INNER JOIN profiles ON private_message.sender_ID = profiles.profile_ID WHERE msg_ID = " . $id;
            $result = mysqli_query($connection->getConnection(), $command);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='row'>"
                    . "<div class=col-3>"
                    . "<img src='" . $this->getProfilePicture($row['username'], $row['profile_pic']) . "' class='img-fluid rounded'>"
                    . "</div>"
                    . "<div class='col-9 text-center'>"
                    . "<h3>" . $row['username'] . "</h3>"
                    . "<p>" . $row['send_timestamp'] . "</p>"
                    . "</div>"
                    . "<div class='col-12 mt-3 text-center border-bottom'>"
                    . "<p class='float-left'>Címzett: " . $_COOKIE['username'] . "</p>"
                    . "</div>"
                    . "<div class='col-12 mt-3 mb-3 text-center'>"
                    . "<p>" . $row['message'] . "</p>"
                    . "</div>";
                    if ($row['sender_ID'] != 1) {
                        echo "<div class='col-12 text-center'>"
                        . "<form action='SendMessage.php' method='post'>"
                        ."<input type='hidden' name='profile-id' value='".$row['profile_ID']."'>"
                        . "<input type='submit' class='btn btn-success' value='Válasz'>"
                        . "</form>"
                        . "</div>";
                    }
                    echo "</div>";
                }
            } else {
                if ($this->getBasedon() == 0) {
                    echo "<div class='col-12 text-center'>"
                    . "Nem kaptál még üzenetet!"
                    . "</div>";
                } else {
                    echo "<div class='col-12 text-center'>"
                    . "Nem küldtél még üzenetet!"
                    . "</div>";
                }
            }
        }
    }

    public function editMessage($message) {
        if (strlen($message) > 80) {
            return substr($message, 0, 77) . "...";
        } else {
            return $message;
        }
    }

    public function writeMessages() {
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $command = $this->selectBased($this->getBasedon());
            $result = mysqli_query($connection->getConnection(), $command);
            $i = 10;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['seen'] == 0) {
                        echo "<div class='col-12 text-center mt-3 border-bottom hover font-weight-bold' id='submit" . $i . "' onclick='submit(this); showMessageBox();'>";
                    } else {
                        echo "<div class='col-12 text-center mt-3 border-bottom hover' id='submit" . $i . "' onclick='submit(this); showMessageBox();'>";
                    }
                    echo "<form id='submit" . $i++ . "' action='#' method='post'>"
                    . "<input type='hidden' name='msg-id' value='" . $row['msg_ID'] . "'>"
                    . "<div class='row'>"
                    . "<div class=col-3>"
                    . "<img src='" . $this->getProfilePicture($row['username'], $row['profile_pic']) . "' class='img-fluid rounded'>"
                    . "</div>"
                    . "<div class='col-9 text-center'>"
                    . "<h3>" . $row['username'] . "</h3>"
                    . "<p>" . $row['send_timestamp'] . "</p>"
                    . "<p>" . $this->editMessage($row['message']) . "</p>"
                    . "</div>"
                    . "</div>"
                    . "</form>"
                    . "</div>";
                }
            } else {
                if ($this->getBasedon() == 0) {
                    echo "<div class='col-12 text-center'>"
                    . "Nem kaptál még üzenetet!"
                    . "</div>";
                } else {
                    echo "<div class='col-12 text-center'>"
                    . "Nem küldtél még üzenetet!"
                    . "</div>";
                }
            }
        }
    }

}
