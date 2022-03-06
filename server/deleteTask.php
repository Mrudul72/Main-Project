<?php
$taskId = $_POST['task_id'];
$taskStatus = $_POST['task_status'];
include('../config/connect.php');
session_start();
$projectId = $_SESSION['projectID'];
$userName = $_SESSION['userName'];
$userId = $_SESSION['userId'];

$query = "SELECT * FROM tbl_tasks WHERE task_id = '$taskId'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);
$task_title = $row['task_title'];

//delete task
$sql = "DELETE FROM `tbl_tasks` WHERE `task_id`= '$taskId'";
$result = mysqli_query($connect, $sql);

$activity_desc = "{$userName} deleted task \'{$task_title}\'";

//insert to activity table
$sql2 = "INSERT INTO tbl_activity (activity_type, activity_by, activity_desc,project_id) VALUES ('task', '$userId', '$activity_desc', '$project_id')";
$result2 = mysqli_query($connect, $sql2);

if($result){
    echo "success";
}else{
    echo "error";
}



?>