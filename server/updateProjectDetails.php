<?php
include('../config/connect.php');
extract($_POST);
session_start();
$projectId = $_SESSION['projectID'];
//update tbl_project table
$sql = "UPDATE `tbl_project` SET `project_name`= '$projectTitle', `project_description`= '$projectDescription',  `project_start_date`= '$projectStartDate', `project_end_date`= '$projectEndDate' WHERE `project_id`= '$projectId'";
$result = mysqli_query($connect, $sql);
if($result){
    header("Location: ../manageProject.php");
}else{
    echo "error";
}


?>