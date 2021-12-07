<?php
session_start();
unset($_SESSION["pmsSession"]);
session_destroy();
header("Location: ../index.php");
?>
