<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        define("db_SERVER","localhost");
        define("db_USER","root");
        define("db_password","");
        $con = mysqli_connect(db_SERVER, db_USER, db_password);
        if ($con) {
            $sql = "CREATE DATABASE BeyRoutes";
            $result = mysqli_query($con, $sql);
            if ($result) {
                mysqli_close($con);
                echo'
                <h1> database succesfully created </h1>
                ';
            }
            else {
                echo '<h1> Database already exist! </h1>';
            }
        }
    ?>
</body>
</html>