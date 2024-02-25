<table border="1">
        
        <?php include_once ('dashboardHeader.php'); ?>
        <tr>
        <td>
        <?php include_once ('account.php'); ?>
        </td>
        <td >
            <form method="POST" action="">
                <fieldset>
                    <legend>Profile</legend>
                    
                    <p>Name:Bob</p>
                    <img src="profile.png" alt="" align='right'>
                    <hr>

                    <p>Email:bob@aiub.edu</p>
                    <hr>
                    <p>Gender:Male</p>
                    <hr>
                    
                    <p>Date of Birth:19/09/1998 <a href="change.php" align='center'>Change</a></p>
                    
                    <hr>
                    <a href="editProfile.php">Edit profile</a>

                </fieldset>
                </form></td>
        </tr>
        
        <?php include_once ('dashboardFooter.php'); ?>
        
    </table>