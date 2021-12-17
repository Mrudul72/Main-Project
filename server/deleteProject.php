<?php
extract($_POST);
include('../config/connect.php');

$sql = "DELETE FROM `tbl_project` WHERE `project_id`= '$pro_id'";
$result = mysqli_query($connect, $sql);
//delete project_id from tbl_tasks
$sql2 = "DELETE FROM `tbl_tasks` WHERE `project_id`= '$pro_id'";
$result2 = mysqli_query($connect, $sql);
//delete project_id from tbl_team_allocation
$sql3 = "DELETE FROM `tbl_team_allocation` WHERE `project_id`= '$pro_id'";
$result3 = mysqli_query($connect, $sql);
//delete project_id from tbl_files
$sql4 = "DELETE FROM `tbl_files` WHERE `project_id`= '$pro_id'";
$result4 = mysqli_query($connect, $sql);

?>