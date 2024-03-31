<?php
// Start the session to access session variables
session_start();

// Check if the user is logged in, if not, redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.html");
    exit;
}

// Display username
$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Tourism Management System</title>
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">
     <fieldset style="text-align: center; width: 30%; padding: 20px;">
        <legend><h2>Welcome to the Dashboard, <?php echo htmlspecialchars($username); ?></h2></legend>

       
<table width="100%" border="0">
    <tr bgcolor="#333">
        <td align="center"><a href="dashboard.php" style="color: white; text-decoration: none;">Home</a></td>
        <td align="center"><a href="community.php" style="color: white; text-decoration: none;">Community</a></td>
        <td align="center"><a href="newsletter.php" style="color: white; text-decoration: none;">Newsletter</a></td>
        <td align="center"><a href="wallet.php" style="color: white; text-decoration: none;">Wallet</a></td>
        <td align="center"><a href="settings.php" style="color: white; text-decoration: none;">Settings</a></td>
        <td align="center"><a href="logout.php" style="color: white; text-decoration: none;">Logout</a></td>
        <td align="center"><a href="signup.html" style="color: white; text-decoration: none;">Signup</a></td>
        <td align="center"><a href="feedback.php" style="color: white; text-decoration: none;">Feedback</a></td>
    </tr>
</table>

    </fieldset>
</body>
</html>
