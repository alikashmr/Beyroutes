
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

$sql = "SELECT u.username, u.email,  u.phone_nb, hr.hotelReservationId, hr.hotelId, hr.check_in, hr.check_out, hr.room ,hr.guests, h.hotelName
        FROM users u
        JOIN hotel_reservations hr ON u.userId = hr.userId
        JOIN hotels h ON h.hotelId = hr.hotelId
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
        <th>Hotel</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Check in</th>
        <th>Check out</th>
        <th>Rooms</th>
        <th>Guests</th>
      </tr>
    <?php
    foreach ($data as $row) {
        echo "<tr>";
        echo "<td>" . $row["hotelReservationId"] . "</td>";
        echo "<td>" . $row["hotelName"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["phone_nb"] . "</td>";
        echo "<td>"  . $row["check_in"] .   "</td>";
        echo "<td>"  . $row["check_out"] .  "</td>";
        echo "<td>"  . $row["room"] .  "</td>";
        echo "<td>"  . $row["guests"] .  "</td>";
        echo "</tr>";
    }
    ?>
</table>
  
