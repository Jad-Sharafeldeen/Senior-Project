<!DOCTYPE html>
<html>


<head>
  <meta charset="UTF-8">

  <title>Tetrax Web | Branding, Designs, Social Media,
    Web Development, Advertising.
  </title>
  <meta name="description"
    content="Tetrax Web is a creative agency that covers all your needs by implementing and managing innovative strategies for marketing your products and services in a creative visual communication design.">
  <meta name="keywords"
    content="creative agency, creative, Advertising, Branding, WEBSITE, web Development, design, graphic design, Social, social media, marketing, Moon, tetraxWeb, tetraxWebagency, Tetrax Web-agency, pathfinders, video animator, video editor">
  <meta name="author" content="Tetrax Web Agency">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
    rel="stylesheet" />
  <!-- SimpleLightbox plugin CSS-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
  <link rel="icon" href="imgs/slare1.png" type="icon">
  <link rel="stylesheet" href="mainStyle1.css">
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-YJS5E55VJ4"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'G-YJS5E55VJ4');
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script src="https://cdn.lordicon.com/qjzruarw.js"></script>



  <script>
    function myFunction() {
      document.getElementById('myTopnav').classList.toggle('responsive');
    }
  </script>
  <style>
    video#video.content {

      position: fixed;
      top: 50%;
      left: 50%;
      width: 30rem;
      height: auto;
      /* bring your own prefixes */
      transform: translate(-50%, -50%);

    }

    .loader-wrapper {
      width: 100%;
      height: 100%;
      position: absolute;
      top: 0;
      left: 0;
      background-color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 99999;
    }

    /* .span {
  top: 0;
 left:0; 

} */
  </style>


  <script type="text/javascript">
    $(document).ready(function () {
      $('#video').bind('contextmenu', function () { return false; });
    });
  </script>
</head>

<script>
  $(window).on("load", function () {
    $(".loader-wrapper").delay(500).fadeOut("slow");
  });</script>

<body id="top">

  <header>
    <div class="topnav " id="myTopnav">

      <a class="topLogo " href="homepage.php"><img src="imgs/tetrax group logo.png" class="logo" alt="TETRAX logo"></a>


      <div class="atsa ">
        <a class="nav-link class1 a about" href="#">Home</a>
        <a class="nav-link class1 a" href="index.php">Our products</a>
        <a class="nav-link class2 a" href="services.php">Our services</a>
        <a class="nav-link class3 a " href="about.php">About us</a>
        <a class="nav-link class4 a" href="contact.php">Contact us</a>
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

  <section id="main">
    <video id="video" src="blob.mp4" muted autoplay loop></video>

    <footer>
      <div class="row">
        <div class="wrapper col">
          <img src="imgs/the.png" class="the">
          <div class="words">
            <span id='span' class="design">DESIGN</span>
            <span id='span' class="advertising">ADVERTISING</span>
            <span id='span' class="advertising">ANIMATION</span>
            <span id='span' class="development">DEVELOPMENT</span>
            <span id='span' class="branding">BRANDING</span>
            <span id='span' class="digital">DIGITAL MEDIA</span>
            <span id='span' class="social">SOCIAL MEDIA</span>
          </div>

        </div>

      </div>

      <img src="imgs/path-grey.png" class="img-fluid path">

    </footer>


    <div class="loader-wrapper">
      <video id="video" class="content" src="animation/Infinite.mp4" muted autoplay loop></video>
    </div>

  </section>

</body>


</html>