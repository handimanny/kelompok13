<?php
include "config.php";

if (isset($_GET['nis'])) {
    $nis = $_GET['nis'];
    $sql = "DELETE FROM siswa WHERE `siswa`.`nis` = '$nis';";
    $result = mysqli_query($conn,$sql);
    header('location:siswa.php');
}
?>