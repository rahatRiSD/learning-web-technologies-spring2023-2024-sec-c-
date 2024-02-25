<table border="1">
        
        <?php include_once ('dashboardHeader.php'); ?>
        <tr>
        <td>
        <?php include_once ('account.php'); ?>
        </td>
        <td >
            <form method="POST" action="">
                <fieldset>
                    <legend>Edit Profile</legend>
                    Name:<input type="text" value="Bob">
                    <hr>
                    Email:<input type="email" value="bob@aiub.edu">
                    <hr>
                    Gender:<input type="text" value="Male">
                    <hr>
                    Date of Birth:<input type="text" value="23/12/1999">
                    <p align="center">(dd/mm/yyyy)</p>
                    <hr>
                    <input type="submit" name="submit" value="submit">

                </fieldset>
                </form></td>
        </tr>
        
        <?php include_once ('dashboardFooter.php'); ?>
        
    </table>
