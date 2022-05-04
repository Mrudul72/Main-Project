<?php
extract($_POST);
include('../config/connect.php');

$pro_stat = ($pro_status == 1) ? 0 : 1;
//update project status
$sql = "UPDATE tbl_project SET project_status = $pro_stat WHERE project_id = '$pro_id'";
$result = mysqli_query($connect, $sql);
if($result){
    echo "success";
}else{
    echo "error";
}

?>