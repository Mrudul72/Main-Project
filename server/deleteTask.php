<?php
$taskId = $_POST['task_id'];
$taskStatus = $_POST['task_status'];
include('../config/connect.php');
//delete task
$sql = "DELETE FROM `tbl_tasks` WHERE `task_id`= '$taskId'";
$result = mysqli_query($connect, $sql);
if($result){
    echo "success";
}else{
    echo "error";
}
?>