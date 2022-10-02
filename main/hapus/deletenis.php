<?php

include_once("../config.php");
 
$nis = $_GET['nis'];
 
$result = mysqli_query($conn, "DELETE FROM siswa WHERE nis=$nis");

header("Location:../siswa.php");
?>