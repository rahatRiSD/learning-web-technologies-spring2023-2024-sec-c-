<?php 
    $host = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "web_tech";

    function dbConnect(){
        global $host;
        global $dbuser;
        global $dbname;
        global $dbpass;

        return $con = mysqli_connect($host, $dbuser, $dbpass, $dbname);
    }

    

?>