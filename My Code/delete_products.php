<?php


$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'senior';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the submitted data
  $data = json_decode(file_get_contents('php://input'), true);

  // Check if the 'title' field is provided
  if (isset($data['titleDeleted'])) {
      $productTitle = $data['titleDeleted'];

      $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
      if ($conn->connect_error) {
          die('Connection Failed: ' . $conn->connect_error);
      }

      // Prepare a statement to check if the title exists
      $checkStmt = $conn->prepare("SELECT COUNT(*) FROM products WHERE productTitle = ?");
      $checkStmt->bind_param("s", $productTitle);
      $checkStmt->execute();
      $checkResult = $checkStmt->get_result();
      $rowCount = $checkResult->fetch_assoc()['COUNT(*)'];

      // If the title exists, delete the row
      if ($rowCount > 0) {
          // Prepare a statement to delete the row
          $deleteStmt = $conn->prepare("DELETE FROM products WHERE productTitle = ?");
          $deleteStmt->bind_param("s", $productTitle);
          $deleteStmt->execute();
          $deleteStmt->close();

          echo json_encode(['success' => true, 'message' => 'Row deleted successfully.']);
      } else {
          echo json_encode(['success' => false, 'message' => 'Title not found in the database.']);
      }
      

      // Close connection
      $checkStmt->close();
      $conn->close();
  } else {
      echo json_encode(['success' => false, 'message' => 'Title field not provided.']);
  }

  exit();
}
?>
