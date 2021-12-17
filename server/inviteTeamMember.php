<?php
include('../config/connect.php');
extract($_POST);
session_start();
$manager_id = $_SESSION['userId'];
$tId = $_SESSION['teamID'];

if(isset($inviteBtn))
{
    $to_email = $emailID;
    $referral = md5('$tId');
    $subject = "Referel ID";
    $body = "Your referal id : ".$referral;
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
        

