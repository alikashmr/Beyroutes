<?php
include('../database/connection.php');
session_start();

if (isset($_POST["guests"]) && isset($_POST["rooms"])
&& isset($_POST["checkin"]) && isset($_POST["checkout"]) ) {

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$guests = $_POST['guests'];
$checkin =  $_POST['checkin'];
$checkout = $_POST['checkout'];
$room = $_POST['rooms'];
$userId = $_SESSION['userId'];

$hotelId = $_POST['hotelId'];

$sql = "INSERT INTO hotel_reservations (userId, hotelId,  check_in,  check_out, room, guests)
VALUES ('$userId',  '$hotelId', '$checkin', '$checkout', '$room', '$guests')";

$result=mysqli_query($con, $sql);
  if($result){
    echo '<script>alert("Data inserted Successfully")</script>';
    }
  else{
    echo '<script>alert("Error, Try again")</script>';
    }
}
}



$con->close();
?>