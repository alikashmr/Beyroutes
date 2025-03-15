<?php
session_start();
include('../database/connection.php');

if (isset($_POST["email2"]) && isset($_POST["password"])) {
if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Retrieve form data
$email = $_POST['email2'];
$password = $_POST['password'];
$email = $con->real_escape_string($email);

$sql = "SELECT adminId, adminemail , password FROM admin WHERE adminemail='$email' ";
$result = mysqli_query($con, $sql);

if($result){
  if($result->num_rows > 0){
    $row = mysqli_fetch_assoc($result);
    if ($password == $row['password']) 
      {
      $_SESSION['adminemail'] = $email;
      $_SESSION['adminId'] = $row['adminId'];
      header("Location: ../admin/adminpage.php");
     }
      else{
      echo '<script> alert("Incorrect Password")</script>';
     
  }

} else {
  // Authentication failed
  echo '<script> alert("User not Found")</script>';
  
}
}
else {
  echo '<script> alert("invalid Data")</script>';
}
}
}

// Close connection
$con->close();


?>



