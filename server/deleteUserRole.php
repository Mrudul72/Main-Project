<?php
$uId = $_GET['uid'];
include('../config/connect.php');
//delete role from tbl_user_role
$sql = "DELETE FROM `tbl_user_role` WHERE `role_id`='$uId'";
$result = mysqli_query($connect, $sql);

header("Location: ../manageUsers.php");
?>