<?php
require_once(__DIR__ . '/../Model/database.php');
class Register {
    public $status;
    public function __construct($email, $password, $firstname, $lastname) {
        $this->status = $this->registerUser($email, $password, $firstname, $lastname);
    }


    private function registerUser($email, $password, $firstname, $lastname) {
        global $database;
        $email = $database->escapeString($email);
        $password = $database->escapeString($password);
        $fname = $database->escapeString($fname);
        $lname = $database->escapeString($lname);
        $sql = "INSERT INTO customers (email, password, first_name, last_name) ";
        $sql .= "VALUES ('$email', '$password', '$firstname', '$lastname')";
        $query = $database->Query($sql);
        $row = mysqli_fetch_array($query);
        if(!$row) {
            return "400";
        } else {
            return "200";
        }
    }

}