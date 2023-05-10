<?php
require'admin/config/config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    //Mass Insert Data. Keep "name" attribute in html form same as column name in mysql table.
    $data_to_store = array_filter($_POST);
    // $data_to_store = $_POST;

    //Insert timestamp
    //$data_to_store['created_at'] = date('Y-m-d H:i:s');
    $connect = getDbInstance();
    // $connect = mysqli_connect("localhost", "root", "", "tourly");
    $query = "INSERT INTO `customer`(`username`, `email`, `phone`, `NoOfGuest`) VALUES ('".$data_to_store['Name']."','".$data_to_store['Email']."','".$data_to_store['phone']."','".$data_to_store['people']."')";
    if (mysqli_query($connect,$query)){
      header("Location: index.html");
    }
  

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tourly - Travel agency</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet">
</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>

    <div class="overlay" data-overlay></div>

    <div class="header-top">
      <div class="container">

        <a href="tel:+021006902312" class="helpline-box">

          <div class="icon-box">
            <ion-icon name="call-outline"></ion-icon>
          </div>

          <div class="wrapper">
            <p class="helpline-title">For Further Inquires :</p>

            <p class="helpline-number">+02 (0100) 69023 12</p>
          </div>

        </a>

        <a href="#" class="logo">
          <img src="./assets/images/logo.svg" alt="Tourly logo">
        </a>

        <div class="header-btn-group">

          <button class="search-btn" aria-label="Search">
            <ion-icon name="search"></ion-icon>
          </button>

          <button class="nav-open-btn" aria-label="Open Menu" data-nav-open-btn>
            <ion-icon name="menu-outline"></ion-icon>
          </button>

        </div>

      </div>
    </div>

    <div class="header-bottom">
      <div class="container">

        <ul class="social-list">

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-youtube"></ion-icon>
            </a>
          </li>

        </ul>

        <nav class="navbar" data-navbar>

          <div class="navbar-top">

            <a href="#" class="logo">
              <img src="./assets/images/logo-blue.svg" alt="Tourly logo">
            </a>

            <button class="nav-close-btn" aria-label="Close Menu" data-nav-close-btn>
              <ion-icon name="close-outline"></ion-icon>
            </button>

          </div>

          <ul class="navbar-list">

            <li>
              <a href="index.html" class="navbar-link" data-nav-link>home</a>
            </li>

            <li>
              <a href="#" class="navbar-link" data-nav-link>about us</a>
            </li>

            <li>
              <a href="index.html#destination" class="navbar-link" data-nav-link>destination</a>
            </li>

            <li>
              <a href="index.html#package" class="navbar-link" data-nav-link>packages</a>
            </li>

            <li>
              <a href="index.html#gallery" class="navbar-link" data-nav-link>gallery</a>
            </li>

            <li>
              <a href="index.html#contact" class="navbar-link" data-nav-link>contact us</a>
            </li>

          </ul>

        </nav>

        <a href="Book.php"> <button class="btn btn-primary">Book Now</button></a>

      </div>
    </div>

  </header>


  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero" id="home">
        <div class="container">

          <h2 class="h1 hero-title">Journey to explore world</h2>

          <p class="hero-text">
             And my house is soft. Wisely? What chocolates? Our body class takes care of the things that we do
            do they live in pleasures?
            Hunger, let us live for the least, for no one, as if pregnant with pills, him
          </p>

          <div class="btn-group">
            <button class="btn btn-primary">Learn more</button>

          <a href="#">  <button class="btn btn-secondary">Book now</button></a>
          </div>

        </div>
      </section>

        <!-- register -->
        <!--      
        - #TOUR SEARCH
      -->

      <section class="tour-search">
        <div class="container">

          <form action="" method="post" class="tour-search-form">

            <div class="input-wrapper">
              <label for="Name" class="input-label">Your Name*</label>

              <input type="text" name="Name" id="Name" required placeholder="Enter Your Name"
                class="input-field">
            </div>
            <div class="input-wrapper">
              <label for="Email" class="input-label">Email*</label>

              <input type="email" name="Email" id="Email" required placeholder="Enter Your Email"
                class="input-field">
            </div>
            <div class="input-wrapper">
              <label for="phone" class="input-label">Phone*</label>

              <input type="tel" name="phone" id="phone" required placeholder="Enter Your Phone"
                class="input-field">
            </div>

            <div class="input-wrapper">
              <label for="people" class="input-label">Pax Number*</label>

              <input type="number" name="people" id="people" required placeholder="No.of People" class="input-field">
            </div>


            <button type="submit" class="btn btn-secondary">submit now</button>

          </form>

        </div>
      </section>

       <!-- 
    - #FOOTER
  -->

  <footer class="footer">

    <div class="footer-top">
      <div class="container">

        <div class="footer-brand">

          <a href="#" class="logo">
            <img src="./assets/images/logo.svg" alt="Tourly logo">
          </a>

          <p class="footer-text">
            Urna ratione ante harum provident, eleifend, vulputate molestiae proin fringilla, praesentium magna conubia
 Urna reason in front of these provide, eleifend, vulputate discomforte proin fringillae, the present great marriages at bearing, price, aenean or ultrices.
          </p>

        </div>

        <div class="footer-contact">

          <h4 class="contact-title">Contact Us</h4>

          <p class="contact-text">
            Feel free to contact and reach us !!
          </p>

          <ul>

            <li class="contact-item">
              <ion-icon name="call-outline"></ion-icon>

              <a href="tel:+021006902312" class="contact-link">+02 (0100) 69023 12</a>
            </li>

            <li class="contact-item">
              <ion-icon name="mail-outline"></ion-icon>

              <a href="mailto:info.tourly.com" class="contact-link">info.tourly.com</a>
            </li>

            <li class="contact-item">
              <ion-icon name="location-outline"></ion-icon>

              <address>shobraa-Masr, Egypt</address>
            </li>

          </ul>

        </div>



        <div class="footer-form">

          <p class="form-text">
            Subscribe our newsletter for more update & news !!
          </p>

          <form action="" class="form-wrapper">
            <input type="email" name="email" class="input-field" placeholder="Enter Your Email" required>

            <button type="submit" class="btn btn-secondary">Subscribe</button>
          </form>

        </div>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2023 <a href="">code with Team</a>. All rights reserved
        </p>

        <ul class="footer-bottom-list">

          <li>
            <a href="#" class="footer-bottom-link">Privacy Policy</a>
          </li>

          <li>
            <a href="#" class="footer-bottom-link">Term & Condition</a>
          </li>

          <li>
            <a href="#" class="footer-bottom-link">FAQ</a>
          </li>

        </ul>

      </div>
    </div>

  </footer>





  <!-- 
    - #GO TO TOP
  -->

  <a href="#top" class="go-top" data-go-top>
    <ion-icon name="chevron-up-outline"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>