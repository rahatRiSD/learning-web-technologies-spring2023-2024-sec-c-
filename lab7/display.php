[8:53 PM] MAHMUDUL HAQUE SHAKIR
<?php

$conn = mysqli_connect('localhost', 'root', '', 'product_db');

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

}

?>
 
<html>

    <body>

        <fieldset style="width: 300px; padding: 20px; margin: 0 auto;">

            <legend>Display</legend>

            <table border="1" cellspacing="0" cellpadding="10" align="center">

                <tr>

                    <th>Name</th>

                    <th>Profit</th>

                    <th></br></th>

                </tr>
 
                <?php

                $sql = "SELECT * FROM products"; 

                $result = $conn->query($sql);
 
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {

                        $profit = $row['Selling_Price'] - $row['Buying_Price'];
 
                        echo "<tr>";

                        echo "<td>{$row['name']}</td>";

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