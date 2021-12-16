<?php
include('../config/connect.php');
extract($_POST);
session_start();
$teamId = $_SESSION['teamID'];
//update team_title in team table
$sql = "UPDATE `tbl_teams` SET `team_title`= '$teamTitle' WHERE `team_id`= '$teamId'";
$result = mysqli_query($connect, $sql);
if($result){
    header("Location: ../manageteam.php");
}else{
    echo "error";
}


?>