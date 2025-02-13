<?php
$servername = "localhost";
$username = "trtkp24_8";
$password = "koDH8eoM";
$dbname = "trtkp24_8";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Yhteys epäonnistui: " . $conn->connect_error);
}
?>