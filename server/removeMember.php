<?php
$uId = $_GET['uid'];
include('../config/connect.php');
//delete from tbl_team_allocation table
$sql = "DELETE FROM `tbl_team_members` WHERE `user_id`= '$uId'";
$result = mysqli_query($connect, $sql);
//update user table
$sql2 = "UPDATE `tbl_user` SET `team_id`= 0 WHERE `user_id`= '$uId'";
$result2 = mysqli_query($connect, $sql2);
//delete from task table
$sql3 = "DELETE FROM `tbl_tasks` WHERE `task_added_by`= '$uId'";
$result3 = mysqli_query($connect, $sql3);

header("Location: ../manageteam.php");
?>