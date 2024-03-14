<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'product_db');
 
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
// Handle form submission
if (isset($_POST['name'], $_POST['b_price'], $_POST['s_price'])) {
    // Get form data
    $name = $_POST['name'];
    $b_price = $_POST['b_price'];
    $s_price = $_POST['s_price'];

 
    // Insert data into the database
    $sql = "INSERT INTO products (name, Buying_Price, Selling_Price) VALUES ('$name', '$b_price', '$s_price')";
 
    if (mysqli_query($conn, $sql)) {
        echo "Product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
 
// Close the connection
mysqli_close($conn);
?>