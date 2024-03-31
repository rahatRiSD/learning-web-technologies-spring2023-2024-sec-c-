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
    <tr bgcolor="#333">
        <td align="center"><a href="dashboard.php" style="color: white; text-decoration: none;">Home</a></td>
        <td align="center"><a href="community.php" style="color: white; text-decoration: none;">Community</a></td>
        <td align="center"><a href="newsletter.php" style="color: white; text-decoration: none;">Newsletter</a></td>
        <td align="center"><a href="wallet.php" style="color: white; text-decoration: none;">Wallet</a></td>
        <td align="center"><a href="settings.php" style="color: white; text-decoration: none;">Settings</a></td>
        <td align="center"><a href="logout.php" style="color: white; text-decoration: none;">Logout</a></td>
        <td align="center"><a href="signup.html" style="color: white; text-decoration: none;">Signup</a></td>
        <td align="center"><a href="feedback.php" style="color: white; text-decoration: none;">Feedback</a></td>
    </tr>
</table>

    <?php
    
    require_once('../model/database.php');
    // Database connection
    $conn = dbConnect();

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve transaction entries from the database
    $sql = "SELECT * FROM transactions";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row in a table
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

    // Close connection
    $conn->close();
    ?>
</body>
</html>
