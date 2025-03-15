<?php
 define("db_SERVER","localhost");
 define("db_USER","root");
 define("db_password","");
 define("db_Name","BeyRoutes");
 $con = mysqli_connect(db_SERVER, db_USER, db_password,db_Name);
 if (!$con) {
   echo"<h1> Error connecting to the server </h1>";
 }
 ?>
