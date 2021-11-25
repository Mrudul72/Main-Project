<?php
include('../config/connect.php');
//add tasks to tbl_tasks
$task_title = $_POST['task_title'];
$task_description = $_POST['task_description'];
$task_team = $_POST['task_team'];
$task_added_by = $_POST['task_added_by'];
$task_status = $_POST['task_status'];

$project_id=1; //todo: get project id from session
//insert into database
$sql = "INSERT INTO tbl_tasks (task_title, task_description, task_team, task_added_by, task_status, project_id) VALUES ('$task_title', '$task_description', '$task_team', '$task_added_by', '$task_status', '$project_id')";
$result = mysqli_query($connect, $sql); 
$id = mysqli_insert_id($connect);
if(!$result){
    echo "Error creating task";
}
?>