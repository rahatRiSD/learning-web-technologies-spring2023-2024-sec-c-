<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
</head>
 
<body>
<fieldset >
    <legend><h2>All Records</h2></legend>

    <?php
    // Start session
    session_start();
    
    require_once('../model/database.php');
    // Database connection
    $conn = dbConnect();
   
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
   
    // Display all records
    $sql = "SELECT * FROM community";
    $result = $conn->query($sql);
   
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<p>Name: " . $row["name"]. " - Opinion: " . $row["opinion"]. "</p>";
      }
    } else {
      echo "<p>No records found</p>";
    }
    $conn->close();
    ?>
  </fieldset>

  <fieldset style="text-align: center; width: 30%; padding: 20px;">
    <legend><h2>Insert Data into Database</h2></legend>
    <?php include 'menu.php';?>
    <form action="" method="post">
      <label for="opinion">Your Opinion:</label><br>
      <textarea id="opinion" name="opinion" rows="5" cols="50" required></textarea><br><br>
      <button type="submit" name="submit">Submit</button>
    </form>
  
    <?php
    if(isset($_POST['submit'])){
      // Database connection
      $conn = mysqli_connect('localhost', 'root', '', 'web_tech');
   
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      // Get the name from the session
      $name = $_SESSION['username'];
   
      // Insert data into database
      $opinion = $_POST['opinion'];
   
      $sql = "INSERT INTO community (name, opinion) VALUES ('$name', '$opinion')";
   
      if ($conn->query($sql) === TRUE) {
        echo "<p>New record created successfully</p>";
      } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
      }
   
      $conn->close();
    }
    ?>
  </fieldset>
</body>
</html>
