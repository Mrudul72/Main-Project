<?php
$teamId = $_POST['team_id'];
$taskStatus = $_POST['task_status'];
include('../config/connect.php');
//delete task
$sql = "DELETE FROM `tbl_teams` WHERE `team_id`= '$teamId'";
$result = mysqli_query($connect, $sql);
$sql2 = "DELETE FROM `tbl_team_members` WHERE `team_id`= '$teamId'";
$result2= mysqli_query($connect, $sql2);
//update user table
$sql3 = "UPDATE `tbl_users` SET `team_id`= '0' WHERE `team_id`= '$teamId'";
$result3 = mysqli_query($connect, $sql3);
//delete from task table
$sql4 = "DELETE FROM `tbl_tasks` WHERE `team_id`= '$teamId'";
//update user table
$sql5 = "UPDATE `tbl_user` SET `team_id`= 0 WHERE `team_id`= '$teamId'";
$result5 = mysqli_query($connect, $sql5);
//delete from team_allocation table
$sql6 = "DELETE FROM `tbl_team_allocation` WHERE `team_id`= '$teamId'";
$result6 = mysqli_query($connect, $sql6);
?>