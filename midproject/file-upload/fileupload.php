<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>
<body>
    <h1>Upload Image</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <label for="destination">Select Destination:</label>
        <select name="destination" id="destination">
            <option value="paris">Paris</option>
            <option value="rome">Rome</option>
            <option value="tokyo">Tokyo</option>
            <!-- Add more destination options as needed -->
        </select>
        <br>
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
            $destination = $_POST['destination']; // Get selected destination
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
                $uploadDir = 'uploads/';
                // Create directory if it does not exist
                if(!file_exists($uploadDir)){
                    mkdir($uploadDir, 0777, true);
                }
                // Final file destination
                $destPath = $uploadDir . $fileName;
                
                // Move uploaded file to destination
                if(move_uploaded_file($fileTmpPath, $destPath)){
                    echo "File uploaded successfully.";
        
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
    ?>
</body>
</html>
