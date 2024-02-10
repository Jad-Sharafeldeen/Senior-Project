<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">

  <title>tetraxWeb | Services | Digital Marketing
  </title>
  <meta name="description"
    content="tetraxWeb is a digital marketing advertising team that provides your business with all types of digital marketing services including SEO, SEM, Social Media Marketing, and Content Generation">
  <meta name="keywords"
    content="creative team, creative, Advertising, Branding, WEBSITE, web Development, design, graphic design, Social, social media, marketing, Moon, tetraxWeb, tetraxWebteam, tetrax-team, pathfinders, video animator, video editor">
  <meta name="author" content="tetraxWeb team">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="canonical" href="https://www.tetraxWeb.net/service/digitalmarketing" />
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
    rel="stylesheet" />
  <!-- SimpleLightbox plugin CSS-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
  <link rel="icon" href="../imgs/slare1.png" type="icon">
  <link rel="stylesheet" href="digitalmarketingStyle.css">
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
    <img src="imgs/digital marketing-version 2.jpg" class="digital" alt="Digital marketing services including SEO">

  </div>
  <div class="container-fluid">
    <div class="row">
      <h1>Digital Marketing </h1>
      <h3 class="head3">Our purpose is to market your company and convert potential customers into paying customers.
        Moreover, we believe in developing smart solutions for you that maximize brand visibility and increase sales
        through the use of the most effective digital marketing strategies. We will collaborate with you to understand
        your business and create marketing collateral that reflects your company's vision.</h3>
    </div>
    <div class="row raw">
      <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
        <h2 id="1">SEARCH ENGINE OPTIMIZATION (SEO)</h2>
        <h3>Search Engine Optimization is a set of measures meant to assist users to reach your website when they search
          online for the services or products you provide. The higher you rank on the search engine results page; the
          more likely users will notice and visit your website rather than your competitor's. An effective SEO strategy
          will help almost any website. We help small business owners in boosting their visibility so that more
          customers can find them.</h3>
      </div>
      <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
        <h2 id="2">SEARCH ENGINE MARKETING (SEM)</h2>
        <h3>Our Search Engine Marketing Services begin with in-depth keyword research and proceed with SEM campaign
          setup and optimization to provide ROI-driven PPC management services. Our SEM approach takes a brand-focused
          strategy supported by flawless coordination and detailed analytics, assisting your customers in meeting their
          paid search objectives.</h3>
      </div>
    </div>

    <div class="row raw">
      <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
        <h2 id="3">Social Media Marketing (SMM)</h2>
        <h3>At<strong> tetraxWeb</strong>, we have a whole team dedicated to promoting our clients via social media,
          directed by the project manager. SMM specialists plan and manage the complete promotion process, including
          managing advertisement settings, applying segmentation, developing a content strategy, and analyzing outcomes.
          On the other hand, designers and copywriters focus on the content itself. Such collaboration provides
          high-quality content and strong social media promotion.</h3>
      </div>
      <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
        <h2 id="4">Content Generation</h2>
        <h3>tetraxWeb is focused on providing high-quality, strategically optimized content. In this manner, we can
          guarantee the development of world-class websites. Due to the ongoing development of technology tools and the
          rapid rise of eCommerce in recent years, the creation of digital content is now one of the most important
          marketing methods.</h3>
      </div>
    </div>


  </div>
  <footer>


    <div class="row copyright" style="font-family: montserrat;">
      <div class="col col-lg-6 col-md-12 col-sm-12 col-12 col1">
        <a href="https://www.facebook.com/tetraxWebteam.sarl" target="_blank" class="media" type="button" rel="noopener"
          title="Facebook"><i class="bi bi-facebook"></i></a>

        <a href="https://www.instagram.com/tetraxWeb.sarl/" target="_blank" class="media" type="button" rel="noopener"
          title="Instagram"><i class="bi bi-instagram "></i></a>

        <a href="https://www.linkedin.com/company/tetrax-team/" target="_blank" class="media" type="button"
          rel="noopener" title="LinkedIn"><i class="bi bi-linkedin "></i></a>

        <a href="https://wa.me/message/7222ETDODZXMC1?src=qr" target="_blank" class="media" type="button" rel="noopener"
          title="Whatsapp"><i class="bi bi-whatsapp "></i></a>

        <a href="https://twitter.com/tetraxWebteam" target="_blank" type="button" class="media " rel="noopener"
          title="Twitter"><i class="bi bi-twitter "></i></a>
        <a href="https://www.tiktok.com/@tetraxWeb.sarl" target="_blank" type="button" class="media icons"
          rel="noopener" title="Tiktok"><i class="bi bi-tiktok "></i></a>
      </div>

      <div class="col col col-lg-6 col-md-12 col-sm-12 col-12 col2">
        &copy2023 tetraxWeb.net - All rights reserved

      </div>

    </div>
  </footer>
</body>


</html>