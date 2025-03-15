
<?php
          include('../database/connection.php');
          $name = $_POST['name'];
          $description = $_POST['description'];
          $price = $_POST['price'];
          $phone = $_POST['phone'];
          $location = $_POST['location'];
          $openTime = $_POST['openTime'];
          $closeTime = $_POST['closeTime'];
          $booking = isset($_POST['booking']) ? 1 : 0;
          $image = $_FILES['image']['name'];
          $image_tmp = $_FILES['image']['tmp_name'];
          move_uploaded_file($image_tmp, "../uploads/$image");

          $sql = "INSERT INTO activity (title, description, picture, phone_nb, price, location, opening_time, closing_time, booking)
           VALUES ('$name', '$description' , '$image', '$phone', '$price', '$location', '$openTime', '$closeTime', '$booking' )";

          if ($con->query($sql) === TRUE) {
          echo "<script> alert('Data entered Successfully!') </script>";
          } else {
         echo "Error: " ;
          }
   ?>









