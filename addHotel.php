
<?php
           include('../database/connection.php');
           
           $name = $_POST['name'];
           $description = $_POST['description'];
           $price = $_POST['price'];
           $phone = $_POST['phone'];
           $location = $_POST['location'];
           $image = $_FILES['image']['name'];
           $image_tmp = $_FILES['image']['tmp_name'];
           move_uploaded_file($image_tmp, "../uploads/$image");
 
           $sql = "INSERT INTO hotels (hotelname, description, picture, phone_nb, price, location)
           VALUES ('$name', '$description' , '$image', '$phone', '$price', '$location')";
 
          if ($con->query($sql) === TRUE) {
          echo "<script> alert('Data entered Successfully!') </script>";
           } else {
         echo "Error: " ;
           }
    ?>











