<?php
include "config.php";

// if(!isset($_SESSION['username'])){
//     header("Location: admin.php");
//   }
  
// if($_SESSION['akses']==''){
//     header("Location: admin.php");
//   }

$id_buku = $_GET['id_buku'];

$result = mysqli_query($perpustakaan, "SELECT * FROM buku WHERE id_buku=$id_buku");

$data = $result -> fetch_assoc();

$foto = $data['foto'];

if (file_exists("foto/$foto")){
    unlink("foto/$foto");
}

$result = mysqli_query($perpustakaan, "DELETE FROM buku WHERE id_buku=$id_buku");

header("location:halaman.php");
?>