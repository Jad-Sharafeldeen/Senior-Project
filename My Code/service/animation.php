<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">

  <title>tetraxWeb | Services | Animation
  </title>
  <meta name="description"
    content="tetraxWeb provides your business with all types of Animation services including 2D & 3D Animations, Stop Motion, and Whiteboard Animation">
  <meta name="keywords"
    content="creative team, creative, Advertising, Branding, WEBSITE, web Development, design, graphic design, Social, social media, marketing, Moon, tetraxWeb, tetraxWebteam, tetrax-team, pathfinders, video animator, video editor">
  <meta name="author" content="tetraxWeb team">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="canonical" href="https://www.tetraxWeb.net/service/animation" />
  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
    rel="stylesheet" />
  <!-- SimpleLightbox plugin CSS-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
  <link rel="icon" href="../imgs/slare1.png" type="icon">
  <link rel="stylesheet" href="animationStyle1.css">
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

  <script>
    $(document).ready(function () {
      $('video').bind('contextmenu', function () { return false; });
    });



    /* var w = window.matchMedia("(max-width: 700px)"); */
    /* const vid = document.getElementById("video");
  const source = document.createElement("source"); 
   source.setAttribute("type", "video/mp4");
  
  if ($(window).width() < 700) {
    source.setAttribute("src", "Glitch.mp4");
  } else {
    source.setAttribute("src", "Glitch.mp4");
  }
  
   vid.appendChild(source); 
   */
    const vid1 = document.getElementById("video1");
    const vid2 = document.getElementById("video2");
    window.addEventListener("resize", function () {
      if ($(window).width() < 992) {
        vid2.pause();

        vid1.load();
        vid1.play();
      } else {
        vid1.pause();

        vid2.load();
        vid2.play();
      };

    });
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
  <div class="row justify-content-center ">
    <!-- <video id="video" src="Glitch.mp4" autoplay loop muted playsinline></video> -->
    <video id="video1" loop muted autoplay>
      <source src="Glitch V2.mp4" type="video/mp4">

    </video>

    <video id="video2" loop muted autoplay>

      <source src="Glitch.mp4" type="video/mp4">
    </video>

  </div>
  <div class="container-fluid">
    <div class="row">
      <h1>Animation</h1>
      <h3 class="head3">The<strong> tetraxWeb </strong>team offers a dependable solution for businesses looking to
        communicate with their target audience through intelligent video production and effective storytelling. We
        assist brands, agencies, and production companies tell the stories the world ought to hear by leveraging our
        collective knowledge in animation.</h3>
    </div>
    <div class="row raw">
      <div class="col col col-lg-6 col-md-12 col-sm-12 col-12">
        <h2 id="1">2D Animation</h2>
        <h3>tetraxWeb handles all parts of a 2D video animation firm focused on interaction to help your brand stand
          out. Our 2D animation services focus on bringing to life the most fascinating and highly attractive
          characters, graphics, and animations.</h3>
      </div>
      <div class="col col col-lg-6 col-md-12 col-sm-12 col-12">
        <h2 id="2">3D Animation</h2>
        <h3>Our team will produce and deliver a wide range of 3D productions that will exceed your expectations, from
          short product 3D films to extended 3D animation projects. </h3>
      </div>
    </div>

    <div class="row raw">
      <div class="col col col-lg-6 col-md-12 col-sm-12 col-12">
        <h2 id="3">Stop Motion</h2>
        <h3>Stop-motion animation is both appealing and limitless in its applications, ranging from films to integrated
          media applications, yet it requires a decent level of skill and discipline to accomplish successfully.
          tetraxWeb has a highly experienced team of animators, a sophisticated stop-motion studio, and advanced
          software and infrastructure.</h3>
      </div>
      <div class="col col col-lg-6 col-md-12 col-sm-12 col-12">
        <h2 id="4">Whiteboard Animation</h2>
        <h3>Our whiteboard animation offerings are meant to help businesses generate sales and marketing tools. We can
          support you with developing appealing video content that can enhance conversions, sales, or awareness. Our
          whiteboard animation movies can help you achieve your objectives by using smart storytelling and innovative
          screenplay writing, as well as attractive images and animation.</h3>
      </div>
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

        <a href="https://twitter.com/tetraxWebteam" target="_blank" rel="noopener" type="button" class="media "
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