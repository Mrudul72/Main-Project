<?php
include('../config/connect.php');
extract($_POST);
session_start();

if(isset($revokeInvite))
{
    $to_email = $toEmailID;
    $subject = "Referel ID";
    $body = "Your invitation has been revoked. Your referral ID will be no longer be valid Please contact your manager for further details.";
    $headers = "From: easeitinfo@gmail.com";

    //check if email already exisit in tbl_invitation
    $checkInvitation = "SELECT * FROM `tbl_invitation` WHERE `email`='$to_email'";
    $checkInvitationResult = mysqli_query($connect, $checkInvitation);
    $checkInvitationCount = mysqli_num_rows($checkInvitationResult);
    if($checkInvitationCount==1){
        if (mail($to_email, $subject, $body, $headers)) {
            $_SESSION['emailSendStatus']  = "Invitation revoked and email successfully sent to $to_email";
            //delete from tbl_inviations table
            $sql = "DELETE FROM `tbl_invitation` WHERE `email`='$to_email'";
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
        $_SESSION['emailSendStatus'] = "Invitation not found";
        header("Location: ../manageteam.php");
            die();
    }
    
}