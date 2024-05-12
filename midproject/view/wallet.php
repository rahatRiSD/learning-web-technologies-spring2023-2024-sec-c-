<?php

session_start();


require_once('../model/database.php');
    
    $conn = dbConnect();


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
    
    header("Location: login.php");
    exit;
}


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
<td align="center"><a href="feedback.php" style="color: white; text-decoration: none;">Feedback</a></td>
<td align="center"><a href="dashboard.php" style="color: white; text-decoration: none;">Home</a></td>
  <td align="center"><a href="community.php" style="color: white; text-decoration: none;">Community</a></td>
     <td align="center"><a href="newsletter.php" style="color: white; text-decoration: none;">Newsletter</a></td>
     <td align="center"><a href="wallet.php" style="color: white; text-decoration: none;">Wallet</a></td>
      <td align="center"><a href="settings.php" style="color: white; text-decoration: none;">Settings</a></td>
     <td align="center"><a href="logout.php" style="color: white; text-decoration: none;">Logout</a></td>
     <td align="center"><a href="signup.html" style="color: white; text-decoration: none;">Signup</a></td>
     <td align="center"><a href="feedback.php" style="color: white; text-decoration: none;">Feedback</a></td>
<p>Welcome, <?php echo $_SESSION['username']; ?>! You are logged in.</p>

<p>Total Amount: <?php echo $totalAmount; ?> BDT</p>
<p>Total Points: <?php echo $totalPoints; ?></p>

</body>
</html>
