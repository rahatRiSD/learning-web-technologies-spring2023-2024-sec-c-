
<?php
session_start();
    if(!isset($_SESSION['valid'])){
        header('location: login.html');
    }

?>
    <link rel="stylesheet" href="../asset/admin.css">

    <table border="0" width = "100%" height = "100%">
            <tr >
                <td height="5%" width="15%" align="center">
                    <img src="../Images/logo.png" height="100" width="100" alt="Green Dhaka Logo">
                </td>
                <td align="center" height="5%"width="70%">
                    <h1 style="color:SeaGreen;">  </h1> <br>
                    <h1 style="color:SeaGreen;"> Travel Management System</h1>
                    <h4 style="color:SeaGreen;"> An initiative of  travel Corporation </h4>
                    
                    
                </td>
                <td >
                <table border="0" align="center">
                    <tr>
                        <td> 
                        </td>
                        <td align="right">  <br> 
                             <a href="../Controller/logout.php"> Logout 
                        </td>
                    </tr>
                
                </table>
                   
                </td>
            </tr>
            <tr>
                <td colspan="3" align="center" height ="8%">
                    <H1 style="color:SeaGreen;"> <b>Admin Panel</b> </H1>

                </td>
                
            </tr>
            <tr >
                <td colspan="3" align = "center" style="background-color:SeaGreen;">
                    
                    <table border="1">
                        <tr>
                        
                            <td> <a href="adminGardenregistration.php">Garden Registration Approval</a>
                            </td> 
                            <td> <a href="adminSolarRegistration.php">Solar Panel Approval</a>
                            </td>
                            <td> <a href="AdminNewsFeed.php">News feed </a>
                            </td>
                        </tr>
                         <tr>
                            <td> <a href="adminSubsidiarycalculator.php">Subsidiary Calculator</a>
                            </td>
                            <td> <a href="adminEshop.php">E-shop</a>
                            </td>
                            <td> <a href="adminDonation.php">Donation</a>
                            </td>
                        </tr>
                         <tr>
                            <td> <a href="adminHiringagardener.php">Gardener Approval</a>
                            </td>
                            <td> <a href="adminExpert.php">Expert Appointment Approval</a>
                            </td>
                            <td>  <a href="AdminHomeVisit.php">Home Visit Approval</a>
                            </td>
                        </tr>
                        <tr>
                            <td>  <a href="AdminSupport.php">Support Message</a>
                            </td>
                            <td> <a href="AdminCustomerManagement.php">Customer Management</a>
                            </td>
                            <td>  <a href="adminFeedback.php">Feedback Check</a>
                            </td> 
                        </tr>
                    </table>
                   
                   
                
                </td>
            </tr>
           
            <tr height ="5%" align="center">
                <td>
                </td>
                <td>
                
                </td>
                <td>
                </td>
            </tr>
            

    </table>
