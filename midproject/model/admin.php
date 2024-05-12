
<?php 
    require_once('db.php');

    function loginAdmin($user){
        $con = getConnection();
        $sql = "SELECT * FROM `admin` WHERE email='{$user['email']}' and pass='{$user['password']}'";
        $result = mysqli_query($con, $sql);
        $user = mysqli_fetch_assoc($result);
        
        if($user != null){
            return true;
        }else{
            return false;
        }
    }
?>
