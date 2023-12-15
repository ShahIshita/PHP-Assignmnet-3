<?php

$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "test_assignment";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$create_sql = "CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    status BOOLEAN NOT NULL
)";

if ($conn->query($create_sql) === TRUE) {
    echo "Table 'categories' created successfully\n";

    $insert_Sql = "INSERT INTO categories (name, status) VALUES
                  ('categories 1', 1),
                  ('categories 2', 0),
                  ('categories 3', 1),
                  ('categories 4', 0),
                  ('categories 5', 1)";

    if ($conn->query($insert_Sql) === TRUE) {
        echo "Data inserted successfully in categories\n";
    } else {
        echo "Error inserting data in categories: " . $conn->error;
    }

} else {
    echo "Error in creating categories table: " . $conn->error;
}

$conn->close();

?>
