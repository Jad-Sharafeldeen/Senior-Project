<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">

  <title>Tetrax | Services | Advertising & Branding</title>
  <meta name="description"
    content="tetraxWeb offers your business all types of services including advertising.php, branding, digital marketing, web development, and social media services.">
  <meta name="keywords"
    content="creative agency, creative, advertising, Branding, WEBSITE, web Development, design, graphic design, Social, social media, marketing, Moon, tetraxWeb, tetraxWebagency, tetrax-agency, pathfinders, video animator, video editor">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="canonical" href="" />
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
    rel="stylesheet" />



  <link rel="icon" href="imgs/slare1.png" type="icon">
  <link rel="stylesheet" href="servicesStyle1.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


  <script>
    function myFunction() {
      document.getElementById('myTopnav').classList.toggle('responsive');
    }
  </script>
  <script type="text/javascript">
    $(document).ready(function () {
      $('#video').bind('contextmenu', function () { return false; });
    });
  </script>

</head>



<body id="top">

  <header>
    <div class="topnav " id="myTopnav">

      <a class="topLogo " href="homepage.php"><img src="imgs/tetrax group logo.png" class="logo" alt="TETRAX logo"></a>


      <div class="atsa ">
        <a class="nav-link class1 a " href="homepage.php">Home</a>
        <a class="nav-link class1 a" href="index.php">Our products</a>
        <a class="nav-link class2 a about" href="#">Our services</a>
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

  <!--   <div class="">
    <img class="do" src="imgs/what we do.png" alt="Text that says “WHAT WE DO?” to show users our services">
  </div> -->

  <div class="container-fluid">
    <div class="">

      <h3 class="p0"><strong>TetraxWeb</strong> is a Lebanese advertising / marketing teamthat offers a full range of
        services to help you promote your business. Our thinking and problem-solving are focused on smart and effective
        solutions that suit your company. We are happy to share our remarkable knowledge with our customers; we team up
        with companies from all industries to develop strategies that achieve ideal results and provide you with
        suitable recourses to boost your technology and business.</h3>

    </div>
    <div class="row">

      <div class="col col-lg-6 col-md-6 col-sm-12">

        <hr>
        <h1>
          <a class="titles" href="service/graphicdesign.php">GRAPHIC DESIGN</a>
        </h1>

        <ul class="no-bullets">
          <h2>
            <li><a class="list" href="service/graphicdesign.php#1">LOGO & BRANDING </a></li>
          </h2>
          <h2>
            <li><a class="list" href="service/graphicdesign.php#2">WEB DESIGN </a></li>
          </h2>
          <h2>
            <li><a class="list" href="service/graphicdesign.php#3">PACKAGING</a></li>
          </h2>
          <h2>
            <li><a class="list" href="service/graphicdesign.php#4">DIGITAL DESIGN</a></li>
          </h2>
          <h2>
            <li><a class="list" href="service/graphicdesign.php#5">PRINTING</a></li>
          </h2>

        </ul>


      </div>
      <div class="col col-lg-6 col-md-6 col-sm-12">

        <hr>
        <h1>
          <a class="titles" href="service/advertising.php">Advertising</a>
        </h1>

        <ul class="no-bullets">
          <h2>
            <li><a class="list" href="service/advertising.php#outdoor">OUTDOOR advertising</a></li>
          </h2>
          <h2>
            <li><a class="list" href="service/advertising.php#digital">DIGITAL advertising</a></li>
          </h2>
          <h2>
            <li><a class="list" href="service/advertising.php#print">PRINT advertising</a></li>
          </h2>
        </ul>


      </div>

    </div>
    <div class="row">

      <div class="col col-lg-6 col-md-6 col-sm-12">

        <hr>
        <h1>
          <a class="titles" href="service/animation.php"> ANIMATION</a>
        </h1>

        <ul class="no-bullets">
          <h2>
            <li><a class="list" href="service/animation.php#1">2D ANIMATION </a></li>
          </h2>
          <h2>
            <li><a class="list" href="service/animation.php#2">3D ANIMATION</a></li>
          </h2>
          <h2>
            <li><a class="list" href="service/animation.php#3">STOP MOTION </a></li>
          </h2>
          <h2>
            <li><a class="list" href="service/animation.php#4">WHITEBOARD ANIMATION</a></li>
          </h2>


        </ul>

      </div>
      <div class="col col-lg-6 col-md-6 col-sm-12">
        <hr>
        <h1>
          <a class="titles" href="service/website.php"> WEBSITE</a>
        </h1>

        <ul class="no-bullets">

          <h2>
            <li><a class="list" href="service/website.php#1">WEBSITE DEVELOPMENT</a></li>
          </h2>
          <h2>
            <li><a class="list" href="service/website.php#2">WEBSITE MAINTENANCE</a></li>
          </h2>
          <h2>
            <li><a class="list" href="service/website.php#3">TESTING</a></li>
          </h2>
        </ul>

      </div>

    </div>


    <div class="btm">

      <div class="col col-lg-6 col-md-6 col-sm-12">

        <hr>
        <h1>
          <a class="titles" href="service/digitalmarketing.php">DIGITAL MARKETING</a>
        </h1>

        <ul class="no-bullets">
          <h2>
            <li><a class="list" href="service/digitalmarketing.php#1">SEARCH ENGINE OPTIMIZATION (SEO) </a></li>
          </h2>
          <h2>
            <li><a class="list" href="service/digitalmarketing.php#2">SEARCH ENGINE MARKETING (SEM) </a></li>
          </h2>
          <h2>
            <li><a class="list" href="service/digitalmarketing.php#3">SOCIAL MEDIA MARKETING (SMM)</a></li>
          </h2>
          <h2>
            <li><a class="list" href="service/digitalmarketing.php#4">CONTENT GENERATION </a></li>
          </h2>

        </ul>
      </div>

      <div class="col col-lg-6 col-md-6 col-sm-12">

        <video id="video" src="animation/Cub3.mp4" muted autoplay loop playsinline></video>

      </div>

    </div>
  </div>


  <footer>


    <div class="row copyright" style="font-family: montserrat;">
      <div class="col col-lg-6 col-md-12 col-sm-12 col-12 col1">
        <a href="https://www.facebook.com/tetraxWebagency.sarl" target="_blank" rel="noopener" class="media"
          type="button" title="Facebook"><i class="bi bi-facebook"></i></a>

        <a href="https://www.instagram.com/tetraxWeb.sarl/" target="_blank" rel="noopener" class="media" type="button"
          title="Instagram"><i class="bi bi-instagram "></i></a>

        <a href="https://www.linkedin.com/company/tetrax-agency/" target="_blank" rel="noopener" class="media"
          type="button" title="LinkedIn"><i class="bi bi-linkedin "></i></a>

        <a href="https://wa.me/message/7222ETDODZXMC1?src=qr" target="_blank" rel="noopener" class="media" type="button"
          title="Whatsapp"><i class="bi bi-whatsapp "></i></a>

        <a href="https://twitter.com/tetraxWebAgency" target="_blank" type="button" rel="noopener" class="media "
          title="Twitter"><i class="bi bi-twitter "></i></a>
        <a href="https://www.tiktok.com/@tetraxWeb.sarl" target="_blank" rel="noopener" type="button"
          class="media icons" title="Tiktok"><i class="bi bi-tiktok "></i></a>
      </div>

      <div class="col col col-lg-6 col-md-12 col-sm-12 col-12 col2">
        &copy2023 TetraxWeb.com - All rights reserved

      </div>

    </div>
  </footer>


</body>

</html>