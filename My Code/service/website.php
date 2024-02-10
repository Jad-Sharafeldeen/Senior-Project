<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">

  <title>tetraxWeb | Services | Website
  </title>
  <meta name="description"
    content="tetraxWeb provides your business with all types of website services including Website design and maintenance, and Website Testing">
  <meta name="keywords"
    content="creative team, creative, Advertising, Branding, WEBSITE, web Development, design, graphic design, Social, social media, marketing, Moon, tetraxWeb, tetraxWebteam, tetrax-team, pathfinders, video animator, video editor">
  <meta name="author" content="tetraxWeb team">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="canonical" href="https://www.tetraxWeb.net/service/website" />
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
    rel="stylesheet" />
  <!-- SimpleLightbox plugin CSS-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
  <link rel="icon" href="../imgs/slare1.png" type="icon">
  <link rel="stylesheet" href="websiteStyle1.css">
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

  <script>
    function myFunction() {
      document.getElementById('myTopnav').classList.toggle('responsive');
    }
  </script>

</head>

<body id="top">

  <header>
    <div class="topnav " id="myTopnav">

      <a class="topLogo " href=../homepage.php><img src="imgs/tetrax logo.png" class="logo" alt="TETRAX logo"></a>


      <div class="atsa ">
        <a class="nav-link class1 a " href="homepage.php">Home</a>
        <a class="nav-link class1 a" href="../index.php">Our products</a>
        <a class="nav-link class2 a about" href="../services.php">Our services</a>
        <a class="nav-link class3 a " href="../about.php">About us</a>
        <a class="nav-link class4 a" href="../contact.php">Contact us</a>
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
  <!-- navigation bar end
-->
  <div class="row justify-content-center ">
    <img src="imgs/website.jpg" class="digital" alt="Website development and codes ">

  </div>
  <div class="container-fluid">
    <div class="row">
      <h1>Website</h1>
      <h3 class="head3">Our website designs are always focused on providing results to your company. We offer the best
        solutions for delivering results and developing your business, from creative web design to complex web
        development solutions with an integrated CRM.</h3>
    </div>
    <div class="row raw">
      <div class="col col-lg-6 col-md-12 col-sm-12">
        <h2 id="1">Website Development</h2>
        <h3>Our skilled development team has allowed us to stand out and get noticed. We are well-known for Custom Web
          Application Development, so our experts can guide you if you have a brand-new business idea that requires a
          fully unique solution. Prepare to make an unforgettable imprint on the market. We guarantee that you will
          obtain the best solutions to allow you to develop and grow your company.</h3>
      </div>
      <div class="col col-lg-6 col-md-12 col-sm-12">
        <h2 id="2">Website Maintenance</h2>
        <h3><strong>tetraxWeb </strong> a customized and comprehensive website maintenance plan to help your
          organization achieve
          a quick, secure, and seamless online experience.</h3>
      </div>
    </div>

    <div class="row raw">

      <h2 id="3">Testing</h2>
      <h3 class="last">Surfing the net has already reached new levels. Every user expects and values a well-designed,
        appealing interface as well as a fast, interactive, and secure experience.<strong> tetraxWeb
        </strong>professionals know how to
        raise your website's conversion rates by using the best bugfix techniques and improved user experience. We offer
        full-cycle web testing services for any sort and size of business, to make the web user-friendly and safer. We
        offer automated and human website testing services, as well as a variety of alternative methods for finding
        issues.</h3>


    </div>


  </div>

  <footer>


    <div class="row copyright" style="font-family: montserrat;">
      <div class="col col-lg-6 col-md-12 col-sm-12 col-12 col1">
        <a href="https://www.facebook.com/tetraxWebteam.sarl" target="_blank" rel="noopener" class="media" type="button"
          title="Facebook"><i class="bi bi-facebook"></i></a>

        <a href="https://www.instagram.com/tetraxWeb.sarl/" target="_blank" rel="noopener" class="media" type="button"
          title="Instagram"><i class="bi bi-instagram "></i></a>

        <a href="https://www.linkedin.com/company/tetrax-team/" target="_blank" rel="noopener" class="media"
          type="button" title="LinkedIn"><i class="bi bi-linkedin "></i></a>

        <a href="https://wa.me/message/7222ETDODZXMC1?src=qr" target="_blank" rel="noopener" class="media" type="button"
          title="Whatsapp"><i class="bi bi-whatsapp "></i></a>

        <a href="https://twitter.com/tetraxWebteam" target="_blank" rel="noopener" type="button" class="media"
          title="Twitter"><i class="bi bi-twitter "></i></a>
        <a href="https://www.tiktok.com/@tetraxWeb.sarl" target="_blank" rel="noopener" type="button"
          class="media icons" title="Tiktok"><i class="bi bi-tiktok "></i></a>
      </div>

      <div class="col col col-lg-6 col-md-12 col-sm-12 col-12 col2">
        &copy2023 tetraxWeb.net - All rights reserved

      </div>

    </div>
  </footer>

</body>


</html>