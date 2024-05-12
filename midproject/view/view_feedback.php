<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Feedback - Travel Management System</title>
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
<body>
    <h2>Feedback Entries</h2>
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
        <td align="center"><a href="view_transaction.php" style="color: white; text-decoration: none;">Transaction</a></td>
    </tr>
</table>

    <?php
    
    require_once('../model/database.php');
    
    $conn = dbConnect();

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "SELECT * FROM feedback";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Rating</th><th>Comments</th><th>Submitted At</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["rating"] . "</td>";
            echo "<td>" . $row["comments"] . "</td>";
            echo "<td>" . $row["created_at"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No feedback entries available.";
    }

    
    $conn->close();
    ?>
</body>
</html>
