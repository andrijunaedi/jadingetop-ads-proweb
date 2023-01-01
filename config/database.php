<?php
$servername = "127.0.0.1";
$username = "root";
$password = "root@12*";
$dbname = "jadingetop_ads";
$dbport = "3366";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $dbport);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
