<?php
// Assuming you are using MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "senior";

// Retrieve the data sent from the AJAX request
$data = json_decode(file_get_contents('php://input'), true);
$productTitle = $data['title'];
$newPrice = $data['price'];

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare a SQL statement to select the product based on the title
$stmt = $conn->prepare("SELECT * FROM products WHERE productTitle = ?");
$stmt->bind_param("s", $productTitle);
$stmt->execute();

// Retrieve the result of the SQL query
$result = $stmt->get_result();

// Check if the product exists
if ($result->num_rows > 0) {
    // Update the price of the existing product
    $updateStmt = $conn->prepare("UPDATE products SET price = ? WHERE productTitle = ?");
    $updateStmt->bind_param("is", $newPrice, $productTitle);
    $updateStmt->execute();
    $updateStmt->close();
} else {
    // Insert a new product if it doesn't exist
    $insertStmt = $conn->prepare("INSERT INTO products (productTitle, price) VALUES (?, ?)");
    $insertStmt->bind_param("si", $productTitle, $newPrice);
    $insertStmt->execute();
    $insertStmt->close();
}

// Close the database connection
$stmt->close();
$conn->close();
?>
