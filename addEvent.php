
<?php
          include('../database/connection.php');
          $name = $_POST['name'];
          $description = $_POST['description'];
          $price = $_POST['price'];
          $location = $_POST['location'];
          $time = $_POST['time'];
          $phone = $_POST['phone'];
          $image = $_FILES['image']['name'];
          $image_tmp = $_FILES['image']['tmp_name'];
          move_uploaded_file($image_tmp, "../uploads/$image");

          $sql = "INSERT INTO events (eventName, description, picture, price, location, phone_nb, time) 
          VALUES ('$name', '$description' , '$image' , '$price' , '$location' , '$phone' , '$time')";

          if ($con->query($sql) === TRUE) {
         echo "<script> alert('Data entered Successfully !') </script>";
          } else {
        echo "Error: " ;
          }
   ?>