<?php

if (($_SERVER["REQUEST_METHOD"] == "POST") and ($_POST["cpass"] != $_POST["newPass"])  and ($_POST["cpass"] != $_POST["retypePass"])  and  ($_POST["newPass"] === $_POST["retypePass"]) ){
    echo "success!";
 }
 else {
    echo "failed. Try again";
 }

 ?>