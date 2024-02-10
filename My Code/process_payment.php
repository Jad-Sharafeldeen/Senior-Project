<?php
// Include the Stripe library
require_once('vendor/autoload.php'); // Adjust the path to the Stripe library

// Set your Stripe secret key
\Stripe\Stripe::setApiKey('sk_test_51NG0bzCi8gKmqdOZLkYUDo5fQvgqu6g5Bp01ps1dCHQNE2uaGxGl5aQOYtyPZdjG8V7vSD4mF0ZZ5s0BrF1KrcDs00oAk1X9qR'); // Replace with your Stripe secret key

// Retrieve the token and purchased items from the AJAX request
$data = json_decode(file_get_contents('php://input'), true);

$token = $data['token'];
$purchasedItems = $data['purchasedItems'];
$totalPrice = floatval($data['totalPrice']); // Assuming `totalPrice` is the calculated total amount


// Create a customer in Stripe
$customer = \Stripe\Customer::create([
  'source' => $token,
  'name' => $data['name'],

  'email' => $data['email']
]);

// Create a payment 
$paymentIntent = \Stripe\PaymentIntent::create([

  'amount' => $totalPrice * 100,
  'currency' => 'usd',
  'description' => 'Purchased Items: ' . $purchasedItems,
  'customer' => $customer->id
]);



?>