<?php
include('../config/connect.php');
$count;
extract($_POST);
$project_created_date=date("d-m-Y");
session_start();
$project_manager= $_SESSION['userId'];
//insert into database
$sql = "INSERT INTO tbl_project (project_name, project_description, project_start_date, project_end_date, project_status, project_priority, project_created_date) VALUES ('$proName', '$proDescription', '$proStartDate', '$proEndDate', '$proStatus', '$proPriority', '$project_created_date')";
$result = mysqli_query($connect, $sql); 
$projectId  = mysqli_insert_id($connect);
// if($result){
//     $_SESSION['Message'] = "Project created successfully";
//                             header("Location: ../project.php");
//                             die();
// }
if(!$result){
    echo "Error creating project";
}
foreach($proTeamArray as $teamID){
    $sql2 = "INSERT INTO `tbl_team_allocation`(`team_id`, `project_id`, `project_manager`) VALUES ('$teamID','$projectId','$project_manager')";
    $result2 = mysqli_query($connect, $sql2); 
}

?>