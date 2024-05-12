<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Transactions - Tourism Management System</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">
    <h2>View Transactions</h2>
    <table width="100%" border="0">
    <tr>
    <td colspan="3" align="center" height="8%">
            <a href="home_travel.html">Home</a>
            <a href="community.php">Community</a>
            <a href="feedback.php">Feedback</a>
            <a href="fileupload.php">File Upload</a>
            <a href="logout.php">Log Out</a>
     

            <a href="wallet.php">Wallet</a>
            <a href="settings.php">Settings</a>
        </td>
    </tr>
</table>

    <?php
    
    require_once('../model/database.php');
   
    $conn = dbConnect();

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "SELECT * FROM transactions";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        echo "<table>";
        echo "<tr><th>ID</th><th>Full Name</th><th>Email</th><th>Amount (BDT)</th><th>Points Earned</th><th>Transaction Date</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["fullname"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["amount"] . "</td>";
            echo "<td>" . $row["points"] . "</td>";
            echo "<td>" . $row["transaction_date"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No transaction entries available.";
    }

    
    $conn->close();
    ?>
</body>
</html>
