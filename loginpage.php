<?php
session_start();
include('../database/connection.php');

if (isset($_POST["email"]) && isset($_POST["password"])) {
if ($_SERVER["REQUEST_METHOD"] == "POST") {

// Retrieve form data
$email = $_POST['email'];
$password = $_POST['password'];
$email = $con->real_escape_string($email);

$sql = "SELECT userId, username , password FROM users WHERE email='$email' ";
$result = mysqli_query($con, $sql);

if($result){
  if($result->num_rows > 0){
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password,$row['password'] )) 
      {
      $_SESSION['email'] = $email;
      $_SESSION['username'] = $row['username'];
      $_SESSION['phone'] = $row['phone'];
      $_SESSION['userId'] = $row['userId'];
      header("Location: ../user/userAct.php");
     }
      else{
      echo '<script> alert("Incorrect Password")</script>';
      //header("Location: Login.php");
  }

} else {
  // Authentication failed
  echo '<script> alert("User not Found")</script>';
  //header("Location: Login.php");
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



