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

// Process login request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform input validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle invalid email format
        header("Location: /slider-parallax-effect/dist/signin.php?error=invalid_email");
        exit();
    }

    // Perform database query to check if the user exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        // User exists
        if (password_verify($password, $user['password'])) {
            // Password is correct

            // Check if the user is an admin or a customer
            if ($user['role'] === 'admin') {
                // Perform additional verification for admin role (if required)

                // Start a secure session
                session_start();

                // Store user data in the session
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'role' => $user['role']
                ];

                // Redirect to the admin dashboard
                header("Location: /slider-parallax-effect/dist/index.php?role=admin_page");
                exit();
               
            } else {
                // Perform additional verification for customer role (if required)

                // Start a secure sessionForgot password?
                
                   
                session_start();

                // Store user data in the session
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'role' => $user['role']
                ];

                // Redirect to the customer dashboard
                header("Location: /slider-parallax-effect/dist/homepage.php");
                exit();
            }
        } else {
             // Redirect to the customer dashboard
             header("Location: /slider-parallax-effect/dist/login-signup.php?error=wrong_password");
             exit();
        }
    } else {
        header("Location: /slider-parallax-effect/dist/login-signup.php?error=email_not_found");
        exit();
    }
}
?>

