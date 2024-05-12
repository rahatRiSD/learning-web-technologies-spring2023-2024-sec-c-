<?php 
    require_once('../controller/sessionCheck');
    require_once('../model/model.php');

    $id = $_SESSION['currentUserId'];
    $user = getUser($id);
    $name = $user['name'];
    $type = $user['type'];

    $currentPassword = $_REQUEST['currentPassword'];
    $newPassword = $_REQUEST['newPassword'];
    $retypePassword = $_REQUEST['retypePassword'];

    if($currentPassword == $user['password'] && $newPassword == $retypePassword){
        $updatedUser = ['id'=> $id, 'password'=> $newPassword, 'name'=>$name, 'type' => $type];
        updateUser($updatedUser);
    }
?>