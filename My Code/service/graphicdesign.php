<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">

  <title>tetraxWeb | Services | Graphic Design
  </title>
  <meta name="description"
    content="tetraxWeb provides your business with all types of graphic design services including Logo and Branding, Web Design, Packaging, and Digital Design">
  <meta name="keywords"
    content="creative team, creative, Advertising, Branding, WEBSITE, web Development, design, graphic design, Social, social media, marketing, Moon, tetraxWeb, tetraxWebteam, tetrax-team, pathfinders, video animator, video editor">
  <meta name="author" content="tetraxWeb team">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="canonical" href="https://www.tetraxWeb.net/service/graphicdesign" />
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
    rel="stylesheet" />
  <!-- SimpleLightbox plugin CSS-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
  <link rel="icon" href="../imgs/slare1.png" type="icon">
  <link rel="stylesheet" href="graphicdesignStyle1.css">
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
    <img src="imgs/design.jpg" class="digital" alt="Graphic design displayed on a computer’s screen">

  </div>
  <div class="container-fluid">
    <div class="row">
      <h1>Graphic Design </h1>
      <h3 class="head3">The<strong> tetraxWeb </strong>design team creates visually remarkable work for regional and
        international customers. Our specialized designers and planners have put together some of the market's newest
        brands.</h3>
    </div>
    <div class="row raw">
      <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
        <h2 id="1">Logo & Branding </h2>
        <h3>Design is an artwork, and so is the technology that comes after it. We make unique and innovative ideas a
          reality by merging creativity and technology. You can rely on our creative team to design your brand image,
          which includes logos, business cards, brochures, flyers, posters, and other items.</h3>
      </div>
      <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
        <h2 id="2">Web Design </h2>
        <h3>Having a digital presence requires more than just developing a website and waiting for users to approach
          your brand. Your website serves as the internet basis for your business. It represents your main customer
          contact point and conversion tool. With our website design services, you may generate your digital presence
          and explore your market potential today.</h3>
      </div>
    </div>

    <div class="row raw">
      <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
        <h2 id="3">Packaging </h2>
        <h3>Packaging is a critical marketing aspect since it drives sales while also reinforcing brand awareness and
          the intent of your product. With<strong> tetraxWeb </strong>get an eye-catching packaging design, which can
          help your product stand out.</h3>
      </div>
      <div class="col col-lg-6 col-md-12 col-sm-12 col-12">
        <h2 id="4">Digital Design </h2>
        <h3><strong>tetraxWeb </strong> a leading developer of interactive digital exhibits. We use cutting-edge
          technology associated with custom-built software applications to provide your customers with a fully
          interactive, remarkable experience.</h3>
      </div>
    </div>

    <div class="row raw">

      <h2 id="5">Printing</h2>
      <h3 class="last">We provide you with all types of print designs: book design & illustration, corporate gifts,
        wedding cards, social stationery, and business brochures. Contact us for more info!</h3>

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