<?php
$taskId = $_POST['taskId'];
$taskStatus = $_POST['taskStatus'];
include('../config/connect.php');
//update status
$sql = "UPDATE `tbl_tasks` SET `task_status`='$taskStatus' WHERE `task_id`='$taskId'";
$result = mysqli_query($connect, $sql);
echo "<script>alert('$taskStatus');</script>";

?>