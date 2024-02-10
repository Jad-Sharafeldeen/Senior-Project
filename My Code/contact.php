<?php

$hostname = 'localhost';
$dbname = 'senior';
$username = 'root';
$password = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Sanitize and validate input
  $name = preg_replace('/\s+/', '', substr($_POST['name'], 0, 50));
  if (!preg_match("/^[a-zA-Z &]*$/", $name)) {
    header('Location: contact.php?error=invalidname');
    exit();
  }

  $email = preg_replace('/\s+/', '', substr($_POST['email'], 0, 50));
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: contact.php?error=invalidemail');
    exit();
  }

  $phone = htmlspecialchars($_POST['phone']);
  if (!preg_match("/^[0-9+]+$/", $phone)) {
    header('Location: contact.php?error=invalidphone');
    exit();
  }

  $message = htmlspecialchars(substr($_POST['message'], 0, 1000));
  if (!preg_match("/^[a-zA-Z0-9 !@#$%&*()\-+=\[\];:'\",.\/?]*$/", $message)) {
    header('Location: contact.php?error=invalidmessage');
    exit();
  }


  $secretKey = "6LcIZ0wlAAAAAPrCRCu4aWQwmnkvGVOU4EwjEWb2";
  $responseKey = $_POST['g-recaptcha-response'];
  $userIP = $_SERVER['REMOTE_ADDR'];

  $url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKey . "&response=" . $responseKey . "&remoteip=" . $userIP;

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $response = curl_exec($curl);
  curl_close($curl);

  $decodedResponse = json_decode($response, true);

  if ($decodedResponse['success'] == false) {

    header('Location: contact.php?error=validateReCaptcha');
    exit();
  }


  //Database connection

  $conn = new mysqli($hostname, $username, $password, $dbname);
  if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
  } else {
    // Prepared statement with stored procedure
    $stmt = $conn->prepare("insert into customer(name, email, phone, message) values(?, ?, ?, ?)");

    // Bind parameters with types
    $stmt->bind_param("ssis", $name, $email, $phone, $message);
    // Execute prepared statement
    $stmt->execute();


    // Close statement and connection
    $stmt->close();
    $conn->close();

    echo "<script>window.location.href='contact.php?success';</script>";
    exit();

  }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">

  <title>Tetrax | contact Us | Accomplish Your Goal
  </title>
  <meta name="description"
    content="We'd love to hear from you if you're looking to solve a problem or achieve a goal by providing the best digital experience for your customers and users. ">
  <meta name="keywords"
    content="creative agency, creative, Advertising, Branding, WEBSITE, web Development, design, graphic design, Social, social media, marketing, video animator, video editor">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="canonical" href="https://www.tetrax.com/contact" />
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
    rel="stylesheet" />
  <!-- SimpleLightbox plugin CSS-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="icon" href="imgs/slare1.png" type="icon">
  <link rel="stylesheet" href="intouchStyle3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-YJS5E55VJ4"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-YJS5E55VJ4');
  </script>


  <script>
    function myFunction() {
      document.getElementById('myTopnav').classList.toggle('responsive');
    }
  </script>

</head>

<body id="top">

  <header>
    <div class="topnav " id="myTopnav">

      <a class="topLogo " href="homepage.php"><img src="imgs/tetrax group logo.png" class="logo" alt="TETRAX logo"></a>


      <div class="atsa ">
        <a class="nav-link class1 a " href="homepage.php">Home</a>
        <a class="nav-link class1 a" href="index.php">Our products</a>
        <a class="nav-link class2 a" href="services.php">Our services</a>
        <a class="nav-link class3 a" href="about.php">About us</a>
        <a class="nav-link class4 a about" href="#">Contact us</a>
      </div>

      <a href="javascript:void(0);" class="icon" onclick="myFunction()"><i class="bi bi-justify"></i></a>

    </div>


  </header>
  <?php
  session_start();
  if (isset($_SESSION['user'])) {
    $email = $_SESSION['user']['email'];
    $role = $_SESSION['user']['role'];
?>
    <div class="current-user">
      <h2 class='customer-name'>
        <?php echo htmlspecialchars($email); ?>
      </h2>
      <form action='signout.php' style="border: none;" method='post'> <button class='sign-out'>signout</button></form>

    </div>
    <!-- Rest of the customer dashboard content goes here -->
    <?php

  } else {
    // Redirect unauthorized users
    header("Location: /signin.php");
    exit();
  }

  ?>
