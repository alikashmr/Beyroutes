<?php
include('../database/connection.php');

$table = $_GET['table'];
$id = $_GET['id'];
$primary_key = $_GET['primary_key'];

// Delete row from table
$con->query("DELETE FROM $table WHERE $primary_key = '$id'");

header("Location: table.php?table=$table");
exit;
?>
