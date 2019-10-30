<?php

include_once 'DatabaseConnection.php';

class MessageInfo {

    public function writeMessageInfo() {
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $command = "SELECT count(message) AS message_count FROM private_message WHERE consignee_ID = (SELECT profile_ID FROM profiles WHERE username = '".$_COOKIE['username']."') AND seen = 0";
            $result = mysqli_query($connection->getConnection(), $command);
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
    }
}
    