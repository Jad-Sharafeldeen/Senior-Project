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

// Handle the reset password process
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $newPassword = $_POST['new_password'];

    // Validate the token and retrieve the associated user
    $stmt = $pdo->prepare("SELECT * FROM users WHERE reset_token = ? AND token_expiration > NOW()");
    $stmt->execute([$token]);
    $user = $stmt->fetch();

    if ($user) {
        // Token is valid
        // Update the user's password with the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE users SET password = ?, reset_token = NULL, token_expiration = NULL WHERE email = ?");
        $stmt->execute([$hashedPassword, $user['email']]);

        // Password reset successful
        // Redirect to a confirmation page or login page
        header("Location: /slider-parallax-effect/dist/forgot_password.php");
        exit();
    } else {
        // Invalid or expired token
        $error = "Invalid or expired token";
    }
}

// Display the password reset form
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
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

        input[type="password"] {
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
    <div class="container">
        <h1>Reset Password</h1>
        <?php if (isset($error)): ?>
            <p>Error: <?php echo $error; ?></p>
        <?php endif; ?>
        <form action="/slider-parallax-effect/dist/reset_password.php" method="post">
            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
            <input type="password" name="new_password" placeholder="New Password" required>
            <button type="submit">Reset Password</button>
        </form>
    </div>
</body>
</html>

