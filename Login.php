<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Login and Registration Form in HTML & CSS | CodingLab </title>-->
    <link rel="css/stylesheet" href="style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6d1315b1ea.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="js/validation.js"></script>
    <link rel="stylesheet" href="../css/stylsheet2.css" type="text/css">
    <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   </head>
<body>

  <div class="bar1">
    <div class="collapse" id="navbarToggleExternalContent" data-bs-theme="dark">
      <div class=" menu-bar p-4">
       <a href="home.html">Home</a>
       <a href="hotel.html">Hotels</a>
       <a href="services.html">Services</a>
       <a href="Login.php">Login</a>
      </div>
    </div>
    <nav class="navbar navbar-dark">
      <div class="container-fluid">
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" fdprocessedid="hdxnp">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>
  </div>

  <div class="navbar1" style="position: relative;">
        <span class="log" style="margin-right: 42%; font-weight: bold;" ><span class="luxe">Bey</span> Routes</span>

        
        <a href="../html/home.html">Home</a>
        <a href="../database/activity.php">Activity</a>
        <a href="../database/hotels.php">Hotels</a>
        <a href="../database/restaurant.php">Restaurants</a>
        <a href="../database/events.php">Events</a>
        <a href="#">Login</a>
  </div>

  
  <div class="container3">
    <input type="checkbox" id="flip">
    <div class="cover">
      <div class="front">
        <img src="../images/beirut.jpg" alt="">
      </div>
      
    </div>
    <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title">Login</div>
          <form action="loginpage.php" method="POST">
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" id="email" name="email" placeholder="Enter your email" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
              </div>
              <div class="text"><a href="#">Forgot password?</a></div>
              <div class="button input-box">
                <input type="submit"  value="Login">
              </div>
              <div class="text sign-up-text">Don't have an account? <label for="flip">Register now</label></div>
            </div>
        </form>
      </div>
        <div class="signup-form">
          <div class="title">Register</div>
        <form action="Login.php" method="POST" >
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" id="username" name="username" placeholder="Enter your name" required>
              </div>
              <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="text" id="email1" name="email1" placeholder="Enter your email" required>
                <span class="error-message" id="emailError"></span>
              </div>
              <div class="input-box">
              <i class="fa-solid fa-phone"></i>
                <input type="text" id="phone" name="phone" placeholder="Enter phone number" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" id="password1" name="password1" placeholder="Enter your password" required>
              </div>
              <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" id="passwordConfirm" name="passwordConfirm" placeholder="Confirm password" required>
              </div>
              <div class="button input-box">
                <input type="submit"  value="Sumbit">
              </div>
              <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
            </div>
      </form>
    </div>
    </div>
    </div>
  </div>


  <div class="footer-distributed">

    <div class="footer-left">

      <h3>Bey<span>Routes</span></h3>

      

      <p class="footer-company-name">BeyRoutes© 2024</p>
    </div>

    <div class="footer-center">

      <div>
        <i class="fa fa-map-marker"></i>
        <p><span>444 S. Cedros Ave</span> Solana Beach, California</p>
      </div>

      <div>
        <i class="fa fa-phone"></i>
        <p>009611213224</p>
      </div>

      <div>
        <i class="fa fa-envelope"></i>
        <p><a href="mailto:luxe.travelt@company.com">BeyRoutes@company.com</a></p>
      </div>

    </div>

    <div class="footer-right">

      <p class="footer-company-about">
        <span>About the Company</span>
        BeyRoutes is a concern traveller, whether looking for a place to pitch a tent or a luxury suite in a fancy resort. Booking accomodations,
        dealing with the vast array of accommodation options, and considering alternative lodging issues that travelers face.
      </p>

      <div class="footer-icons">

        
        <a href="www.twitter.com"><i class="fa fa-twitter"></i></a>
        <a href="www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
        <a href=www.facebook.com><i class="fa-brands fa-facebook-f"></i></a>


      </div>

    </div>

  </div>

  <?php
  include('../database/connection.php');
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the form
    $username = $_POST["username"];
    $email = $_POST["email1"];
    $password = $_POST["password1"];
    $phone = $_POST["phone"];


    // Simple form validation
    if (empty($username) || empty($email) || empty($password)) {
      echo "<script> alert('All fields are required') </script>";
    } else {
      if ($_POST["password1"] == $_POST["passwordConfirm"]){
        // Hash the password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert user data into the database
        $sql = "INSERT INTO users (username, email, phone_nb, password) VALUES ('$username', '$email', '$phone', '$hashedPassword')";

        if ($con->query($sql) === TRUE) {
            echo "<script> alert('Registration Successful!') </script>";
        } else {
            echo "<script> alert('Error Registration') </script>";
        }
      }
    }
}

// Close the database connection
$con->close();
?>
  
  



</body>
</html>
