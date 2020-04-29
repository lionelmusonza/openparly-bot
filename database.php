<?php
require_once './vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
$serverName = "db4free.net:3306";
$username = "nyaradzo";
$password = "defaultnyaradzopassword";
$dbname = "nyaradzo";
$waNumber = getenv('MY_WHATSAPP_NUMBER');

// Create connection
$conn = new mysqli($serverName, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO todos(phone)
VALUES ($waNumber)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
