<?php
$projectId = $_POST['project_id'];
include('../config/connect.php');
//update status
$sql = "DELETE FROM `tbl_project` WHERE `project_id`= '$projectId'";
$result = mysqli_query($connect, $sql);
?>