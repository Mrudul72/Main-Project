<?php
$taskId = $_POST['taskId'];
$taskStatus = $_POST['taskStatus'];
include('../config/connect.php');
session_start();

$projectId = $_SESSION['projectID'];
$userName = $_SESSION['userName'];

switch($taskStatus){
    case 1:
        $status = 'Backlog';
        break;
    case 2:
        $status = 'Development';
        break;
    case 3:
        $status = 'Testing';
        break;
    case 4:
        $status = 'Completed';
        break;
}
//featch task details
$sql = "SELECT * FROM tbl_tasks WHERE task_id = '$taskId'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
$task_title = $row['task_title'];

//update status
$sql = "UPDATE `tbl_tasks` SET `task_status`='$taskStatus' WHERE `task_id`='$taskId'";
$result = mysqli_query($connect, $sql);

$activity_desc = "{$userName} changed status of task \'{$task_title}\' to {$status} ";
//insert to activity table
$sql2 = "INSERT INTO tbl_activity (activity_type, activity_by, activity_desc,project_id) VALUES ('task', '$userId', '$activity_desc', '$projectId')";
$result2 = mysqli_query($connect, $sql2);

// echo "<script>alert('$taskStatus');</script>";
// header("location: ../tasks.php");

?>