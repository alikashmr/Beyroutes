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
            $sql = "CREATE TABLE events (eventId int auto_increment primary key, eventName varchar(255), description text, price varchar(255),
            location varchar(255), picture BLOB, phone_nb varchar(50), time time);";
            $result1 = mysqli_query($con,$sql)
            or die ('unable to connect '.mysqli_error($con));
        }            
?>