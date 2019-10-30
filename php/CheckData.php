<?php

include_once 'DatabaseConnection.php';

class CheckData {

    private $table, $data, $input;

    public function __construct($table, $data, $input) {
        $this->setData($data);
        $this->setInput($input);
        $this->setTable($table);
    }

    function getTable() {
        return $this->table;
    }

    function getData() {
        return $this->data;
    }

    function getInput() {
        return $this->input;
    }

    function setTable($table) {
        $this->table = $table;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setInput($input) {
        $this->input = $input;
    }

    public function checkData() {
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $query = "SELECT " . $this->getData() . " FROM " . $this->getTable() . " WHERE " . $this->getData() . " = '" . $this->getInput() . "'";
            $result = mysqli_query($connection->getConnection(), $query);
            if (mysqli_num_rows($result) > 0) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }

}

if (!empty($_GET['user'])) {
    $check = new CheckData("profiles", "username", $_GET['user']);
    $check->checkData();
}
if (!empty($_GET['email'])) {
    $check2 = new CheckData("persons", "email", $_GET['email']);
    $check2->checkData();
}