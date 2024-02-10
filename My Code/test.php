<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="aboutStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet" />

    <title>about us</title>
    <script>
        function myFunction() {
          document.getElementById('myTopnav').classList.toggle('responsive');
        }
       /*  document.querySelector('.icon').addEventListener('click',function(){
             document.querySelector('header').style.transition='0.5s';
           }); */
      </script>
      <script>
        if ($(window).width() > 992) {
          window.addEventListener('scroll', function () {
            const backColor = document.querySelector('header');
            /* const links= document.querySelector('.nav-link'); */
            if (window.scrollY < 100) {
              backColor.classList.add('nav-transperent');
              backColor.classList.remove('nav-colored');
              /*  links.classList.add('item-transperent');
              links.classList.remove('item-colored'); */
            }
            else {
    
              backColor.classList.add('nav-colored');
              backColor.classList.remove('nav-transperent');
              /*    links.classList.add('item-colored');
              links.classList.remove('item-transperent'); */
            }
    
          });
        }
      </script>
</head>
<body>
    <header>
        <div class="topnav " id="myTopnav">
    
          <a class="topLogo " href="#top"><img src="imgs/tetrax group logo.png" class="logo"></a>
    
    
          <div class="atsa ">
            <a class="nav-link class1 a" href="index.php">Our products</a>
            <a class="nav-link class2 a" href="#section-5">Our services</a>
            <a class="nav-link class3 a" href="#section-7">About us</a>
            <a class="nav-link class4 a" href="#section-9">Contact us</a>
          </div>
    
          <a href="javascript:void(0);" class="icon" onclick="myFunction()"><i class="bi bi-justify"></i></a>
    
        </div>
    
    <div id="myNav"></div>
      </header>
      <?php
    session_start();
    if (isset($_SESSION['user'])) {
        $email = $_SESSION['user']['email'];
        $role = $_SESSION['user']['role'];

     
            
    ?>
    <div class="current-user">
        <h2 class='customer-name'><?php echo htmlspecialchars($email); ?></h2>
      <form action='signout.php' style="border: none;" method='post'>  <button class='sign-out'>signout</button></form>
      
    </div>
    <!-- Rest of the customer dashboard content goes here -->
    <?php
        
    } else {
        // Redirect unauthorized users
        header("Location: /signin.php");
        exit();
    }
    
    ?>
<script>
    // Restore the content of the myNav div when the DOM content has loaded
window.addEventListener('load', function() {
  var savedNavContent = localStorage.getItem('myNavContent');

    console.log('hello world');
    document.getElementById('myNav').innerHTML = savedNavContent;
  
});

</script>

</body>
</html>