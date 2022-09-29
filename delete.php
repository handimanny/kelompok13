<?php
include "config.php";

if(!isset($_SESSION['username'])){
    header("Location: admin.php");
  }
  
if($_SESSION['akses']==''){
    header("Location: admin.php");
  }

$id_mahasiswa = $_GET['id_mahasiswa'];

$result = mysqli_query($db, "SELECT * FROM db_sekolah WHERE id_mahasiswa=$id_mahasiswa");

$data = $result -> fetch_assoc();

$foto = $data['foto'];

if (file_exists("foto/$foto")){
    unlink("foto/$foto");
}

$result = mysqli_query($db, "DELETE FROM db_sekolah WHERE id_mahasiswa=$id_mahasiswa");

header("location:index.php");
?>