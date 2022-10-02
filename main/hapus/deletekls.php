<?php

include_once("../config.php");
 
$id_kelas = $_GET['id_kelas'];
 
$result = mysqli_query($conn, "DELETE FROM kelas WHERE id_kelas=$id_kelas");

header("Location:../kelas.php");
?>