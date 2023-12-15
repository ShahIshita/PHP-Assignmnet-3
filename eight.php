<?php

$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "test_assignment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully\n";

// Your database operations go here

// Close connection
$conn->close();
echo "Connection closed\n";

?>
