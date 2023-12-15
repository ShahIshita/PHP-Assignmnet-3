<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// die("hi");

$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "test_assignment";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$select_sql = "SELECT *
               FROM products
               WHERE status = 1
               ORDER BY price DESC
               LIMIT 5";

$result = $conn->query($select_sql);

if ($result !== false && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . ", Name: " . $row["name"] . ", Price: $" . $row["price"] . ", Stock: " . $row["stock"] . "<br />";
    }
} else {
    echo "No products found.";
}

$conn->close();

?>
