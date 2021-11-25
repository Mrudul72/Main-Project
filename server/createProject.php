<?php
include('../config/connect.php');
$count;
extract($_POST);
$project_created_date=date("d-m-Y");
$project_manager= $_SESSION['userId'];
//insert into database
$sql = "INSERT INTO tbl_project (project_name, project_description, project_start_date, project_end_date, project_status, project_priority, project_manager_id, project_created_date) VALUES ('$proName', '$proDescription', '$proStartDate', '$proEndDate', '$proStatus', '$proPriority', '$project_manager', '$project_created_date')";
$result = mysqli_query($connect, $sql); 
$id = mysqli_insert_id($connect);
// if($result){
//     $_SESSION['Message'] = "Project created successfully";
//                             header("Location: ../project.php");
//                             die();
// }
if(!$result){
    echo "Error creating project";
}
// for($i; $i<$count; $i++){
//     $sql = "INSERT INTO tbl_project_assign (project_id, user_id) VALUES ('$project_id', '$project_manager')";
//     $result = mysqli_query($connect, $sql); 
// }

?>