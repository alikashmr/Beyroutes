<?php
           include('../database/connection.php');
           $name = $_POST['name'];
           $description = $_POST['description'];
           $phone = $_POST['phone'];
           $menu = $_POST['menu'];
           $cuisineType = $_POST['cuisine'];
           $location = $_POST['location'];
           $openTime = $_POST['openTime'];
           $closeTime = $_POST['closeTime'];
           $image = $_FILES['image']['name'];
           $image_tmp = $_FILES['image']['tmp_name'];
           move_uploaded_file($image_tmp, "../uploads/$image");
 
           $sql = "INSERT INTO restaurant (restaurantName, description, picture, phone_nb, location, menu, cuisine_type, opening_time, closing_time)
           VALUES ('$name', '$description' , '$image', '$phone', '$location', '$menu', '$cuisineType', '$openTime', '$closeTime' )";
 
          if ($con->query($sql) === TRUE) {
          echo "<script> alert('Data entered Successfully!') </script>";
           } else {
         echo "Error: " ;
           }
?>







