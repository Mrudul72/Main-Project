<?php
//update progress in tbl_task
include '../config/connect.php';
$progress = $_POST['progress'];
$taskId = $_POST['task_id'];
$sql = "UPDATE tbl_tasks SET progress = '$progress' WHERE task_id = '$taskId'";
$result = mysqli_query($connect, $sql);
?>