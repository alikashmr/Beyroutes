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
            $sql = "CREATE TABLE admin (adminId int auto_increment primary key,adminName varchar(255), adminemail varchar(50), password varchar(255));";
            $result1 = mysqli_query($con,$sql)
            or die ('unable to connect '.mysqli_error($con));
        }            
?>