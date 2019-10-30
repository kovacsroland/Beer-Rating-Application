<?php

include_once 'DatabaseConnection.php';

class CreateOptionsFromDB {

    private $table, $columnid, $column;

    public function __construct($table, $columnid, $column) {
        $this->setTable($table);
        $this->setColumnid($columnid);
        $this->setColumn($column);
        $this->optionsFromDB();
    }

    function getTable() {
        return $this->table;
    }

    function getColumn() {
        return $this->column;
    }

    function getColumnid() {
        return $this->columnid;
    }

    function setTable($table) {
        $this->table = $table;
    }

    function setColumn($column) {
        $this->column = $column;
    }

    function setColumnid($columnid) {
        $this->columnid = $columnid;
    }

    public function optionsFromDB() {
        $connection = new DatabaseConnection();
        if ($connection->connectDB()) {
            $command = "SELECT " . $this->getColumnid() . ", " .$this->getColumn(). " FROM " . $this->getTable() . " ORDER BY " . $this->getColumn();
            $result = mysqli_query($connection->getConnection(), $command);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row[$this->getColumnid()] . "'>" . $row[$this->getColumn()] . "</option>";
            }
        }
    }

}
