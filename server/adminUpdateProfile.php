<?php
include('../config/connect.php');
session_start();
$uid = $_SESSION['userId'];
extract($_POST);
if (isset($updateProfileBtn)) {
    if (!empty($_FILES['uploadPic']) && $_FILES['uploadPic']['error'] != UPLOAD_ERR_NO_FILE) {
        $extension = pathinfo($_FILES["uploadPic"]["name"], PATHINFO_EXTENSION);

        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif') {
            $fileToUpload = $_FILES["uploadPic"]["name"];
            move_uploaded_file($_FILES["uploadPic"]["tmp_name"], "../assets/uploads/" . $_FILES["uploadPic"]["name"]);
            $file = '../assets/uploads/' . $fileToUpload;
            $sql2 = "UPDATE `tbl_user` SET `profile_pic`='$fileToUpload' WHERE `user_id`='$uid'";
            $result2 = mysqli_query($connect, $sql2);
            header('location:../adminManageProfile.php');
            $_SESSION['profileUpdateMsg'] = 'Profile Updated Successfully';
            $_SESSION['profileUpdateMsgHeading'] = 'Success';
        } else {
            $_SESSION['profileUpdateMsg'] = 'Please upload a valid image file';
            $_SESSION['profileUpdateMsgHeading'] = 'Error!!';
        }
    }
    if (empty($_FILES['uploadPic']['name'])) {
        $query = "UPDATE `tbl_user` SET `username`='$uname',`mob`='$mobile',`email`='$email' WHERE `user_id`='$uid'";
        $result = mysqli_query($connect, $query);
        header('location:../adminManageProfile.php');
    }
}

header("Location: ../adminManageProfile.php");
