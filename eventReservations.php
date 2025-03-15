<?php
define("db_SERVER","localhost");
define("db_USER","root");
define("db_password","");
define("db_Name","BeyRoutes");
$con = mysqli_connect(db_SERVER, db_USER, db_password,db_Name);
if (!$con) {
    echo"<h1> Error connecting to the server </h1>";
}
else{
$sql = "CREATE TABLE Event_reservations (eventReservationId int auto_increment primary key , userId varchar(50), eventId varchar(50), guests varchar(50));";
$result = mysqli_query($con,$sql)
or die ('unable to connect '.mysqli_error($con));
}
?>