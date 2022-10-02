<?php
include "config.php";

if (isset($_GET['nip'])) {
    $nip = $_GET['nip'];
    $sql = "DELETE FROM petugas WHERE `petugas`.`nip` = '$nip'";
    $result = mysqli_query($conn,$sql);
    header('location:petugas.php');
}
?>