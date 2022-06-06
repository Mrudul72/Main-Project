<?php
//check user type
session_start();
include('../config/connect.php');
$typeCheck = ($_SESSION['currentUserTypeId'] == 2) ? true : false;
echo $typeCheck;
?>