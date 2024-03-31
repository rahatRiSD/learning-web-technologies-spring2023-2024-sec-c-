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

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// Retrieve user's email from session
$email = $_SESSION['email'];

// Query to retrieve total points and total amount for the user
$totalPointsQuery = "SELECT SUM(points) AS total_points FROM users WHERE email = '$email'";
$totalAmountQuery = "SELECT SUM(amount) AS total_amount FROM transactions WHERE email = '$email'";

// Execute queries
$totalPointsResult = $conn->query($totalPointsQuery);
$totalAmountResult = $conn->query($totalAmountQuery);

// Check if queries were successful
if ($totalPointsResult && $totalAmountResult) {
    // Fetch total points and total amount
    $totalPointsRow = $totalPointsResult->fetch_assoc();
    $totalAmountRow = $totalAmountResult->fetch_assoc();

    // Display total points and total amount
    $totalPoints = $totalPointsRow['total_points'];
    $totalAmount = $totalAmountRow['total_amount'];

    echo "<p>Total Points: $totalPoints</p>";
    echo "<p>Total Amount (BDT): $totalAmount</p>";
} else {
    echo "Error retrieving total points and total amount";
}

// Close database connection
$conn->close();
?>

