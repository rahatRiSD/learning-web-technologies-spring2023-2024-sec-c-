<?php
require_once('../Model/model.php');

if (isset($_POST['submit'])) {
    $Name = $_POST["name"];
    $Id = $_POST["id"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $UserType = $_POST["userType"]; 

    if (signup($Name, $Id, $password, $email, $UserType)) 
    {
        header('Location:../View/login.php');
        exit(); 
    } else {
        echo "<center>Registration failed.</center>";
    }
}
?>