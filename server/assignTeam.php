<?php
include('../config/connect.php');
$count;
extract($_POST);
$project_created_date=date("d-m-Y");
session_start();
$project_manager= $_SESSION['userId'];

foreach($proTeamArray as $teamID){
    $sql2 = "INSERT INTO `tbl_team_allocation`(`team_id`, `project_id`, `project_manager`) VALUES ('$teamID','$pro_id','$project_manager')";
    $result2 = mysqli_query($connect, $sql2); 
}

?>