<?php
include('../config/connect.php');
session_start();
//add tasks to tbl_tasks
$task_title = $_POST['task-title'];
$task_description = $_POST['task-description'];
$task_team = $_POST['task-team'];
$task_added_by = $_POST['getUserID'];
$task_status = 1;
$project_id= $_POST['getProID'];
$userName = $_SESSION['userName'];
$title = ucwords($task_title);
//insert into database
$sql = "INSERT INTO tbl_tasks (task_title, task_description, team_id, task_added_by, task_status, project_id) VALUES ('$title', '$task_description', '$task_team', '$task_added_by', '$task_status', '$project_id')";
$result = mysqli_query($connect, $sql); 
$id = mysqli_insert_id($connect);


$activity_desc = "{$userName} added a new task \'{$title}\'";

//insert to activity table
$sql2 = "INSERT INTO tbl_activity (activity_type, activity_by, activity_desc,project_id) VALUES ('task', '$task_added_by', '$activity_desc', '$project_id')";
$result2 = mysqli_query($connect, $sql2);

header("Location: ../tasks.php");
if(!$result){
    echo "Error creating task";
}
?>