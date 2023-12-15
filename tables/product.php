<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "test_assignment";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$create_sql = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255), 
    stock INT NOT NULL,
    status BOOLEAN NOT NULL
)";

if ($conn->query($create_sql) === TRUE) {
    echo "Table 'products' created successfully\n";

    $insert_Sql = "INSERT INTO products (name, price, image, stock, status) VALUES
                  ('Pen ', 10, 'image1.jpg', 100, 1),
                  ('Pencil', 15, 'image2.jpg', 120, 0),
                  ('Watch', 70, 'image3.jpg', 50, 1),
                  ('Headphone', 39.90, 'image4.jpg', 75, 0),
                  ('Wallets', 30, 'image5.jpg', 80, 1),
                  ('perfume', 87, 'image6.jpg', 60, 1),
                  ('Mug', 28.40, 'image7.jpg', 20, 1),
                  ('Keychain', 20, 'image7.jpg', 90, 1)";

    if ($conn->query($insert_Sql) === TRUE) {
        echo "Data inserted successfully in product\n";
    } else {
        echo "Error inserting data in product: " . $conn->error;
    }

} else {
    echo "Error creating product table: " . $conn->error;
}

$conn->close();

?>
