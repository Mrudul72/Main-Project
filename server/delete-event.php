<?php
include('../config/connect.php');

$id = $_POST['id'];
$sqlDelete = "DELETE from tbl_events WHERE id=".$id;

mysqli_query($connect, $sqlDelete);
echo mysqli_affected_rows($connect);

mysqli_close($connect);
?>