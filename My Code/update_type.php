<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "senior";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the data sent from the client-side
$data = json_decode(file_get_contents('php://input'), true);
$productTitle = $data['title'];
$newtype = $data['type'];

$sql = "UPDATE products SET productType = '$newtype' WHERE productTitle = '$productTitle'";

if ($conn->query($sql) === TRUE) {
    echo "desc updated successfully";
} else {
    echo "Error updating desc: " . $conn->error;
}

$conn->close();
?>
