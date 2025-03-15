<?php
include('../database/connection.php');

$table = $_GET['table'];

// Get the primary key column name
$result = $con->query("SHOW KEYS FROM $table WHERE Key_name = 'PRIMARY'");
$primary_key = $result->fetch_assoc()['Column_name'];

// Get table data
$result = $con->query("SELECT * FROM $table");
$columns = $result->fetch_fields();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Table <?php echo $table; ?></title>
</head>
<body>
    <h1>Table: <?php echo $table; ?></h1>
    <table border="1">
        <thead>
            <tr>
                <?php foreach ($columns as $column): ?>
                    <th><?php echo $column->name; ?></th>
                <?php endforeach; ?>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <?php foreach ($columns as $column): ?>
                        <td><?php echo $row[$column->name]; ?></td>
                    <?php endforeach; ?>
                    <td>
                        <a href="edit.php?table=<?php echo $table; ?>&id=<?php echo $row[$primary_key]; ?>&primary_key=<?php echo $primary_key; ?>">Edit</a>
                        <a class="delete" href="delete.php?table=<?php echo $table; ?>&id=<?php echo $row[$primary_key]; ?>&primary_key=<?php echo $primary_key; ?>"
                         onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a href="dataTables.php">Back to tables list</a>
</body>
</html>

<style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f4f4f4;
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #337ab7;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #e6f7ff;
        }
        a {
            color: #337ab7;
            text-decoration: none;
            margin-left: 20px;
            
        }
        a:hover {
            text-decoration: underline;
            color: red;
        }
        .actions a {
            display: inline-block;
            padding: 5px 10px;
            background-color: #5cb85c;
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
        }
        .actions a:hover {
            background-color: #4cae4c;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #337ab7;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>