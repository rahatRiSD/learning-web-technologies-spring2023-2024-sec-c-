<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array();

   
    $firstName = $_POST['firstName'];
    if(empty($firstName)) {
        $errors[] = "First name is required.";
    } else {
        if (!ctype_alpha(str_replace(' ', '', $firstName))) {
            $errors[] = "First name can only contain letters.";
        }
    }

    $lastName = $_POST['lastName'];
    if(empty($lastName)) {
        $errors[] = "Last name is required.";
    } else {
        if (!ctype_alpha(str_replace(' ', '', $lastName))) {
            $errors[] = "Last name can only contain letters.";
        }
    }

    $dob = $_POST['dob'];
    if(empty($dob)) {
        $errors[] = "Date of Birth is required.";
    } 

   
    if(!isset($_POST['gender'])) {
        $errors[] = "Gender is required.";
    }

    
    $phone = $_POST['phone'];
    if(empty($phone)) {
        $errors[] = "Phone number is required.";
    } else {
        if (!ctype_digit($phone)) {
            $errors[] = "Phone number can only contain digits.";
        }
    }

    
    $email = $_POST['email'];
    if(empty($email)) {
        $errors[] = "Email is required.";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }
    }

  
    if(empty($_POST['password'])) {
        $errors[] = "Password is required.";
    } 

  
    if(empty($_POST['confirmPassword'])) {
        $errors[] = "Confirm Password is required.";
    } elseif ($_POST['password'] !== $_POST['confirmPassword']) {
        $errors[] = "Passwords do not match.";
    }

    if(!empty($errors)) {
        foreach($errors as $error) {
            echo $error . "<br>";
        }
    } else {
       
        $file = fopen("data.txt", "a");
        if ($file) {
            $data = "First Name: $firstName, Last Name: $lastName, DOB: $dob, Gender: {$_POST['gender']}, Phone: $phone, Email: $email\n";
            fwrite($file, $data);
            fclose($file);
            echo "Data has been successfully saved to data.txt.";
        } else {
            echo "Failed to open the file for writing.";
        }
    }
} else {
    echo "Invalid request.";
}
?>
