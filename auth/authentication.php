<?php
session_start();
include('../config/connect.php');
if (isset($_SESSION["pmsSession"]) == session_id()) {
    header("Location: ../dashboard.php");
    die();
} else {

    // Register check
    if (isset($_POST['registerSubmit'])) {
        // Empty check
        if (!empty($_POST['email']) and !empty($_POST['mob'])) {
            // Collecting values
            extract($_POST);
            //check password and confirm password

            //Check if mobile already exisit
            $checkMobile = "SELECT * FROM tbl_user WHERE mob='$mob' and user_status!=0";
            $checkMobileResult = mysqli_query($connect, $checkMobile);
            $checkMobileCount = mysqli_num_rows($checkMobileResult);
            //No user exists
            if ($checkMobileCount == 0) {
                //CHECK IF EMAIL ALREADY EXISTS
                $checkEmail = "SELECT * FROM `tbl_user` WHERE `email`='$email' and user_status!=0";
                $checkEmailResult = mysqli_query($connect, $checkEmail);
                $checkEmailCount = mysqli_num_rows($checkEmailResult);
                //referrel code check in tbl_invitation table
                $checkReferralCode = "SELECT * FROM `tbl_invitation` WHERE `email`='$email' AND `referral_id` = '$referral'  AND `invite_status`='0'";
                $checkReferralCodeResult = mysqli_query($connect, $checkReferralCode);
                $row = mysqli_fetch_assoc($checkReferralCodeResult);
                $team_id = $row['team_id'];
                $referral_id = $row['referral_id'];
                $invite_status = $row['invite_status'];
                $checkReferralCodeCount = mysqli_num_rows($checkReferralCodeResult);

                //No user exists
                if ($checkEmailCount == 0) {
                    if ($checkReferralCodeCount > 0 && $referral_id == $referral) {
                        $password = md5($password);
                        $date = date("Y-m-d");
                        //Insert into database
                        $insertDb = "INSERT INTO `tbl_user`(`username`, `mob`, `email`,`dob`, `password`, `user_created_at`, `type_id`,`team_id`) VALUES ('$uname','$mob','$email','$dob','$password','$date','$role','$team_id')";
                        $insertDbResult = mysqli_query($connect, $insertDb);
                        if ($insertDbResult) {
                            $userInsertedId = mysqli_insert_id($connect);
                            //insert to tbl_team_members
                            $sql = "INSERT INTO `tbl_team_members`(`team_id`, `user_id`) VALUES ('$team_id','$userInsertedId')";
                            $res = mysqli_query($connect, $sql);
                            //update invite status
                            $sql2 = "UPDATE `tbl_invitation` SET `invite_status`='1' WHERE `email`='$email'";
                            $res2 = mysqli_query($connect, $sql2);

                            $_SESSION['loginMessage'] = "Register Success";
                            header("Location: ../index.php");
                            die();
                        } else {
                            $_SESSION['loginMessage'] = "User Register Failed";
                            header("Location: signup.php");
                            die();
                        }
                    } elseif ($checkReferralCodeCount > 0 && $referral_id != $referral) {
                        $_SESSION['loginMessage'] = "Referral Code is not valid";
                        header("Location: signup.php");
                        die();
                    } else {
                        // $name = strtolower($firstname) . " " . strtolower($lastname);
                        $password = md5($password);
                        $date = date("Y-m-d");
                        //Insert into database
                        $insertDb = "INSERT INTO `tbl_user`(`username`, `mob`, `email`,`dob`, `password`, `user_created_at`, `type_id`) VALUES ('$uname','$mob','$email','$dob','$password','$date','$role')";
                        $insertDbResult = mysqli_query($connect, $insertDb);
                        if ($insertDbResult) {
                            $_SESSION['loginMessage'] = "Register Success";
                            header("Location: ../index.php");
                            die();
                        } else {
                            $_SESSION['loginMessage'] = "User Register Failed";
                            header("Location: signup.php");
                            die();
                        }
                    }
                } else {
                    $_SESSION['loginMessage'] = "User Email Already exisit";
                    header("Location: signup.php");
                    die();
                }
            } else {
                $_SESSION['loginMessage'] = "User Mobile Already exisit";
                header("Location: signup.php");
                die();
            }
        } else {
            $_SESSION['loginMessage'] = "Please fill all fields";
            header("Location: signup.php");
            die();
        }
    }
    // Login check
    if (isset($_POST['LoginSubmit'])) {
        // Empty check
        if (!empty($_POST['email']) and !empty($_POST['password'])) {
            // Collecting values
            extract($_POST);
            $password = md5($password);
            //Check if mobile already exisit
            $checkLogin = "SELECT * FROM `tbl_user` WHERE `email`='$email' and `password`='$password'";
            $checkLoginResult = mysqli_query($connect, $checkLogin);
            $checkLoginCount = mysqli_num_rows($checkLoginResult);
            //No user exists
            if ($checkLoginCount == 1) {
                $userData = mysqli_fetch_assoc($checkLoginResult);
                if ($userData['user_status'] != 1) {
                    $_SESSION['loginMessage'] = "Your account has been disabled. Please contact admin";
                    header("Location: ../index.php");
                    die();
                } else {
                    $_SESSION['userName'] = $userData['username'];
                    $_SESSION['proPic'] = $userData['profile_pic'];
                    $_SESSION['userId'] = $userData['user_id'];
                    $_SESSION['currentUserTeamId'] = $userData['team_id'];
                    $_SESSION['currentUserTypeId'] = $userData['type_id'];
                    if ($userData['type_id'] == 1) {
                        $_SESSION['pmsSessionAdmin'] = session_id();
                        header("Location: ../adminDashboard.php");
                        die();
                    } else {
                        $_SESSION['pmsSession'] = session_id();
                        header("Location: ../dashboard.php");
                        die();
                    }
                }
            } else {
                $_SESSION['loginMessage'] = "User Login Failed";
                header("Location: ../index.php");
                die();
            }
        } else {
            $_SESSION['loginMessage'] = "Please fill all fields";
            header("Location: ../index.php");
            die();
        }
    }
}
