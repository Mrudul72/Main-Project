<?php
$dbHost = 'localhost';
$dbName = 'pms_db';
$dbUsername = 'root';
$dbPassword = '';
$connect= mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName); 
if(!$connect){
    die("Connection failed: " . mysqli_connect_error());
}
?>