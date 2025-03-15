<?php
include('../database/connection.php');
session_start();

if (isset($_POST["guests"])) {

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$guests = $_POST['guests'];
$userId = $_SESSION['userId'];
$eventId = $_POST['eventId'];

$sql = "INSERT INTO event_reservations (userId, eventId, guests)
VALUES ('$userId',  '$eventId', '$guests')";

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