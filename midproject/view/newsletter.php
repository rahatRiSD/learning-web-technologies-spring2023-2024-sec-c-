<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Subscribe to Newsletter</title>
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">

<h2>Subscribe to Our Newsletter</h2>
<table width="100%" border="0">
    <tr bgcolor="#333">
        <td align="center"><a href="dashboard.php" style="color: white; text-decoration: none;">Home</a></td>
        <td align="center"><a href="community.php" style="color: white; text-decoration: none;">Community</a></td>
       
        <td align="center"><a href="wallet.php" style="color: white; text-decoration: none;">Wallet</a></td>
        <td align="center"><a href="settings.php" style="color: white; text-decoration: none;">Settings</a></td>
        <td align="center"><a href="logout.php" style="color: white; text-decoration: none;">Logout</a></td>
        <td align="center"><a href="signup.html" style="color: white; text-decoration: none;">Signup</a></td>
        <td align="center"><a href="feedback.php" style="color: white; text-decoration: none;">Feedback</a></td>
    </tr>
</table>


<?php

require_once('../model/database.php');

$conn = dbConnect();


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$createSubscribersTableQuery = "CREATE TABLE IF NOT EXISTS subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    subscribe_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($createSubscribersTableQuery) === TRUE) {
    echo "<p>Subscribers table created successfully or already exists</p>";
} else {
    echo "<p>Error creating subscribers table: " . $conn->error . "</p>";
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];

   
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p>Error: Invalid email format</p>";
    } else {
        
        $checkEmailQuery = "SELECT * FROM subscribers WHERE email = '$email'";
        $result = $conn->query($checkEmailQuery);

        if ($result->num_rows > 0) {
            echo "<p>You are already subscribed to our newsletter.</p>";
        } else {
            
            $insertQuery = "INSERT INTO subscribers (email) VALUES ('$email')";
            if ($conn->query($insertQuery) === TRUE) {
                echo "<p>Thank you for subscribing to our newsletter!</p>";
            } else {
                echo "<p>Error: " . $insertQuery . "<br>" . $conn->error . "</p>";
            }
        }
    }
}


$conn->close();
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <input type="submit" value="Subscribe">
</form>

</body>
</html>
