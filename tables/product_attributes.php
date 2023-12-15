<?php

$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "test_assignment";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$create_sql = "CREATE TABLE IF NOT EXISTS product_attributes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    attribute_name VARCHAR(255) NOT NULL,
    attribute_values TEXT,
    FOREIGN KEY (product_id) REFERENCES products(id)
)";

if ($conn->query($create_sql) === TRUE) {
    echo "Table 'product_attributes' created successfully\n";

    $insert_Sql = "INSERT INTO product_attributes (product_id, attribute_name, attribute_values) VALUES
                  (1, 'Color', '[\"Red\", \"Black\", \"Green\"]'),
                  (2, 'Size', '[\"Small\", \"Medium\", \"Large\"]'),
                  (3, 'Weight', '[\"1.5 kg\"2.5 kg\"3 kg\"]'),
                  (4, 'Dimensions', '{\"length\": 10, \"width\": 5, \"height\": 2}'),
                  (5, 'Material', '[\"Leather\", \"Metal\"]')";

    if ($conn->query($insert_Sql) === TRUE) {
        echo "Data inserted in product_attributes successfully\n";
    } else {
        echo "Error inserting data in product_attributes: " . $conn->error;
    }

} else {
    echo "Error creating product_attributes table: " . $conn->error;
}

$conn->close();

?>
