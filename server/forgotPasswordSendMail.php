<?php
include('../config/connect.php');
extract($_POST);
session_start();


if(isset($getOtp))
{
    $to_email = $email;
    $_SESSION['ResetEmail'] = $email;
    $OTP = strtoupper(random_strings(12));
    $_SESSION['OTP'] = $OTP;
    $subject = "OTP for Forgot Password";
    $body = "Your OTP : ".$OTP;
    $headers = "From: easeitinfo@gmail.com";

    //check if email already exisit in tbl_user
    $sql = "SELECT * FROM tbl_user WHERE email = '$to_email'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);
    if($count>0){
        if (mail($to_email, $subject, $body, $headers)) {
            $_SESSION['emailSendStatus']  = "Email successfully sent to $to_email";
            header("Location: ../forgotPasswordResetPass.php");
            die();
        } else {
            $_SESSION['emailSendStatus'] = "Email sending failed...";
            header("Location: ../forgotPassword.php");
            die();
        }
    }
    else{
        $_SESSION['emailSendStatus'] = "This email not exist in our database";
        header("Location: ../forgotPassword.php");
            die();
    }
    
}


function random_strings($length_of_string)
{
 
    // String of all alphanumeric character
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
 
    // Shuffle the $str_result and returns substring
    // of specified length
    return substr(str_shuffle($str_result),
                       0, $length_of_string);
}

?>
        

