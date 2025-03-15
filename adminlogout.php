<?php 
session_start();

// Destroy the session
session_destroy();

// Redirect to the home page or another desired location
header("Location: adminLogin.php");
exit();

?>