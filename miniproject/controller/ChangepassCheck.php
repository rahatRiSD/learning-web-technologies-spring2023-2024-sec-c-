<?php
 require_once('../Model/model.php');
 $UserName=$_SESSION['UserName'];
 $Email=$_SESSION['Email'];
?>


<?php
   
    if (isset($_POST['Submit'])) 
    {
        if (empty($_POST["CurrentPass"])) {
            echo "Current Password is required";
        } else {
            $currentPass = $_POST["CurrentPass"];
            if (checkAdminCurrentPass($currentPass,$Email)) {
                if (empty($_POST["NewPassword"])) {
                    echo "New Password is required";
                } else {
                    $Password = $_POST["NewPassword"];
                    if (strlen($Password) >= 8) {
                        $specialCharacters = ['@', '#', '$', '%'];
                        $containsSpecialChar = false;
    
                        foreach ($specialCharacters as $char) {
                            if (strpos($Password, $char) !== false) {
                                $containsSpecialChar = true;
                                break;
                            }
                        }
    
                        if ($containsSpecialChar) {
                            
                        } else {
                            echo "Password must contain at least one of the special characters (@, #, $, %).";
                            return; 
                        }
                    } else {
                        echo "Password must be at least 8 characters long.";
                        return; 
                    }
                }
    
                if (empty($_POST["RenewPassword"])) 
                {
                    echo "Retyped Password is required";
                } else {
                    $retypePass = $_POST["RenewPassword"];
    
                    if ($Password !== $retypePass) {
                        echo "New Password and Retyped Password do not match";
                    } else {
                        if (CurrentAdminPassUpdate($Password,$Email)) {
                            echo "Password Change Successfully";
                        }
                    }
                }
            } else {
                echo "Current Password is incorrect";
            }
        }
    }

?>