<?php

include_once("../config.php");
 
$nip = $_GET['nip'];
 
$result = mysqli_query($conn, "DELETE FROM petugas WHERE nip=$nip");

header("Location:../petugas.php");
?>