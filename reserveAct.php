<?php
include('../database/connection.php');
session_start();

if (isset($_POST["guests"]) && isset($_POST["checkin"]) && isset($_POST["check_in_time"]) ) {

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$guests = $_POST['guests'];
$checkin =  $_POST['checkin'];
$checkInTime= $_POST['check_in_time'];
$userId = $_SESSION['userId'];
$activityId = $_POST['ActivityId'];

$sql = "INSERT INTO act_reservations (userId, activityId,  check_in_date,  check_in_time,  guests)
VALUES ('$userId',  '$activityId', '$checkin', '$checkInTime', '$guests')";

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