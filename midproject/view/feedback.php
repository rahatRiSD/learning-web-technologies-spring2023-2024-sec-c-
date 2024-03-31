<?php

session_start();


require_once('../model/database.php');

$conn = dbConnect();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$createTableQuery = "CREATE TABLE IF NOT EXISTS feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    rating INT NOT NULL,
    comments TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($createTableQuery) === TRUE) {
    echo "<p>Feedback table created successfully or already exists</p>";
} else {
    echo "<p>Error creating feedback table: " . $conn->error . "</p>";
}


$name = $email = $rating = $comments = "";
$feedback_submitted = false;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];

    
    $sql = "INSERT INTO feedback (name, email, rating, comments) VALUES ('$name', '$email', '$rating', '$comments')";

   
    if ($conn->query($sql) === TRUE) {
        $feedback_submitted = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Management System Feedback</title>
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">
    <fieldset style="text-align: center; width: 50%;">
        <legend>Feedback Form</legend>
        <h2>Travel Management System Feedback</h2>
        <table width="100%" border="0">
    <tr bgcolor="#333">
        <td align="center"><a href="dashboard.php" style="color: white; text-decoration: none;">Home</a></td>
        <td align="center"><a href="community.php" style="color: white; text-decoration: none;">Community</a></td>
        <td align="center"><a href="newsletter.php" style="color: white; text-decoration: none;">Newsletter</a></td>
        <td align="center"><a href="wallet.php" style="color: white; text-decoration: none;">Wallet</a></td>
        <td align="center"><a href="settings.php" style="color: white; text-decoration: none;">Settings</a></td>
        <td align="center"><a href="logout.php" style="color: white; text-decoration: none;">Logout</a></td>
        <td align="center"><a href="signup.html" style="color: white; text-decoration: none;">Signup</a></td>
        
    </tr>
</table>

        <?php if ($feedback_submitted): ?>
        <p>Feedback submitted successfully</p>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!-- Display the user's name from session -->
            <label for="name">Name:</label>
            <span id="name"><?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?></span><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="rating">Rating (1-5):</label>
            <input type="number" id="rating" name="rating" min="1" max="5" required><br><br>

            <label for="comments">Comments:</label><br>
            <textarea id="comments" name="comments" rows="4" required></textarea><br><br>

            <input type="submit" value="Submit">
        </form>
    </fieldset>
</body>
</html>