<!--   <div class="justify-content-center"><img src="imgs/Dont Be Shy.png" class="img-fluid mx-auto d-block hi"
      alt="Text that says “DON'T BE SHY SAY HI!"></div> -->


  <div class="row roform">

    <div class="col-lg-8 col-md-8 col-sm-12 col-wid">
      <?php

      ?>
      <form method="post" name="myemailform" action="">
        <div class=" align-text-center ">
          <label for="name" class="form-label" id="p2"> Name:
            <?php if (isset($_GET['error'])) if ($_GET['error'] == 'invalidname')
              echo '<h5 style="color:red; display: inline">Invalid Name</h5>' ?>
              </label>
              <br>
              <input name="name" type="text" class="mb-3" placeholder="Enter First Name" required>
              <br>
              <label for="email" class="form-label" id="p2">Email:
            <?php if (isset($_GET['error'])) if ($_GET['error'] == 'invalidemail')
              echo '<h5 style="color:red; display: inline">Invalid Email</h5>' ?>
              </label>
              <br>
              <input name="email" type="email" class="mb-3" placeholder="email@example.com" required>
              <br>
              <label for="phone" class="form-label" id="p2">Phone:
            <?php if (isset($_GET['error'])) if ($_GET['error'] == 'invalidphone')
              echo '<h5 style="color:red; display: inline">Invalid Phone</h5>' ?>
              </label>
              <br>
              <input name="phone" type="tel" class="mb-3" id="phone1" placeholder="+###  " name="phone1" required>
            </div>
            <div class="mb-3 mt-3">
              <label for="message" class="form-label" id="p2">Your Message:
            <?php if (isset($_GET['error'])) if ($_GET['error'] == 'invalidmessage')
              echo '<h5 style="color:red; display: inline">Invalid Characters: ^ { } [ ] | < ></h5>' ?>
              </label>
              <br>
              <textarea name="message" required></textarea>
            </div>
            <div class="g-recaptcha" data-sitekey="6LcIZ0wlAAAAAJj5Yle0qMi4kU8SVMPjWktVtQL7"></div>
        <?php if (isset($_GET['error'])) if ($_GET['error'] == 'validateReCaptcha')
              echo '<h5 style="color:red; display: inline">validate reCaptcha</h5>' ?>

            <input name="submitbtn" type="submit" class="button" value="SUBMIT">

          </form>

          <div class="video-container"></div>

          <script>
            const video = `<div class="col col-lg-8 col-md-8 col-sm-12 ">
            <video id="video" src="animation/plane.mp4" muted autoplay playsinline></video>
            </div>`;
            const videoContainer = document.getElementsByClassName('video-container')[0];
            const form = document.querySelector('form');
            const currentUrl = window.location.href;
            if (currentUrl.indexOf('success') !== -1) {
              form.style.display = 'none';
              videoContainer.innerHTML = video;
            }
          </script>


        </div>
        <div class="col-lg-1 col-md-1 col-sm-12 center"></div>
        <!-- second part -->
        <div class="col-lg-3 col-md-3 col-sm-12 under">
          <p id="p1"><strong>SURPRISE US WITH A CALL</strong> <br> </p>
          <p id="p2"><strong><a href="Tel: 81 16 11 21" target="_blank" rel="noopener">+961 81 16 11 21 </a></strong></p>
          <hr class="divider" />
          <br>

          <p id="p1"><strong>SHARE THE BIG PICTURE</strong> <br> </p>
          <p id="p2"><strong><a href="mailto:info@tetraxWeb.net" target="_blank"
                rel="noopener">info@tetraxWeb.net</a></strong></p>
          <hr class="divider" />
          <br>

          <div class="bas">
            <p id="p1"><strong>WHERE ARE WE?</strong> <br> </p>
            <p id="p2"><strong><a rel="noopener"
                  href="https://www.google.com/maps/place/Moon+Lines+Agency/@33.8093037,35.6000119,17z/data=!3m1!4b1!4m5!3m4!1s0x151f23b938b5ab5d:0x8197debe98a5b50e!8m2!3d33.8093037!4d35.6022006?coh=164777&entry=tt"
                  target="_blank"><i class="bi bi-geo-alt-fill location fs-1"></i>Aley, Mount Lebanon </a></strong></p>
            <hr class="divider" />
            <br>
            <p id="p1"><strong>GET IN TOUCH</strong> <br></p>
            <ul>

              <li><a href="https://www.facebook.com/tetraxWebagency.sarl" type="button" rel="noopener" target="_blank"><i
                    class="bi bi-facebook fs-1  "></i></a></li>
              <li><a href="https://www.instagram.com/tetraxWeb.sarl/" type="button" rel="noopener" target="_blank"><i
                    class="bi bi-instagram fs-1"></i></a></li>
              <li><a href="https://www.linkedin.com/company/tetrax-agency/" type="button" rel="noopener" target="_blank"><i
                    class="bi bi-linkedin fs-1"></i></a></li>
              <li><a href="https://wa.me/message/7222ETDODZXMC1?src=qr" type="button" target="_blank" rel="noopener"><i
                    class="bi bi-whatsapp fs-1"></i></a></li>
              <li><a href="https://twitter.com/tetraxWebAgency" type="button" target="_blank" rel="noopener"><i
                    class="bi bi-twitter fs-1"></i></a></li>
              <li><a href="https://www.tiktok.com/@tetraxWeb.sarl" type="button" target="_blank" rel="noopener"><i
                    class="bi bi-tiktok fs-1"></i></a></li>
            </ul>
            <hr class="divider hid" />
            <br>

          </div>
        </div>
        <footer>
          <div class="copyright" style="font-family: montserrat;">
            &copy2023 Tetrax - All rights reserved
          </div>
        </footer>
        <script>
          // Get the message textarea element
          const messageTextarea = document.querySelector('textarea[name="message"]');
          const nameInput = document.querySelector('input[name="name"]');
          const emailInput = document.querySelector('input[name="email"]');
          const phoneInput = document.querySelector('input[name="phone"]');

          // Retrieve the input values from localStorage, if they exist
          const nameData = localStorage.getItem('nameData');
          const emailData = localStorage.getItem('emailData');
          const phoneData = localStorage.getItem('phoneData');
          if (nameData) {
            nameInput.value = nameData;
          }
          if (emailData) {
            emailInput.value = emailData;
          }
          if (phoneData) {
            phoneInput.value = phoneData;
          }

          // Listen for changes to the input fields and save the data to localStorage
          nameInput.addEventListener('input', () => {
            localStorage.setItem('nameData', nameInput.value);
          });
          emailInput.addEventListener('input', () => {
            localStorage.setItem('emailData', emailInput.value);
          });
          phoneInput.addEventListener('input', () => {
            localStorage.setItem('phoneData', phoneInput.value);
          });

          // Retrieve the message data from localStorage, if it exists
          const messageData = localStorage.getItem('messageData');
          if (messageData) {
            messageTextarea.value = messageData;
          }

          // Listen for changes to the message textarea and save the data to localStorage
          messageTextarea.addEventListener('input', () => {
            localStorage.setItem('messageData', messageTextarea.value);
          });

        </script>
    </body>

    </html>