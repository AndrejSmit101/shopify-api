<?php
require_once(__DIR__ . '/../Model/database.php');
class Login {
    public $status;
    public function __construct($email, $password) {
        $this->status = $this->loginUser($email, $password);
    }


    private function loginUser($email, $password) {
        global $database;
        $email = $database->escapeString($email);
        $password = $database->escapeString($password);
        $sql = "SELECT * FROM customers WHERE email='$email' AND password='$password'";
        $query = $database->Query($sql);
        $row = mysqli_fetch_array($query);
        if(!$row) {
            return "400";
        } else {
            return "200";
        }
    }
}