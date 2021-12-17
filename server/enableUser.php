<?php
$uId = $_GET['uid'];
include('../config/connect.php');
//update user_status in tbl_user table
$sql = "UPDATE `tbl_user` SET `user_status`='1' WHERE `user_id`='$uId'";
$result = mysqli_query($connect, $sql);


header("Location: ../manageUsers.php");
?>