<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
    <style>
        h1 {
            color: blue;
        }

        #d1 {
            background-color: blue;
            width: 100px;
            height: 100px;
        }

        #d2 {
            background-color: green;
            width: 300px;
            height: 200px;
            /* margin: 10px 20px;
            padding: 20px; */
            position: relative;
            top: 0px;
            left: 100px;
            border: 3px solid black;
        }

        .insert-form {
            text-align: center;
            width: 30%;
            padding: 20px;
        }

        legend h2 {
            color: blue;
        }

        label {
            color: blue;
        }

        input[type="email"],
        input[type="number"] {
            padding: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: blue;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: darkblue;
        }
    </style>
</head>
<body>
<fieldset>
    <legend><h2>All Records</h2></legend>

    <?php
   
    session_start();
    
    require_once('../model/database.php');
    
    $conn = dbConnect();
   
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
   
    
    $sql = "SELECT * FROM community";
    $result = $conn->query($sql);
   
    if ($result->num_rows > 0) {
      
      while($row = $result->fetch_assoc()) {
        echo "<p>Name: " . $row["name"]. " - Opinion: " . $row["opinion"]. "</p>";
      }
    } else {
      echo "<p>No records found</p>";
    }
    $conn->close();
    ?>
  </fieldset>

  <fieldset class="insert-form">
    <legend><h2>Insert Data into Database</h2></legend>
    <?php include 'menu.php';?>
    <form action="" method="post">
      <label for="opinion">Your Opinion:</label><br>
      <textarea id="opinion" name="opinion" rows="5" cols="50" required></textarea><br><br>
      <button type="submit" name="submit">Submit</button>
    </form>
  
    <?php
    if(isset($_POST['submit'])){
     
      $conn = mysqli_connect('localhost', 'root', '', 'web_tech');
   
      
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      
      $name = $_SESSION['username'];
   
     
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
