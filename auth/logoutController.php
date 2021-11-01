<?php
session_start();
unset($_SESSION["pmsSession"]);
header("Location: ../index.php");
?>
