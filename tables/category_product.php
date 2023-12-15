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

$create_sql = "CREATE TABLE IF NOT EXISTS category_product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT,
    product_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
)";

if ($conn->query($create_sql) === TRUE) {
    echo "Table 'category_products' created successfully\n";

    $insert_Sql = "INSERT INTO category_product (category_id, product_id) VALUES
                  (1, 1),
                  (1, 2),
                  (2, 3),
                  (3, 4),
                  (2, 5)";

    if ($conn->query($insert_Sql) === TRUE) {
        echo "Data inserted in category_product successfully\n";
    } else {
        echo "Error inserting data in category_product: " . $conn->error;
    }

} else {
    echo "Error creating category_product table: " . $conn->error;
}

$conn->close();

?>
