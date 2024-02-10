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

// Process forget password request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Perform input validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Handle invalid email format
        header("Location: /slider-parallax-effect/dist/forget_password.php?error=invalid_email");
        exit();
    }

    // Check if the email exists in the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        // Generate a random token and set the token expiration time
        $token = bin2hex(random_bytes(32));
        $tokenExpiration = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Update the user's token and token expiration in the database
        $stmt = $pdo->prepare("UPDATE users SET reset_token = ?, token_expiration = ? WHERE email = ?");
        $stmt->execute([$token, $tokenExpiration, $email]);

        // Send the password reset email with the reset link
        $resetLink = "https://example.com/reset_password.php?token=" . $token;
        $emailContent = "Please click on the following link to reset your password: " . $resetLink;

        // Send the email to the user's email address
        $to = $email;
        $subject = "Password Reset";
        $headers = "From: Your Website <noreply@example.com>\r\n";
        $headers .= "Content-type: text/html\r\n";
        mail($to, $subject, $emailContent, $headers);

        // Redirect to a success page after sending the email
        header("Location: /slider-parallax-effect/dist/reset_email_sent.php");
        exit();
    } else {
        // User not found
        $error = "User not found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            background: -webkit-linear-gradient(left, #7579ff, #b224ef);
        }

        h1 {
            color: black;
            text-align: center;
            margin-top: 30vh;
        }

        form {
            width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            
        }

        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: darkblue;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        p {
            margin-top: 20px;
            color: #666;
            text-align: center;
        }

        p.error {
            color: #FF5252;
        }
    </style>
</head>
<body>
    <h1>Forgot Password</h1>
    <?php if (isset($successMessage)): ?>
        <p><?php echo $successMessage; ?></p>
    <?php endif; ?>
    <?php if (isset($error)): ?>
        <p class="error">Error: <?php echo $error; ?></p>
    <?php endif; ?>
    <form action="/slider-parallax-effect/dist/forgot_password.php" method="post">
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
