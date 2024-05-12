<?php
require_once('../Model/model.php');
session_start();

if (isset($_POST['submit'])) 
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $Status = login($email, $password);

    if ($Status) 
    {  
        if ($Status['UserType'] =='User' || $Status['UserType'] == 'Admin') 
        {
            $_SESSION['Name'] = $Status['Name'];
            $_SESSION['UserType'] = $Status['UserType'];
            $_SESSION['Email'] = $Status['EmailID'];

            if (isset($_POST['StayLogin']))
             {
                setcookie('email',$_SESSION['Email'], time() + 604800, '/');
                setcookie('UserType',$_SESSION['UserType'],time() + 604800, '/');
            }
            

            header('location:../View/'.$_SESSION['UserType'].'_dashboard.php');
        }
            
    }

    else {
        echo"INCORRECT PASSWORD OR EMAIL";
    }


}

else {
    echo"PLEASE REGISTER FIRST";
}

 
?>