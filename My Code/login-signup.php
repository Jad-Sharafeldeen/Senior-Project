<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="LogInStyle.css">
  <title>Login and Signup</title>
</head>

<body>
<section style="display: inline-block;position:absolute;top:10vh;">
<?php 
if (isset($_GET['error']) && $_GET['error'] === 'confirm-password') {
  echo '<p style="color:red;display:block;">Please confirm your password</p>';
}

          ?>
          <?php 
if (isset($_GET['error']) && $_GET['error'] === 'email_taken') {
  echo '<p style="color:red;display:block;">email already exists</p>';
}
if (isset($_GET['error']) && $_GET['error'] === 'wrong_password') {
  echo '<p style="color:red;display:block;">wrong password</p>';
}
if (isset($_GET['error']) && $_GET['error'] === 'email_not_found') {
  echo '<p style="color:red;display:block;">email not found</p>';
}

          ?>
         
</section>

  <div class="cont">
 
    <div class="form sign-in">
      <h2>Sign In</h2>
      <form action="signin.php" method="POST">
        <label>
          <span>Email</span>
          <input type="email" name="email" required>
        </label>
        <label>
          <span>Password</span>
          <input type="password" name="password" required>
        </label>
        <button type="submit" class="submit">Sign In</button>
        <a href="/slider-parallax-effect/dist/forgot_password.php"><p class="forgot-pass">Forgot password?</p></a>
        <div class="social-media">
          <ul>
            <li><img src="https://raw.githubusercontent.com/abo-elnoUr/public-assets/master/facebook.png"></li>
            <li><img src="https://raw.githubusercontent.com/abo-elnoUr/public-assets/master/twitter.png"></li>
            <li><img src="https://raw.githubusercontent.com/abo-elnoUr/public-assets/master/linkedin.png"></li>
            <li><img src="https://raw.githubusercontent.com/abo-elnoUr/public-assets/master/instagram.png"></li>
          </ul>
        </div>
      </form>
    </div>
    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>New here?</h2>
          <p>Sign up and discover great things!</p>
        </div>
        <div class="img-text m-in">
          <h2>One of us?</h2>
           <p>If you already have an account, just sign in.</p>
        </div>
        <div class="img-btn">
          <span class="m-up">Sign Up</span>
          <span class="m-in">Sign In</span>
        </div>
      </div>
      <div class="form sign-up">
        <h2>Sign Up</h2>
        <form action="signup.php" method="POST">
          <label>
            <span>Email</span>
                  <input type="email" name="email" required>
          </label>
          <label>
            <span>Password</span>
            <input type="password" name="password" required>
          </label>
          <label>
            <span>Confirm Password</span>
            <input type="password" name="confirm-password" required>
          </label>
         
          <button type="submit" class="submit">Sign Up</button>
          <div class="social-media">
          <ul>
            <li><img src="https://raw.githubusercontent.com/abo-elnoUr/public-assets/master/facebook.png"></li>
            <li><img src="https://raw.githubusercontent.com/abo-elnoUr/public-assets/master/twitter.png"></li>
            <li><img src="https://raw.githubusercontent.com/abo-elnoUr/public-assets/master/linkedin.png"></li>
            <li><img src="https://raw.githubusercontent.com/abo-elnoUr/public-assets/master/instagram.png"></li>
          </ul>
           </div>
        </form>
      </div>
    </div>
  </div>

  <script src="LogInScript.js"></script>
</body>

</html>