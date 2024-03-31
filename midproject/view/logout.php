<?php
// Start session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Delete the session cookie by setting its expiration to a past time
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

// Destroy the session.
session_destroy();

// Redirect to the login page after logout
header("Location: login.html");
exit;
?>
