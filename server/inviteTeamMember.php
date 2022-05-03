<?php
include('../config/connect.php');
extract($_POST);
session_start();
$manager_id = $_SESSION['userId'];
$tId = $_SESSION['teamID'];

if(isset($inviteBtn))
{
    $to_email = $emailID;
    $referral = strtoupper(random_strings(12));
    $subject = "Referel ID";
    $body = "Sign up using the provided referral id. Your referal id : ".$referral;
    $headers = "From: easeitinfo@gmail.com";

    //check if email already exisit in tbl_invitation
    $checkInvitation = "SELECT * FROM `tbl_invitation` WHERE `email`='$to_email'";
    $checkInvitationResult = mysqli_query($connect, $checkInvitation);
    $checkInvitationCount = mysqli_num_rows($checkInvitationResult);
    if($checkInvitationCount==0){
        if (mail($to_email, $subject, $body, $headers)) {
            $_SESSION['emailSendStatus']  = "Email successfully sent to $to_email";
            //insert into tbl_inviations table
            $sql = "INSERT INTO `tbl_invitation`(`email`, `team_id`, `referral_id`, `invite_status`) VALUES ('$emailID','$tId','$referral','0')";
            $result = mysqli_query($connect, $sql);
            header("Location: ../manageteam.php");
            die();
        } else {
            $_SESSION['emailSendStatus'] = "Email sending failed...";
            header("Location: ../manageteam.php");
            die();
        }
    }
    else{
        $_SESSION['emailSendStatus'] = "Invitation already sent to $to_email";
        header("Location: ../manageteam.php");
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
        

