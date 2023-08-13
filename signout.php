<?php
// Start the session
session_start();

// Unset the UserLogin and Access session variables
unset($_SESSION['UserLogin']);
unset($_SESSION['Access']);

// Redirect to the index.php page
echo header("Location: index.php");

?>