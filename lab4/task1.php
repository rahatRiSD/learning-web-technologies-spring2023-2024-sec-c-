<?php
 
$username = $_POST["username"];
$password = $_POST["password"];
 
if (strlen($username) < 2 || !checkUsername($username)) {
    echo "Invalid username. .";
   
}
 
if (strlen($password) < 8 || !checkPassword($password)) {
    echo "Invalid password. .";
   
} else {
    echo "Registration successful!";
}
 
function checkUsername($username) {
    $validChars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789.-_';
 
    for ($i = 0; $i < strlen($username); $i++) {
        if (strpos($validChars, $username[$i]) === false) {
            return false;
        }
    }
 
    return true;
}
 
function checkPassword($password) {
    $specialChars = ['@', '#', '$', '%'];
 
    $hasSpecialChar = false;
    for ($i = 0; $i < strlen($password); $i++) {
        if (in_array($password[$i], $specialChars)) {
            $hasSpecialChar = true;
            break;
        }
    }
 
    return $hasSpecialChar;
}
?>