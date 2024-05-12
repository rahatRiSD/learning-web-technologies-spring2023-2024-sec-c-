<?php

session_start();


require_once('../model/database.php');
    
    $conn = dbConnect();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}


$email = $_SESSION['email'];


$totalPointsQuery = "SELECT SUM(points) AS total_points FROM users WHERE email = '$email'";
$totalAmountQuery = "SELECT SUM(amount) AS total_amount FROM transactions WHERE email = '$email'";


$totalPointsResult = $conn->query($totalPointsQuery);
$totalAmountResult = $conn->query($totalAmountQuery);


if ($totalPointsResult && $totalAmountResult) {
    
    $totalPointsRow = $totalPointsResult->fetch_assoc();
    $totalAmountRow = $totalAmountResult->fetch_assoc();

    
    $totalPoints = $totalPointsRow['total_points'];
    $totalAmount = $totalAmountRow['total_amount'];

    echo "<p>Total Points: $totalPoints</p>";
    echo "<p>Total Amount (BDT): $totalAmount</p>";
} else {
    echo "Error retrieving total points and total amount";
}


$conn->close();
?>

