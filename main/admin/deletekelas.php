<?php
include "config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM kelas WHERE `kelas`.`id_kelas` = '$id'";
    $result = mysqli_query($conn,$sql);
    header('location:kelas.php');
}
?>