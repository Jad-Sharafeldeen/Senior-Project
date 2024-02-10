<?php
// Establish a database connection
$host = 'localhost';
$db = 'senior';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Process signup request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword=$_POST['confirm-password'];
    // Perform input validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle invalid email format
        header("Location: /signup.php?error=invalid_email");
        exit();
    }

    // Check if the email is already registered
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $existingUser = $stmt->fetch();
    //$existingUser = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($existingUser) {
        // Email is already registered
        header("Location:/slider-parallax-effect/dist/login-signup.php?error=email_taken");
        exit();
    }
if($password !== $confirmPassword){
    header("Location: /slider-parallax-effect/dist/login-signup.php?error=confirm-password");
        exit();
}
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user into the database as a customer
    $stmt = $pdo->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, 'customer')");
    $stmt->execute([$email, $hashedPassword]);

    // Start a secure session
    session_start();

    // Store user data in the session
    $_SESSION['user'] = [
        
        'email' => $email,
        'role' => 'customer'
    ];

    // Redirect to the customer dashboard
    header("Location: /slider-parallax-effect/dist/homepage.php");
    exit();
}
?>
