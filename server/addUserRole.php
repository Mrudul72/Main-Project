<?php
include('../config/connect.php');
extract($_POST);
if(isset($addRoleBtn)){
    if(!empty($roleName) && !empty($rolePermission)){
        $sql = "INSERT INTO `tbl_user_role`(`role_name`, `role_permission`) VALUES ('$roleName','$rolePermission')";
        $result = mysqli_query($connect, $sql);
        if($result){
            $_SESSION['addRoleStatus'] = "User Role Added Successfully";
            header("Location: ../manageUserRole.php");
            die();
        } else {
            $_SESSION['addRoleStatus'] = "User Role Add Failed";
            header("Location: ../manageUserRole.php");
            die();
        }
    } else {
        $_SESSION['addRoleStatus'] = "Please fill all fields";
        header("Location: ../manageUserRole.php");
        die();
    }
}
?>