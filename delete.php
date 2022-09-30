<?php
include "config.php";

// if(!isset($_SESSION['username'])){
//   header("Location: home.php");
// }

$id_buku = $_GET['id_buku'];

$result = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku=$id_buku");

$data = $result -> fetch_assoc();

$cover = $data['cover'];

if (file_exists("foto/$cover")){
  unlink("foto/$cover");
}

$result = mysqli_query($conn, "DELETE FROM buku WHERE id_buku=$id_buku");

header("location:halaman.php");
?>