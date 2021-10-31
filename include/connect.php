<?php
$dbHost = 'localhost';
$dbName = 'pms_db';
$dbUsername = 'root';
$dbPassword = '';
$dbc= mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName); 
if(!$dbc){
    die("Connection failed: " . mysqli_connect_error());
}
?>