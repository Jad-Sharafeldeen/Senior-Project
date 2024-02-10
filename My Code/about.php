<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">

    <title>
        Tetrax | About | Dedication, Quality, and Service
    </title>
    <meta name="description"
        content="Tetrax is your ultimate destination for top-quality industrial equipment and room preparation services. Browse our reliable and cost-effective solutions for wine cellars and ripening rooms designed to meet your unique business needs.">
    <meta name="keywords"
        content="industrial equipment, room preparation, wine cellars, ripening rooms, manufacturing, processing, custom design, high-quality, cost-effective, energy-efficient, productivity, optimization, consultation, installation, maintenance, reliable, sustainable, expertise, innovation, customer service, agricultural products, cold rooms, food preservation, displays, restaurant equipment, food industry, sweets, catering supplies, commercial kitchen, refrigeration systems">
    <meta name="keywords"
        content="industrial equipment, room preparation, wine cellars, ripening rooms, manufacturing, processing, custom design, high-quality, cost-effective, energy-efficient, productivity, optimization, consultation, installation, maintenance, reliable, sustainable, expertise, innovation, customer service, agricultural products, cold rooms, food preservation, displays, restaurant equipment, food industry, sweets, catering supplies, commercial kitchen, refrigeration systems">
    <meta name="author" content="tetraxWeb Agency">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="canonical" href="https://www.tetraxgroup.net/about" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,500,600,700,800,900"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Oswald:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <link rel="icon" href="imgs/tetrax icon.png" type="icon">
    <link rel="stylesheet" href="css/aboutStyle1.css">
    <!-- Google tag (gtag.js) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>



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
                <a class="nav-link class3 a about" href="#">About us</a>
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
    <div class="title">
        <h1>ABOUT TETRAX</h1>
    </div>
    <div><img class="services" src="imgs/About Us.jpg" alt="ABOUT TETRAX image on a white background"></div>
    <div>
        <h3 class="description"><strong>TETRAX</strong> is a creative interactive teamthat is at the forefront of
            digital proficiency. In order to satisfy and even exceed our customers’ expectations, we are dedicated to
            providing unique digital and interactive solutions. Our track record of accomplishment has earned us a
            reputation for providing the most dynamic digital experiences. We use the magic of creativity to create
            better futures for our employees, our clients, and our communities.
        </h3>

    </div>
    <div>
        <h2>MISSION</h2>
        <hr>
        <h3>We are the pathfinders, and our mission is to guide you find success by offering unique and effective
            integrated brand marketing and public relations solutions. This helps our clients grow their companies and
            achieve their marketing objectives.
        </h3>
    </div>
    <div>
        <h2>VISION</h2>
        <hr>
        <h3>We provide brand marketing programs and public relations strategies that increase our customer's exposure,
            sales, and development. We collaborate closely with our clients throughout the marketing strategy, design,
            and development process.</h3>
    </div>
    <div>
        <h2>VALUES</h2>
        <hr>
        <h3 class="last">Our basic values defined our business from the start and have remained our true north as we've
            developed. They are how we define success and the characteristics we want in our employees, partners, and
            even our clients.</h3>
        <h3 class="list">
            <ul>
                <li>Passion
                </li>
                <li>Motivate and guide our employees to become industry experts.</li>
                <li>Teamwork</li>
                <li>Integrity</li>
                <li>High Standards</li>
            </ul>
        </h3>
    </div>
    <div>
        <footer>
            <p class="copyright">
                All rights reserved. 2023&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; By <a
                    href="https://www.TetraxWebWorld.com/" class="moon-website" target="_blank"
                    rel="noopener noreferrer">TetraxWebWorld</a></p>
        </footer>
    </div>
</body>

</html>