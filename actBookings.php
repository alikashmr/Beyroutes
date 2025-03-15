
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Bookings</title>
</head>
<body>
<h1> Bookings</h1>
<style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</body>
</html>


<?php
session_start();
require '../database/connection.php';

$email = $_SESSION['email'];

function getReservations($con, $email) {
$data = array();

$sql = "SELECT u.username, u.email,  u.phone_nb, ar.actReservationId, ar.activityId, ar.check_in_date, ar.check_in_time, ar.guests, a.title
        FROM users u
        JOIN act_reservations ar  ON u.userId = ar.userId  
        JOIN activity a ON a.activityId = ar.activityId
        WHERE u.email = ?";

// Prepare the statement
$stmt = $con->prepare($sql);

if ($stmt) {
// Bind the email parameter
$stmt->bind_param("s", $email);

// Execute query
$stmt->execute();
$result = $stmt->get_result();
}

if ($result->num_rows > 0) {
  // Fetch data from the result set
  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
    }
  }
$stmt->close();

return $data;
}

$data = getReservations($con, $email);

$con->close();
?>


<table>
       <tr>
        <th>Reserve Number</th>
        <th>Activity Name</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Check in Date</th>
        <th>Check in Time</th>
        <th>Guests</th>
      </tr>
    <?php
    foreach ($data as $row) {
        echo "<tr>";
        echo "<td>" . $row["actReservationId"] . "</td>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["phone_nb"] . "</td>";
        echo "<td>"  . $row["check_in_date"] .   "</td>";
        echo "<td>"  . $row["check_in_time"] .  "</td>";
        echo "<td>"  . $row["guests"] .  "</td>";
        echo "</tr>";
    }
    ?>
</table>
  
