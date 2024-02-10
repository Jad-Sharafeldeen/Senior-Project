<?php
// Retrieve the posted data
$data = json_decode(file_get_contents("php://input"), true);

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "senior";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind the insert statement
$stmt = $conn->prepare("INSERT INTO products (logo, price, productTitle, productDesc, productImg, productType) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sissss", $logo, $price, $productTitle, $productDesc, $productImg, $productType);

// Insert each product into the database
foreach ($data as $product) {
    $logo = $product['logo'];
    $price = $product['price'];
    $productTitle = $product['productTitle'];
    $productDesc = $product['productDesc'];
    $productImg = $product['productImg'];
    $productType = $product['productType'];
    $stmt->execute();
}

$stmt->close();
$conn->close();
?>
