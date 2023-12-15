<?php

$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "test_assignment";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$n = 3; // Replace this with the desired value for n

// SELECT nth highest price from the 'products' table
$select_sql = "
    SELECT price
    FROM products
    ORDER BY price DESC
    LIMIT 1 OFFSET " . ($n - 1) . ";
";

$result = $conn->query($select_sql);

if ($result !== false && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "The " . $n . "(th) highest price is: $" . $row["price"];
} else {
    echo "No data found or not enough records to determine the " . $n . "(th) highest price.";
}

// Close the database connection
$conn->close();

?>
