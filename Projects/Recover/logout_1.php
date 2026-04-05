<?php
session_start();

// Unset and destroy the user's session to log them out
session_unset();
session_destroy();

header('Location: login.php'); // Redirect to the login page after logout
exit();
?>