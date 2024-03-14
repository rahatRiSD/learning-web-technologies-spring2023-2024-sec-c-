<?php
$conn = mysqli_connect('localhost', 'root', '', 'product_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
 
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM products WHERE name LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM products";
}
 
$result = $conn->query($sql);
?>
 
<html>
<body>
<fieldset style="width: 800px; padding: 20px; margin: 0 auto;">
<legend>Product List</legend>
 
            
<form method="post">
<label for="search">Search by Name:</label>
<input type="text" name="search" id="search">
<input type="submit" value="Search">
</form>
 
            <table border="1" cellspacing="0" cellpadding="10" align="center">
<tr>
<th>ID</th>
<th>Name</th>
<th>Buying Price</th>
<th>Selling Price</th>
<th>Profit</th>
<th>Action</th>
</tr>
 
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Calculate profit (Selling Price - Buying Price)
                        $profit = $row['Selling_Price'] - $row['Buying_Price'];
 
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>{$row['Buying_Price']}</td>";
                        echo "<td>{$row['Selling_Price']}</td>";
                        echo "<td>{$profit}</td>";
                        echo '<td><a href="edit.php?id=' . $row['id'] . '">Edit</a> | <a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No records found</td></tr>";
                }
                ?>
</table>
</fieldset>
</body>
</html>
 
<?php
// Close the database connection
$conn->close();
?>