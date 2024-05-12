<?php

session_start();


require_once('../model/database.php');
   
    $conn = dbConnect();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$createTransactionsTableQuery = "CREATE TABLE IF NOT EXISTS transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    points INT DEFAULT 0,
    transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($createTransactionsTableQuery) === TRUE) {
    echo "<p>Transactions table created successfully or already exists</p>";
} else {
    echo "<p>Error creating transactions table: " . $conn->error . "</p>";
}


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];
    $fullname = $_SESSION['name']; 

    echo "<p>Welcome $fullname! ";
} else {
    
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $amount = $_POST['amount'];

   
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p>Error: Invalid email format</p>";
    }

    if ($amount <= 0) {
        echo "<p>Error: Amount must be greater than zero</p>";
    }

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $amount <= 0) {
        echo "<p>Please fill in the form correctly</p>";
    } else {
        
        $pointsEarned = floor($amount / 100);

        
        $stmt = $conn->prepare("INSERT INTO transactions (user_id, fullname, email, amount, points) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("isssi", $user_id, $fullname, $email, $amount, $pointsEarned);

        
        if ($stmt->execute()) {
            echo "<p>Money added successfully</p>";
            echo "<p>Points earned: $pointsEarned</p>";
        } else {
            echo "<p>Error adding money: " . $conn->error . "</p>";
        }

        $stmt->close();
    }
}


$conn->close();
?>
