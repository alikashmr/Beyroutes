<?php
include('../database/connection.php');

// Get list of tables
$tables = [];
$result = $con->query("SHOW TABLES");
while ($row = $result->fetch_array()) {
    $tables[] = $row[0];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Interface</title>
</head>
<body>
    <h1>Admin Interface</h1>
    <h2>Tables</h2>
    <ul>
        <?php foreach ($tables as $table): ?>
            <li><a href="table.php?table=<?php echo $table; ?>"><?php echo $table; ?></a></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

<style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f4f4f4;
        }
        h1, h2 {
            color: #333;
        }
        ul {
            list-style-type: square;
            padding: 0;
        }
        li {
            margin: 10px 0;
        }
        a {
            display: block;
            padding: 10px 15px;
           
            color: black;
            text-decoration: none;
            border-radius: 4px;
        }
        a:hover {
            background-color: #286090;
        }
    </style>

