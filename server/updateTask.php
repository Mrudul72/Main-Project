<?php
include('../config/connect.php');
$sql = "SELECT * FROM tbl_tasks";
$result = mysqli_query($connect, $sql);
?>