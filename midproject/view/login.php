<?php
// Establish database connection
$conn = mysqli_connect('localhost', 'root', '', 'web_tech');
 
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create login table if it doesn't exist
$createLoginTableQuery = "CREATE TABLE IF NOT EXISTS login (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL
)";

if ($conn->query($createLoginTableQuery) === TRUE) {
    echo "<p>Login table created successfully or already exists</p>";
} else {
    echo "<p>Error creating login table: " . $conn->error . "</p>";
}
 
// Start session
session_start();
 
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    // SQL query to fetch user from database
    $sql = "SELECT id, username, name FROM login WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
 
    // Check if user exists
    if ($result->num_rows > 0) {
        // Fetch user data
        $row = $result->fetch_assoc();
       
        // Set session variables
        $_SESSION['user_id'] = $row['id']; // Add user id to session
        $_SESSION['username'] = $row['username'];
        $_SESSION['name'] = $row['name']; // Add user's name to session
        $_SESSION['loggedin'] = true;

        // Redirect user to appropriate dashboard
        if ($row['username'] == 'admin') {
            header("Location: admin_dashboard.php");
        } else {
            header("Location: dashboard.php");
        }
        exit;
    } else {
        echo "Invalid username or password";
    }
}
 
$conn->close();
?>
