<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">

  <title>tetraxWeb | Services | Advertising
  </title>
  <meta name="description"
    content="tetraxWeb provides your business with all types of advertising services including advertising campaigns, Outdoor media, Digital advertising, and Print Advertising.">
  <meta name="keywords"
    content="creative team, creative, Advertising, Branding, WEBSITE, web Development, design, graphic design, Social, social media, marketing, Moon, tetraxWeb, tetraxWebteam, tetrax-team, pathfinders, video animator, video editor">
  <meta name="author" content="tetraxWeb team">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="canonical" href="https://www.tetraxWeb.net/service/advertising" />
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
    rel="stylesheet" />
  <!-- SimpleLightbox plugin CSS-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
  <link rel="icon" href="../imgs/slare1.png" type="icon">
  <link rel="stylesheet" href="advertisingStyle1.css">
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

  <!--navigation bar-->

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
    <img src="imgs/advertising.jpg" class="digital" alt="Digital advertising billboards in a city">

  </div>
  <div class="container-fluid">
    <div class="row">
      <h1>Advertising</h1>
      <h3 class="head3"><strong>tetraxWeb </strong>presents great advertising strategies to help you raise awareness
        and create interaction to enhance your company's exposure to new clients. Strategies are set in place to reach
        the largest possible audience.</h3>
    </div>
    <div class="row raw">
      <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
        <h2 id="outdoor">Outdoor</h2>
        <h3>Outdoor advertising is not only one of the oldest types of advertising; it is also more significant than
          ever due to modern audience behavior trends. People are viewing fewer ads as DVR recordings and streaming
          services; therefore, advertisers are looking for new ways to reach potential buyers. Outdoor advertising
          provides maximum exposure and 24/7 brand recognition, allowing you to reach the greatest number of people in
          the shortest amount of time. For additional information, please contact us!</h3>
      </div>
      <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
        <h2 id="digital">Digital</h2>
        <h3><strong>tetraxWeb </strong>has been at the forefront of the digital advertising field, delivering knowledge
          and a strong understanding of the digital ecosystem to our clients. We collaborate extensively with our
          clients to understand their needs before designing a plan for each client. We offer our clients real-time,
          performance-driven digital media buying across platforms, channels, and devices, guaranteeing we reach the
          correct audience wherever they are while meeting our client's objectives.</h3>
      </div>
    </div>

    <div class="row raw">
      <h2 id="print">Print</h2>
      <h3 class="last">As an extension of our branding and positioning services, print advertising enables us to
        successfully promote your brand or product to consumers. By applying brilliant messaging, dynamic design,
        precise typography, and compelling calls to action our print services will help produce significant results that
        customers can touch and feel.</h3>
    </div>


  </div>
  <footer>


    <div class="row copyright" style="font-family: montserrat;">
      <div class="col col-lg-6 col-md-12 col-sm-12 col-12 col1">
        <a href="https://www.facebook.com/tetraxWebteam.sarl" target="_blank" class="media" rel="noopener" type="button"
          title="Facebook"><i class="bi bi-facebook"></i></a>

        <a href="https://www.instagram.com/tetraxWeb.sarl/" target="_blank" rel="noopener" class="media" type="button"
          title="Instagram"><i class="bi bi-instagram "></i></a>

        <a href="https://www.linkedin.com/company/tetrax-team/" target="_blank" rel="noopener" class="media"
          type="button" title="LinkedIn"><i class="bi bi-linkedin "></i></a>

        <a href="https://wa.me/message/7222ETDODZXMC1?src=qr" target="_blank" rel="noopener" class="media" type="button"
          title="Whatsapp"><i class="bi bi-whatsapp "></i></a>

        <a href="https://twitter.com/tetraxWebteam" target="_blank" type="button" rel="noopener" class="media "
          title="Twitter"><i class="bi bi-twitter "></i></a>

        <a href="https://www.tiktok.com/@tetraxWeb.sarl" target="_blank" type="button" rel="noopener"
          class="media icons" title="Tiktok"><i class="bi bi-tiktok "></i></a>
      </div>

      <div class="col col col-lg-6 col-md-12 col-sm-12 col-12 col2">
        &copy2023 tetraxWeb.net - All rights reserved
      </div>

    </div>
  </footer>
</body>


</html>