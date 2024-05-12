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
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        fieldset {
            text-align: center;
            width: 50%;
        }

        legend {
            color: blue;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #333;
        }

        th {
            background-color: #333;
            color: white;
        }

        a {
            color: white;
            text-decoration: none;
        }

        a:hover {
            color: yellow;
        }

        input[type="email"],
        input[type="number"] {
            padding: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: blue;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: darkblue;
        }
    </style>
</head>
<body>
    <fieldset>
       <a> <legend>Feedback Form</legend></a>
        <a><h2>Travel Management System Feedback</h2></a>
        <table>
            <tr bgcolor="#333">
                <td align="center"><a href="home_travel.html">Home</a></td>
                <td align="center"><a href="community.php">Community</a></td>
                <td align="center"><a href="newsletter.php">Newsletter</a></td>
                <td align="center"><a href="wallet.php">Wallet</a></td>
                <td align="center"><a href="settings.php">Settings</a></td>
                <td align="center"><a href="logout.php">Logout</a></td>
                <td align="center"><a href="register.php">Signup</a></td>
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
