<?php
session_start(); 

if (!isset($_SESSION['Email'])) {
    header('Location:../View/login.php'); 
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>change_Password</title>
    <script src="../asset/changePassword.js"defer></script>
</head>
<body>
    <center>
    <h1>change_Password</h1>
    <h2>Welcome, <?php echo $_SESSION['Name']; ?></h2>
    <center><h2>ChangePassword</h2></center>
    <form action="../Controller/ChangepassCheck.php" method="post"  onsubmit="return Form()"  enctype="">
            <fieldset>
                                   
                     Current Password:
                                    <input type="password" name="CurrentPass" id="CurrentPassword" value="" /> <br><br>
                                    New Password:
                                    <input type="password" name="NewPassword" id="NewPassword" value="" /> <br><br>
                                    Retype New Password:
                                    <input type="password" name="RenewPassword" id="Repassword" value="" /> <br><br>
                                    </hr>
                                    <input type="submit" name="Submit" value="Submit" />
                </fieldset>
        </form>
</CENTER>
    
</body>
</html>