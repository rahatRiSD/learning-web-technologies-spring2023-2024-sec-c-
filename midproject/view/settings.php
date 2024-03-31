<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tourism Management System - Settings</title>
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">
<fieldset style="text-align: center; width: 30%; padding: 20px;">
        <legend><h1>Tourism Management System - Settings</h1></legend>
        <table width="100%" border="0">
    <tr bgcolor="#333">
        <td align="center"><a href="dashboard.php" style="color: white; text-decoration: none;">Home</a></td>
        <td align="center"><a href="community.php" style="color: white; text-decoration: none;">Community</a></td>
        <td align="center"><a href="newsletter.php" style="color: white; text-decoration: none;">Newsletter</a></td>
        <td align="center"><a href="wallet.php" style="color: white; text-decoration: none;">Wallet</a></td>
       
        <td align="center"><a href="logout.php" style="color: white; text-decoration: none;">Logout</a></td>
        <td align="center"><a href="signup.html" style="color: white; text-decoration: none;">Signup</a></td>
        <td align="center"><a href="feedback.php" style="color: white; text-decoration: none;">Feedback</a></td>
    </tr>
</table>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="mode">Choose Mode:</label>
            <select name="mode" id="mode">
                <option value="dark" <?php if(isset($_COOKIE['mode']) && $_COOKIE['mode'] === 'dark') echo 'selected'; ?>>Dark Mode</option>
                <option value="white" <?php if(isset($_COOKIE['mode']) && $_COOKIE['mode'] === 'white') echo 'selected'; ?>>White Mode</option>
            </select>
            <button type="submit">Save</button>
        </form>
        <p>Settings saved!</p>
        <p>Content of your tourism management system goes here...</p>

        <?php
        
        if(isset($_POST['mode'])) {
            
            $mode = $_POST['mode'];
            
            
            setcookie('mode', $mode, time() + (86400 * 30), '/'); 
            
            
            header("Location: {$_SERVER['PHP_SELF']}");
            exit;
        }
        ?>
    </fieldset>
</body>
</html>



<fieldset>
    <legend><h2>Contract: Tourism Management System - Settings Feature</h2></legend>

    <p>This contract ("Contract") is made and entered into on [Contract Date] between [Client Name], hereinafter referred to as "Client", and [Developer Name], hereinafter referred to as "Developer".</p>

    <h3>Project Description:</h3>
    <p>The Developer agrees to develop a settings feature for the Tourism Management System that allows users to customize their display theme.</p>

    <h3>Deliverables:</h3>
    <ol>
        <li>Settings page HTML file with PHP functionality for mode selection and cookie handling.</li>
        <li>Testing documentation to ensure functionality across different browsers and devices.</li>
    </ol>

    <h3>Timeline:</h3>
    <p>Start Date: [12-04-2023]</p>
    <p>End Date: [16-08-2025]</p>

    <h3>Payment Terms:</h3>
    <p>[Payment terms for tourism services in Bangladesh typically include advance booking deposits and balance payments upon arrival, ensuring smooth transactions for travelers and service providers alike]</p>

    <h3>Contact Information:</h3>
    <p>Client Phone Number: [01764579411]</p>
    <p>Client Gmail: [rahatrihan083@gmail.com]</p>
</fieldset>
