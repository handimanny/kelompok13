<?php 
 
session_start();
session_destroy();
 
header("Location: ../../login/loginsiswa.php");
 
?>