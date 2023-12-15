<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysql_assignment-3";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create a stored procedure
$stored_procedure_sql = "
    DELIMITER //
    CREATE PROCEDURE GetActiveProducts()
    BEGIN
        SELECT id, name, price, stock
        FROM products
        WHERE status = 1
        ORDER BY price DESC
        LIMIT 5;
    END //
    DELIMITER ;
";

if ($conn->multi_query($stored_procedure_sql) === TRUE) {
    echo "Stored procedure 'GetActiveProducts' created successfully\n";

    // Call the stored procedure
    $call_procedure_sql = "CALL GetActiveProducts()";
    $result = $conn->query($call_procedure_sql);

    if ($result->num_rows > 0) {
        echo "Product records:\n";
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"] . ", Name: " . $row["name"] . ", Price: $" . $row["price"] . ", Stock: " . $row["stock"] . "\n";
        }
    } else {
        echo "No products found.";
    }

} else {
    echo "Error creating stored procedure: " . $conn->error;
}

// Close the database connection
$conn->close();

?>
