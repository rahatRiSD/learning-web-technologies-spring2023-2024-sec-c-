<?php
require_once('../Model/model.php');
session_start();

$Name=$_SESSION['Name'];
$UserType=$_SESSION['UserType'] ;
$Email=$_SESSION['Email'];
$show=Data($Email);

?>

<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
                   
                      <?php 
                      
                      if($show)
                      {
                       
                      
                          echo "<table>";
                          
                          echo "<tr>";
                          echo "<td width='100%'>";
                          echo "<center><h3><u>Information</u></h3></center><hr>";
                          echo "<h3>Name: " . $show["Name"] . "</h3><hr>";
                          echo "</td>";
                          echo "</tr>";
                          echo "<td colspan='2'width='100%'>";
                          echo "<h3>E-mail: " . $show["EmailID"] . "</h3><hr>"
                              . "<h3>iD: " . $show["Id"] . "</h3><hr>"
                              . "<h3>UserType: " . $show["UserType"] . "</h3>";
                          echo "</td>";
                          
                          echo "</tr>";
                      
                          echo "</table>";
                      } else {
                          echo "User not found.";
                      }
                      
                      
                      
                      
                      ?>;
        </table>

        <a href='../View/Admin_dashboard.php'><h3>Go Home</h3></a><br><br>
               
      
</body>
</html>