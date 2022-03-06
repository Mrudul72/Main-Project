<?php
$uId = $_POST['disableBtn'];
include('../config/connect.php');
//update user_status in tbl_user table
if(isset($_POST['disableBtn'])){
    $sql = "UPDATE `tbl_user` SET `user_status`='0' WHERE `user_id`='$uId'";
    $result = mysqli_query($connect, $sql);
    header("Location: ../auth/logoutController.php");
}
?>