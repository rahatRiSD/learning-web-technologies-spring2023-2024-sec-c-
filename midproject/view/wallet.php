<?php
// Start session
session_start();

// Database connection details
require_once('../model/database.php');
    // Database connection
    $conn = dbConnect();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    // User is not logged in, redirect to login page
    header("Location: login.php");
    exit;
}

// Fetch total amount and total points for the logged-in user
$userId = $_SESSION['user_id'];

$totalAmount = 0;
$totalPoints = 0;

$sql = "SELECT SUM(amount) AS total_amount, SUM(points) AS total_points FROM transactions WHERE user_id = $userId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalAmount = $row['total_amount'];
    $totalPoints = $row['total_points'];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Amount and Points - Tourism Management System</title>
</head>
<body>

<h2>Total Amount and Points</h2>

<p>Welcome, <?php echo $_SESSION['username']; ?>! You are logged in.</p>

<p>Total Amount: <?php echo $totalAmount; ?> BDT</p>
<p>Total Points: <?php echo $totalPoints; ?></p>

</body>
</html>
