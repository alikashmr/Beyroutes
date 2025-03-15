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
            $sql = "CREATE TABLE restaurant (restaurantId int auto_increment primary key, restaurantName varchar(255), description text, menu varchar(255),
            location varchar(255), picture BLOB, cuisine_type varchar(255), phone_nb varchar(50), opening_time time, closing_time time);";
            $result1 = mysqli_query($con,$sql)
            or die ('unable to connect '.mysqli_error($con));
        }            
?>