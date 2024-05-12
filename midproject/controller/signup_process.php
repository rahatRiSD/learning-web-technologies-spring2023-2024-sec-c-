<?php
session_start();

require_once('../Model/model.php');


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = sanitize_input($_POST['username']);
$password = sanitize_input($_POST['password']);
$name = sanitize_input($_POST['name']);
$phone = sanitize_input($_POST['phone']);

if (empty($username) || empty($password) || empty($name) || empty($phone)) {
    echo "All fields are required";
    exit;
}

if (strlen($username) < 5 || strlen($username) > 20 || !ctype_alnum($username)) {
    echo "Username must be alphanumeric and 5-20 characters long";
    exit;
}

if (strlen($password) < 8 || !has_lowercase($password) || !has_uppercase($password) || !has_digit($password)) {
    echo "Password must be at least 8 characters long and contain at least one lowercase letter, one uppercase letter, and one digit";
    exit;
}

if (!ctype_alpha(str_replace(' ', '', $name))) {
    echo "Name must contain only letters and spaces";
    exit;
}

if (strlen($phone) != 11 || !ctype_digit($phone)) {
    echo "Phone number must be 11 digits long";
    exit;
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO login (username, password, name, phone_number) VALUES ('$username', '$hashed_password', '$name', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "User registered successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function has_lowercase($str) {
    return strtolower($str) !== $str;
}

function has_uppercase($str) {
    return strtoupper($str) !== $str;
}

function has_digit($str) {
    return preg_match('/\d/', $str) === 1;
}
?>
