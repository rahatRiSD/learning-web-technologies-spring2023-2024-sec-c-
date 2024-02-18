<?php

$userName = $password = "";

$userNameErr = $passwordErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["uname"])) {
      $userNameErr = "User Name is required";
    } else {
      $userName = test_input($_POST["uname"]);
    
      if (!preg_match("/^[a-zA-Z]+[a-zA-Z0-9._]+$/" ,   $userName)) {
        $userNameErr = "Only letters and white space allowed";
      }
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["pass"])) {
      $passwordErr = "Password is required";
    } 

    elseif (strlen($_POST["pass"]) <= '2') {
        $passwordErr = "Your Password Must Contain At Least 2 Characters!";
    }
    else {
        $passwordErr = "Please Check You've Entered Your Password!";
   
    }
}

function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      
?>

<?php
echo "<h2>Your Input:</h2>";
echo $userName;
echo "<br>";
echo $userNameErr;
echo "<br>";
echo $password;
echo "<br>";
echo $passwordErr;
?>