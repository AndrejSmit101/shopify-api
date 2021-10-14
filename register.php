<?php
require_once(__DIR__ . '/includes/init.php');

$email = $_GET['email'];
$password = $_GET['pass'];
$fname = $_GET['fname'];
$lname = $_GET['lname'];

$register = new Register($email, $password, $fname, $lname);

$status = $register->status;
if($status) {
    $array = [
        "status" => "200"
    ];
} else {
    $array = [
        "status" => "400"
    ];
}

echo json_encode($array);