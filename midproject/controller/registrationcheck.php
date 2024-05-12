
<?php
	session_start();
    require_once("../Model/customer.php");

	$email = $_POST['email'];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$contactNumber = $_POST['contactNumber'];
	$dob = $_POST['dob'];
	$password = $_POST['password'];
    $cpassword = $_POST['confirmPassword'];

    //for validation pupose
    
    $len_password = strlen($password);
    $len_contactNumber = strlen($contactNumber);

    // Validate password strength
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    // blank field check
    if($email == "" || $firstName == "" || $lastName == "" || $contactNumber == ""|| $dob == "" || $password==""){
        echo "<script>alert('Please fill all required fields (* marked)');</script>";
    }
    // confirm password check
    elseif ($password !== $cpassword) {
        echo "<script>alert('Confirm Password does not match!');</script>";
    }
    // email & password match check
    elseif ($password == $email) {
        echo "<script>alert('Username and Password cannot be same!');</script>";
    }
    // phone validation check
    elseif ($len_contactNumber != 11) {
        echo "<script>alert('Contact Number must contain 11 digits!');</script>";
    }
    // password validation check
    elseif (!$number || !$specialChars || $len_password < 4) {
        echo "<script>alert('Password must contain at least 4 characters with number and special character!');</script>";
    }else {
        $user = ['email'=> $email, 'firstName'=> $firstName, "lastName"=> $lastName, "contactNumber"=> $contactNumber, "dob"=> $dob, "password"=> $password, "$cpassword"=> $password];
        $_SESSION['user'] = $user;
        $validation = insertCustomer($user);
        if($validation){
          
            header('location: ../View/login.html');
        }
        else{
            header('location: ../View/register.php');
        }
    }

?>
