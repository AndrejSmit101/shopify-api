<?php
require_once(__DIR__ . '/includes/init.php');

$email = $_GET['email'];
$password = $_GET['pass'];

$login = new Login($email, $password);

$status = $login->status;
$response = [
    "status" => $status
];

echo json_encode($response);