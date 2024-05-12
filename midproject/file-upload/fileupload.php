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
            <option value="dhaka">Dhaka</option>
            <option value="coxsbazar">CoxsBazar</option>
            <option value="syllet">Syllet</option>
           
        </select>
        <br>
        <label for="image">Choose Image:</label>
        <input type="file" name="image" id="image">
        <br>
        <button type="submit" name="submit">Upload</button>
    </form>

    <?php
    
    if(isset($_POST['submit'])){
        
        if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $destination = $_POST['destination']; 
            $fileTmpPath = $_FILES['image']['tmp_name']; 
            $fileName = $_FILES['image']['name']; 
            $fileType = $_FILES['image']['type']; 
            $fileNameCmps = explode(".", $fileName); 
            $fileExtension = strtolower(end($fileNameCmps));
            
          
            $allowedExtensions = array('jpg', 'jpeg', 'png');
            
           
            if(in_array($fileExtension, $allowedExtensions)){
                
                $uploadDir = 'uploads/';
                
                if(!file_exists($uploadDir)){
                    mkdir($uploadDir, 0777, true);
                }
                
                $destPath = $uploadDir . $fileName;
                
               
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
