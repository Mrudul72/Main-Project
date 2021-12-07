<?php
$fileId = $_GET['fid'];
include('../config/connect.php');
//update status
$sql = "DELETE FROM `tbl_files` WHERE `file_id`= '$fileId'";
$result = mysqli_query($connect, $sql);
header('location: ../files.php');
?>