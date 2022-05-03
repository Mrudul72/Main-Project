<?php
extract($_POST);
include('../config/connect.php');

//update project status
$sql = "UPDATE tbl_project SET project_status = 0 WHERE project_id = '$pro_id'";
$result = mysqli_query($connect, $sql);
if($result){
    echo "success";
}else{
    echo "error";
}

?>