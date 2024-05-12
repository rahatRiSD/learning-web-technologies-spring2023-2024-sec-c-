<!DOCTYPE html>
<html lang="en">
<head>
    <title>Travel Management System Feedback</title>
</head>
<body>
    <?php
   
   require_once('../model/database.php');
    
    $conn = dbConnect();

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
   //

    if ($conn->query($createTableQuery) === TRUE) {
        echo "<p>Feedback table created successfully or already exists</p>";
    } else {
        echo "<p>Error creating feedback table: " . $conn->error . "</p>";
    }

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $name = $_POST['name'];
        $email = $_POST['email'];
        $rating = $_POST['rating'];
        $comments = $_POST['comments'];

        
        $sql = "INSERT INTO feedback (name, email, rating, comments) VALUES ('$name', '$email', '$rating', '$comments')";

        
        if ($conn->query($sql) === TRUE) {
            echo "Feedback submitted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
    
    <h2>Travel Management System Feedback</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="rating">Rating (1-5):</label>
        <input type="number" id="rating" name="rating" min="1" max="5" required><br><br>

        <label for="comments">Comments:</label><br>
        <textarea id="comments" name="comments" rows="4" required></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
