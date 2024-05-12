
<?php 
    require_once('database.php');

    function insertCustomer($user){
        $con = getConnection();
        $sql = "INSERT INTO `user`(`email`, `name1`, `name2`, `cnum`, `dob`, `pass`, `cpass`) VALUES ('{$user['email']}','{$user['firstName']}','{$user['lastName']}','{$user['contactNumber']}','{$user['dob']}','{$user['password']}','{$user['cpassword']}');";
        $status = mysqli_query($con, $sql);
        return $status;
    }
    function updateCustomer($user){
        $con = getConnection();
        $sql = "UPDATE `user` SET `name1`='{$user['upfirstName']}',`name2`='{$user['uplastName']}',`cnum`='{$user['upcontactNumber']}',`dob`='{$user['updob']}' WHERE `email`= '{$user['upemail']}' ";
        $status = mysqli_query($con, $sql);
        return $status;
    }
    function searchCustomer($email){
        $con = getConnection();
        $sql = "select * from user where email = '{$email}'";
        $status = mysqli_query($con, $sql);
        return $status;
        
    }
    function cusData(){
        $con = getConnection();
        $sql = "SELECT * FROM `user`";
        $status = mysqli_query($con, $sql);
        return $status;
    }

    function loginCustomer($user){
        $con = getConnection();
        $sql = "SELECT * FROM `user` WHERE email='{$user['email']}' and pass='{$user['password']}'";
        $result = mysqli_query($con, $sql);
        $user = mysqli_fetch_assoc($result);
        
        if($user != null){
            return true;
        }else{
            return false;
        }
    }
    function fpassCustomer($usercheck){
        $con = getConnection();
        $sql = "SELECT * FROM `user` WHERE email='{$usercheck['email']}' and cnum='{$usercheck['cnum']}'";
        $status = mysqli_query($con, $sql);
        $resultCheck = mysqli_num_rows($status);
        if($resultCheck>0){
            return true;
        }else{
            return false;
        }
        
      
    }

    function passchangeCustomer($passUpdate){
        $con = getConnection();
        $sql = "UPDATE `user` SET `pass`='{$passUpdate['uppassword']}' WHERE email = '{$passUpdate['email']}'";
        $status = mysqli_query($con, $sql);
        return $status;
        
        
    }
    function deleteCustomer($email){
        $con = getConnection();
        $sql = "DELETE FROM `user` WHERE email = '{$email}'";
        $status = mysqli_query($con, $sql);
        return $status;
        
    }

    
?>
