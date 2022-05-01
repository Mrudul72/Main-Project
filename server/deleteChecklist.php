<?php
include '../config/connect.php';
$taskId = $_POST['task_id'];
//delete all checklist from tbl_checklist where task_id = $taskId
$sql = "DELETE FROM tbl_checklist WHERE task_id = '$taskId'";
$result = mysqli_query($connect, $sql);

//update progress in tbl_tasks
$sql2 = "UPDATE tbl_tasks SET progress = '-1' WHERE task_id = '$taskId'";
$result2 = mysqli_query($connect, $sql2);

?>