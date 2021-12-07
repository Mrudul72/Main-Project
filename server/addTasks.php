<?php
include('../config/connect.php');
//add tasks to tbl_tasks
$task_title = $_POST['task-title'];
$task_description = $_POST['task-description'];
$task_team = $_POST['task-team'];
$task_added_by = $_POST['getUserID'];
$task_status = 1;
$project_id= $_POST['getProID'];
//insert into database
$sql = "INSERT INTO tbl_tasks (task_title, task_description, task_team, task_added_by, task_status, project_id) VALUES ('$task_title', '$task_description', '$task_team', '$task_added_by', '$task_status', '$project_id')";
$result = mysqli_query($connect, $sql); 
$id = mysqli_insert_id($connect);
header("Location: ../tasks.php?id=$project_id");
if(!$result){
    echo "Error creating task";
}
?>