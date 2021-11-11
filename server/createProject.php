<?php
include('./config/connect.php');
extract($_POST);
//insert into database
$sql = "INSERT INTO tbl_project (project_name, project_description, project_start_date, project_end_date, project_status, project_priority, project_manager_id, project_created_date) VALUES ('$project_name', '$project_description', '$project_start_date', '$project_end_date', '$project_status', '$project_priority', '$project_manager', '$project_type', '$project_completion_percentage', '$project_created_by', '$project_created_date')";
$result = mysqli_query($connect, $sql); 
if($result){
    echo "Project created successfully";
}
else{
    echo "Error creating project";
}
?>