<?php
 session_start();
 session_destroy();
 unset($_SESSION['Email']);
 setcookie('email', $Email, time() -1 , '/');
 header('Location: ../view/Login.php');
?>