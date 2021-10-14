<?php
require_once(__DIR__ . '/../Config/config.php');

class Database {
    private $connection;

    public function __construct() {
        $this->dbConnect();
    }

    private function dbConnect() {
        $this->connection = new Mysqli(DBHOST, DBUSER, DBPWD, DBNAME);
        if($this->connection->connect_errno) {
            die($this->connection->connect_error);
        }
    }

    public function Query($sql) {
        return $this->connection->query($sql);
    }

    public function checkQuery() {
        if($this->connection->errno) {
            echo $this->connection->error;
        }
    }

    public function escapeString($string) {
        return $this->connection->real_escape_string($string);
    }
}
$database = new Database();