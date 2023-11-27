<?php

use \Firebase\JWT\JWT;
include 'vendor/autoload.php';
use Firebase\JWT\Key;

$key ="1234";


$encodedString ="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJuYW1lIjoiU2Fyb2FyIiwicGFzcyI6IjEyMzQ1Njc4IiwibW9iaWxlIjoiMDE3MjUxODEzMzMiLCJjaXR5IjoiRGhha2EifQ.ns6YZI08BNs2hgy08QV-T-BReBiIYHdPo3vp2mfxOZI";

//$decodedData = JWT::decode($encodedString, $key,array('HS256'));

$decodedData = JWT::decode($encodedString, new Key($key, 'HS256'));

print_r($decodedData);
//echo deoya jabe na...karon akta object ke encode koresilam

?>