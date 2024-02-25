<table border="1">
        
        <?php include_once ('dashboardHeader.php'); ?>
        <tr>
        <td>
        <?php include_once ('account.php'); ?>
        </td>
        <td >
            <form method="POST" action="">
                <fieldset>
                    <legend>Change Password</legend>
                    Current Password:<input type="password" value=""><br><br>
                    New Password &nbsp;&nbsp;&nbsp;:<input type="password" value=""><br><br>
                    Retype Password:<input type="password" value=""><br><br>
                    <hr>
                    <input type="submit" name="submit" value="submit">

                </fieldset>
                </form></td>
        </tr>
        
        <?php include_once ('dashboardFooter.php'); ?>
        
    </table>
