<?php

$correct_username = 'admin';
$correct_password = 'password';

$nameErr = '';
$passwordErr = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
        $nameErr = "Username is required";
    } else {
        if (!preg_match("/^[\w\d]*$/", $username)) {
            $nameErr = "Only letters, numbers, and underscores allowed";
        }
    }

    if (empty($password)) {
        $passwordErr = "Password is required";
    }

    if (empty($username) && empty($password)) {
        echo 'Username and password are required';
    } elseif (!empty($username) && !empty($password) && $username === $correct_username && $password === $correct_password) {
        header('Location: home.php');
        exit;
    } else {
        echo 'Invalid credentials';
    }
}
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Username: <input type="text" name="username">
    <span class="error"><?php echo $nameErr;?></span><br><br>
    Password: <input type="password" name="password">
    <span class="error"><?php echo $passwordErr;?></span><br><br>
    <input type="submit" value="Login">
</form>
Not registered? <a href="https://www.google.com">Click here</a> to register.