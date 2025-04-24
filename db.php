<?php

$host = "Localhost";
$user = "root";
$pass = "";
$db = "gallery_db";

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error) {
    die("Connecton error :" . $conn->connect_error);
}

?>