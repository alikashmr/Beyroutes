<?php
include('../database/connection.php');

$table = $_GET['table'];
$id = $_GET['id'];
$primary_key = $_GET['primary_key'];

// Get row data
$result = $con->query("SELECT * FROM $table WHERE $primary_key = '$id'");
$row = $result->fetch_assoc();
$columns = array_keys($row);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $update_values = [];
    foreach ($columns as $column) {
        if ($column !== $primary_key) {
            $update_values[] = "$column = '" . $con->real_escape_string($_POST[$column]) . "'";
        }
    }
    $update_values = implode(', ', $update_values);
    $con->query("UPDATE $table SET $update_values WHERE $primary_key = '$id'");
    header("Location: table.php?table=$table");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Row in <?php echo $table; ?></title>
</head>
<body>
    <h1>Edit Row in Table: <?php echo $table; ?></h1>
    <form method="post">
        <?php foreach ($columns as $column): ?>
            <div>
                <label for="<?php echo $column; ?>"><?php echo $column; ?></label>
                <input type="text" id="<?php echo $column; ?>" name="<?php echo $column; ?>" value="<?php echo $row[$column]; ?>" <?php echo $column === $primary_key ? 'readonly' : ''; ?>>
            </div><br>
        <?php endforeach; ?>
        <button type="submit">Save</button>
    </form>
    <a href="table.php?table=<?php echo $table; ?>">Back to table</a>
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
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #5cb85c;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            color: #337ab7;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>