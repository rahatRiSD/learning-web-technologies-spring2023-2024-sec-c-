<?php

$conn = mysqli_connect('localhost', 'root', '', 'web_tech');
 

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


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
 

session_start();
 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    
    $sql = "SELECT id, username, name FROM login WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
 
    
    if ($result->num_rows > 0) {
       
        $row = $result->fetch_assoc();
       
       
        $_SESSION['user_id'] = $row['id']; 
        $_SESSION['username'] = $row['username'];
        $_SESSION['name'] = $row['name']; 
        $_SESSION['loggedin'] = true;

        
        if ($row['username'] == 'admin') {
            header("Location: admin_dashboard.php");
        } else {
            header("Location: home_travel.html");
        }
        exit;
    } else {
        echo "Invalid username or password";
    }
}
 
$conn->close();
?>
