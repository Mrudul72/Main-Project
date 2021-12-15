<?php
include('../config/connect.php');
extract($_POST);
session_start();
$manager_id = $_SESSION['userId'];
//insert into team table
$sql = "INSERT INTO `tbl_teams`(`team_title`, `manager_id`) VALUES ('$teamName','$manager_id')";
$result = mysqli_query($connect, $sql);
$teamId  = mysqli_insert_id($connect);

if (sizeof($teamMemberArr) > 0 && $teamMemberArr[0] != null) {
    foreach ($teamMemberArr as $memberID) {
        //insert into team_members table
        $sql2 = "INSERT INTO `tbl_team_members`(`team_id`, `user_id`) VALUES ('$teamId','$memberID')"; //not needed, but just in case
        $result2 = mysqli_query($connect, $sql2);

        $sql3 = "UPDATE `tbl_user` SET `team_id`='$teamId' WHERE `user_id`='$memberID'";
        $result3 = mysqli_query($connect, $sql3);
    }
}


