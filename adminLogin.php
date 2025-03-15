<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login and Registration Form in HTML | CodingNepal</title>
      <link rel="stylesheet" href="../css/adminstyle.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <div class="wrapper">
         <div class="title-text">
            <div class="title login">
               Login Form
            </div>
            <div class="title signup">
               Signup Form
            </div>
         </div>
         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Login</label>
               <label for="signup" class="slide signup">Signup</label>
               <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
               <form action="adminLog.php" method="POST" class="login">
                  <div class="field">
                     <input type="text" name="email2" placeholder="Email Address" required>
                  </div>
                  <div class="field">
                     <input type="password" name="password" placeholder="Password" required>
                  </div>
                  <div class="pass-link">
                     <a href="#">Forgot password?</a>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Login">
                  </div>
                  <div class="signup-link">
                     Not a member? <a href="">Signup now</a>
                  </div>
               </form>
               <form action="adminLogin.php"  method="POST" class="signup">
                  <div class="field">
                     <input type="text"id='email' name="email" placeholder="Email Address" required>
                  </div>
                  <div class="field">
                     <input type="password" id="pass" name="pass" placeholder="Password" required>
                  </div>
                  <div class="field">
                     <input type="password" name="confpass" placeholder="Confirm password" required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Signup">
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>

      <?php
      include('../database/connection.php');
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get user input from the form
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $confpass = $_POST["confpass"];

    
    
        // Simple form validation
        if (empty($email) || empty($pass) || empty($confpass)) {
           echo "<script> alert('All fields are required') </script>";
         } else {
            if ($_POST["pass"] == $_POST["confpass"]){
        
           // Insert user data into the database
            $sql = "INSERT INTO admin (adminemail, password) VALUES ('$email', '$pass')";

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



