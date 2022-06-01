<?php
include('../config/connect.php');
session_start();
$email = $_SESSION['ResetEmail'];
extract($_POST);
if(isset($_POST['resetPassword'])){
    if(!empty($_POST['password']) && !empty($_POST['cpassword'])){
        $newPass = md5($password);
        $confirmPass = md5($cpassword);
       
            if($newPass == $confirmPass){
                $updatePass = "UPDATE `tbl_user` SET `password`='$newPass' WHERE `email`='$email'";
                $updatePassResult = mysqli_query($connect, $updatePass);
                $_SESSION['loginMessage'] = 'Password Updated Successfully';
                $_SESSION['profileUpdateMsgHeading'] = 'Success';
                
                header('location:../index.php');
                die();
            }else{
                $_SESSION['emailSendStatus'] = "New Password and Confirm Password does not match";
                $_SESSION['profileUpdateMsgHeading'] = 'Error!!';
                header('location:../forgotPasswordResetPass.php');
                die();
            }
        
    
    }else{
        $_SESSION['emailSendStatus'] = "Please fill all the fields";
        $_SESSION['profileUpdateMsgHeading'] = 'Error!!';
        header('location:../forgotPasswordResetPass.php');
        die();
    }
}
    
// header("Location: ../manageProfile.php");

?>