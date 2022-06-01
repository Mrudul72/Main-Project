<?php
session_start();
include('../config/connect.php');
//validate OTP
$otp = $_SESSION['OTP'];
if(isset($_POST['otp'])){
    $otp = $_POST['otp'];
    if($otp == $_SESSION['OTP']){
        
        echo "ok";
    }
    else{
        
        echo "OTP not matched";
    }
}

?>