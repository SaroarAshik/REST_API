<?php

use Firebase\JWT\JWT;
include 'vendor/autoload.php';

$key = "1234";

$payload = [
    "name" => "Saroar",
    "pass" => "12345678",
    "mobile" => "01725181333",
    "city" => "Dhaka"
];

$encodedString = JWT::encode($payload, $key, 'HS256');

echo $encodedString;



?>