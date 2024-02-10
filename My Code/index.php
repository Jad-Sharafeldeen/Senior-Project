<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title> Parallax Cards</title>
  <link rel="stylesheet" href="./style19.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet" />

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

      <a href="homepage.php"><img src="imgs/tetrax group logo.png" class="logo"></a>


      <div class="atsa ">
        <button onclick="openNav()" class="cart-item"><i class="bi bi-cart">
            <div class="indicator">
              <div class="count" role="status">0</div>
            </div>
          </i></button>
        <a class="nav-link class1 a " href="homepage.php">Home</a>
        <a class="nav-link class1 a about" href="#">Our products</a>
        <a class="nav-link class2 a" href="services.php">Our services</a>
        <a class="nav-link class3 a" href="about.php">About us</a>
        <a class="nav-link class4 a" href="contact.php">Contact us</a>
      </div>

      <a href="javascript:void(0);" class="icon" onclick="myFunction()"><i class="bi bi-justify"></i></a>

    </div>




  </header>
  <div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="overlay-content">

    </div>
    <div class="all">
      <div class="allResult">



      </div>
      <div class="allResult2">

      </div>
    </div>

  </div>

  <!-- //////////////////////////////////// 
call user email
-->
  <?php
  session_start();
  if (isset($_SESSION['user'])) {
    $email = $_SESSION['user']['email'];
    $role = $_SESSION['user']['role'];

    // Check if the user is an admin
    if ($role === 'admin') {
      // Display admin-specific content
      ?>
      <div class="current-user">
        <h2 class='admin-name'><?php echo htmlspecialchars($email); ?></h2>
        <form action='signout.php' style="border: none;" method='post'> <button class='sign-out'>signout</button></form>
      </div>
      <button class='addNewProduct'>add</button>

      <form class='searchForm' method="POST" action="">
        <input type="email" name="email" class="emailValue" placeholder="enter a specific mail">
        <button class="search">search</button>

        <div class="searchField">
          <?php
          // ... Previous code to establish database connection and retrieve email
// Retrieve the products from the database
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "senior";

          $conn = new mysqli($servername, $username, $password, $dbname);
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['email'])) {
              $email = $_POST['email'];
              $sanitizedEmail = mysqli_real_escape_string($conn, $email);

              $query = "SELECT * FROM receipt WHERE email = '$sanitizedEmail'";
              $result = mysqli_query($conn, $query);

              if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                  // Echo the records inside the searchField div
                  echo "<p class='info'>reciept: " . $row['description'] . "</p>";
                  echo "<p class='info'>price: " . $row['price'] . "</p>";
                  echo "<p class='info'>date: " . $row['date'] . "</p>";
                  echo "<hr>";
                  echo "<br> <br>";
                }
              } else {
                // Handle the case when the query fails
                echo "Error: " . mysqli_error($conn);
              }
            } else {
              echo "Email not set.";
            }
          }

          mysqli_close($conn);
          ?>
        </div>

      </form>
      <?php
    } else {
      // Display customer-specific content
      ?>
      <div class="current-user">
        <h2 class='customer-name'><?php echo htmlspecialchars($email);?></h2>
        <form action='signout.php' style="border: none;" method='post'> <button class='sign-out'>signout</button></form>

      </div>
      <!-- Rest of the customer dashboard content goes here -->
      <?php
    }
  } else {
    // Redirect unauthorized users
    header("Location: /signin.php");
    exit();
  }

  ?>

  <!--//////////////////////////////////////////-->



  <div class="wrapper">
    <?php
    // Retrieve the products from the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "senior";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $index = 0; // Initialize the index variable
      while ($row = $result->fetch_assoc()) {
        $logo = $row['logo'];
        $price = $row['price'];
        $productTitle = $row['productTitle'];
        $productDesc = $row['productDesc'];
        $productImg = $row['productImg'];
        $productType = $row['productType'];
        ?>
        <div class="card card--<?php echo $index; ?>">
          <?php
          if (isset($_GET['role']) && $_GET['role'] === 'admin_page') {

            echo '<button class="deleteProduct">delete</button><p class="deleteProductP">deleted! <br>refresh page</p>';
          }
          ?>
          <div class="card__header card__header--19">
            <img src="<?php echo $logo; ?>" alt="<?php echo $logo; ?>" class="card__logo card__will-animate">
            <span class="card__price card__will-animate">$<?php echo $price; ?></span>
            <?php
            if (isset($_GET['role']) && $_GET['role'] === 'admin_page') {
              echo '<input type="text" placeholder="enter logo url"  class="newLogo">';
              echo '<button class="submitNewLogo">submit logo</button>';

              echo '<input type="number" placeholder="enter new price" min="0" class="newPrice">';
              echo '<button class="submitNewPrice">submit price</button>';
            }
            ?>
            <h1 class="card__title card__will-animate"><?php echo $productTitle; ?></h1>
            <?php
            if (isset($_GET['role']) && $_GET['role'] === 'admin_page') {
              echo '<input type="text" placeholder="enter title"  class="newTitle">';
              echo '<button class="submitNewTitle">submit title</button>';
            }
            ?>
            <span class="card__subtitle card__will-animate"><?php echo $productDesc; ?></span>
            <?php
            if (isset($_GET['role']) && $_GET['role'] === 'admin_page') {
              echo '<input type="text" placeholder="enter description"  class="newDescription">';
              echo '<button class="submitNewDescription">submit description</button>';
            }
            ?>
          </div>

          <div class="card__body">
            <img src="<?php echo $productImg; ?>" alt="<?php echo $productTitle; ?>" class="card__image card__will-animate">
            <?php
            if (isset($_GET['role']) && $_GET['role'] === 'admin_page') {
              echo '<input type="text" placeholder="enter image url"  class="newImage">';
              echo '<button class="submitNewImage">submit image</button>';
            }
            ?>
            <span class="card__category card__will-animate"><?php echo $productType; ?></span>

            <?php
            if (isset($_GET['role']) && $_GET['role'] === 'admin_page') {
              echo '<input type="text" placeholder="enter type"  class="newType">';
              echo '<button class="submitNewType">submit type</button>';
            }
            ?>
            <button class="add add1">add </button>
            <br>
            <label for="quantity" class="labelQuantity">quantity :</label>
            <input type="number" name="quantity" class="quantity" min="0">
          </div>
        </div>

        <?php
        $index++; // Increment the index
      }
    } else {
      echo "No products found.";
    }

    $conn->close();
    ?>
  </div>
  <div class="cards-placeholder">
    <?php
    $numberOfCards = $result->num_rows; // Get the number of cards from the query result
    for ($i = 0; $i < $numberOfCards; $i++) {
      echo '<div class="cards-placeholder__item"></div>';
    }
    ?>
  </div>


















  <!-- pop up CheckOut  -->
  <div class='checkout'>
    <div class="X">X</div>
    <form id="payment-form">
      <h2 class="checkTitle"></h2>
      <label for="name">
        Full Name:
      </label>
      <input type="text" name="name" placeholder="Full Name">
      <p class="error name"></p>
      <br>

      <label for="phone">
        Phone Number:
      </label>
      <input type="number" name="phone" placeholder="Phone Number">
      <p class="error phone"></p>
      <br>
      <label for="country">
        Region:
      </label>
      <select name="country">
        <option value="lebanon">lebanon</option>
        <option value="usa">usa</option>
        <option value="france">france</option>
        <option value="uk">uk</option>
      </select>
      <br>
      <label for="city">
        City:
      </label>
      <input type="text" name="city" placeholder="city">

      <label for="zip">
        Zip Code:
      </label>
      <input type="number" name="zip" placeholder="Zip Code">

      <label for="address">
        Address:
      </label>
      <input type="text" name="address" placeholder="Address">
      <br>
      <p class="error location"></p>
      <div class="form-group">
        <label for="card-element">
          Credit or debit card
        </label>
        <div id="card-element">
          <!-- Stripe Card Element will be inserted here. -->
        </div>
        <div id="card-errors" role="alert"></div>
      </div>
      <button type="submit" class="submitCheck">Submit Payment</button>
      <h2 class="success">checkout success!</h2>
    </form>

  </div>






















  <script src="./script21.js"></script>
  <script src="https://js.stripe.com/v3/"></script>
  <script>
    function openNav() {
      document.getElementById("myNav").style.width = "20vw";
    }

    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
    }
  </script>
  <script>
    const nameError = document.querySelector('.name');
    const phoneError = document.querySelector('.phone');
    const locationError = document.querySelector('.location');

    const nameInput = document.querySelector('[name="name"]');
    const phoneInput = document.querySelector('[name="phone"]');
    const cityInput = document.querySelector('[name="city"]');
    const zipInput = document.querySelector('[name="zip"]');
    const addressInput = document.querySelector('[name="address"]');

    const custName = document.querySelector('.customer-name');

    // Create a Stripe client
    var stripe = Stripe('pk_test_51NG0bzCi8gKmqdOZGGqnymztaOVROqA6agS1mWeJxo99qkoxPAqZX883vGwok3okbFgS3WC9by3LTCp1bfvBC5sx00u1n6HI76');

    // Create an instance of Elements
    var elements = stripe.elements();

    // Create an instance of the card Element
    var cardElement = elements.create('card');

    // Mount the card Element on the page
    cardElement.mount('#card-element');

    // Handle form submission
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function (event) {
      event.preventDefault();
      if (nameInput.value == '') {
        nameError.innerText = 'enter a name';
      } else {
        nameError.innerText = '';
      }
      if (phoneInput.value == '') {
        phoneError.innerText = 'enter a phone';
      } else {
        phoneError.innerText = '';
      }
      if (cityInput.value == '' || zipInput.value == '' || addressInput.value == '') {
        locationError.innerText = 'fill your location';
      } else {
        locationError.innerText = '';
      }
      stripe.createToken(cardElement).then(function (result) {
        if (result.error || nameInput.value == '' || phoneInput.value == '' || cityInput.value == '' || zipInput.value == '' || addressInput.value == '') {
          // Display error message to the user
          var errorElement = document.getElementById('card-errors');
          errorElement.textContent = 'fill all fields with right info';
        } else {
          // Send the token to your server for processing
          var token = result.token.id;
          var purchasedItems = JSON.stringify(cartData); // Assuming `cartData` contains the information about purchased items
          var data = {
            token: token,
            purchasedItems: purchasedItems,
            totalPrice: totalPrice,
            tetraxPrice: totalPrice * 97.1 / 100 - 0.3,
            email: custName.innerText,
            name: nameInput.value,

            city: cityInput.value,
            address: addressInput.value,
            zip: zipInput.value,

            alladress: cityInput.value + ', ' + addressInput.value + ', zip: ' + zipInput.value,
            phone: phoneInput.value
          };
          console.log(data);
          var xhr = new XMLHttpRequest();
          xhr.open('POST', 'process_payment.php');
          xhr.setRequestHeader('Content-Type', 'application/json');

          xhr.send(JSON.stringify(data));


          const xhr1 = new XMLHttpRequest();
          xhr1.open('POST', 'buy_product.php', true);
          xhr1.setRequestHeader('Content-Type', 'application/json');
          xhr1.send(JSON.stringify(data));


          const text = document.querySelector('.success');
          text.style.display = 'block';


          var currentDate = new Date();
          var monthNames = [
            "Jan", "Feb", "Mar", "Apr", "May", "Jun",
            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
          ];

          // Get the day and month from the current date
          var day = currentDate.getDate();
          var month = currentDate.getMonth();

          // Format the date as "D M"
          var formattedDate = day + " " + monthNames[month];
          var csvContent = 'data:text/csv;charset=utf-8,';
          csvContent += "Title,,,Quantity,,,Price\n";

          let totalPrice1 = 0; // Variable to store the total price

          cartData.forEach(function (product) {
            const { title, quantity, price } = product;
            totalPrice1 += parseFloat(price); // Add the price to the total
            csvContent += `${title},,,${quantity},,,${price} $\n`;
          });
          csvContent += `\n\n\n\n\n\n,Date,,,,,${formattedDate}\n`;
          csvContent += `,Total,,,,,${totalPrice1} $\n`;
          var encodedUri = encodeURI(csvContent);
          var link = document.createElement('a');
          link.setAttribute('href', encodedUri);
          link.setAttribute('download', 'receipt.csv');
          document.body.appendChild(link);
          link.click();
          document.body.removeChild(link);


        }
      });
    });



  </script>
  <!--     <script>
    // Restore the content of the myNav div when the DOM content has loaded
window.addEventListener('load', function() {
  var savedNavContent = localStorage.getItem('myNavContent');
  if (savedNavContent) {
   
    document.querySelector('.overlay-content').innerHTML = savedNavContent;
  }
});

</script> -->
</body>

</html>