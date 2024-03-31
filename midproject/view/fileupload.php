<?php
session_start(); // Start the session


require_once('../model/database.php');

$conn = dbConnect();


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    
    header("location: login.php");
    exit;
}


function createImagesTable($conn) {
    $sql = "CREATE TABLE IF NOT EXISTS images (
        id INT AUTO_INCREMENT PRIMARY KEY,
        filename VARCHAR(255) NOT NULL,
        upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    if ($conn->query($sql) === TRUE) {
        echo "Images table created successfully or already exists<br>";
    } else {
        echo "Error creating images table: " . $conn->error . "<br>";
    }
}


createImagesTable($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">
    <fieldset style="text-align: center; width: 30%; padding: 20px;">
        <legend>Image Upload Form</legend>
        <h1>Upload Image</h1>
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

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <label for="image">Choose Image:</label>
            <input type="file" name="image" id="image">
            <br>
            <button type="submit" name="submit">Upload</button>
        </form>

        <?php
        // Check if form is submitted
        if(isset($_POST['submit'])){
            // Check if file was uploaded without errors
            if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['image']['tmp_name']; // Temporary file path
                $fileName = $_FILES['image']['name']; // File name
                $fileType = $_FILES['image']['type']; // File type
                $fileNameCmps = explode(".", $fileName); // Split file name into name and extension
                $fileExtension = strtolower(end($fileNameCmps)); // Get file extension
                
                // Allowed file extensions
                $allowedExtensions = array('jpg', 'jpeg', 'png');
                
                // Check if the uploaded file's extension is allowed
                if(in_array($fileExtension, $allowedExtensions)){
                    // Destination directory for uploads
                    $uploadDir = 'uploads/'; // Change this to the correct directory
                    // Final file destination
                    $destPath = $uploadDir . $fileName;
                    
                    // Move uploaded file to destination
                    if(move_uploaded_file($fileTmpPath, $destPath)){
                        // Insert the filename into the images table
                        $sql = "INSERT INTO images (filename) VALUES ('$fileName')";
                        if ($conn->query($sql) === TRUE) {
                            echo "File uploaded successfully.";
                        } else {
                            echo "Error inserting filename into database: " . $conn->error;
                        }
                    } else {
                        echo "Failed to move file.";
                    }
                } else {
                    echo "Invalid file type. Allowed file types: jpg, jpeg, png.";
                }
            } else {
                echo "Error uploading file.";
            }
        }

        // Close database connection
        $conn->close();
        ?>
    </fieldset>
</body>
</html>
