<?php
$taskId = $_POST['task_id'];
$taskStatus = $_POST['task_status'];
include('../config/connect.php');
//update status
$sql = "DELETE FROM `tbl_tasks` WHERE `task_id`= '$taskId'";
$result = mysqli_query($connect, $sql);
?>