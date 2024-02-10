<?php
// Retrieve the request payload sent from the JavaScript code
$cartData = json_decode(file_get_contents('php://input'), true);

// Database configuration
$host = 'localhost'; 
$dbUsername = 'root'; 
$dbPassword = '';  
$dbName = 'senior'; 

// Create a new database connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check if the connection was successful
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Prepare the SQL query with placeholders
$query = 'INSERT INTO receipt (email ,phone,address, description, price) VALUES (?,? ,? ,? ,?)';

// Create a prepared statement
$stmt = $conn->prepare($query);

// Bind the values to the prepared statement parameters
$stmt->bind_param('sissd',$email, $phone,$address, $description, $price);

// Loop through each product and execute the prepared statement

    $email= $cartData['email'];
    $phone = $cartData['phone'];
    $description = $cartData['purchasedItems'];
    $address=$cartData['alladress'];
    $price = $cartData['tetraxPrice'];
    

    $stmt->execute();


// Close the prepared statement and database connection
$stmt->close();
$conn->close();

// Send a response back to the JavaScript code
$response = [
  'success' => true,
  'message' => 'Products added to the database successfully.'
];

header('Content-Type: application/json');
echo json_encode($response);
?>
