<?php

include_once("config.php");

session_start();

if (!isset($_SESSION['nama'])) {
  header("Location: halaman.php");
}

// if (!isset($_SESSION['nis'])) {
//   header("Location: siswa.php");
// }

if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "";
}
?>

<html>
<head>    
    <title>Home</title>
</head>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
 
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="halaman.php">Kelompok13</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
      </ul>
      <form>
        <a href='keluar.php' class="btn btn-outline-success">Keluar</a>
      </form>
    </div>
  </div>
</nav>

  <div class="container mt-4">
      <form class="d-flex" role="search" action="halaman.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Cari Data" aria-label="Search" name="cari">
        <button class="btn btn-outline-dark" type="submit">Cari</button>
      </form>
    </div>
  </div>

<br>

<div class="text-center">

<?php if($_SESSION['level'] == 'admin'){
  ?>

<a href="buat.php" class="btn btn-outline-dark">Tambah Buku</a>
<a href="daftar.php" class="btn btn-outline-dark">Tambah Petugas</a>

<?php
}
?>

<a href="daftarsiswa.php" class="btn btn-outline-dark">Tambah Siswa</a>
<a href="riwayat.php" class="btn btn-outline-dark">Riwayat Pinjam</a>
</div>

<br>

<table class="table table-dark p-1 mt-4 border border-success container">

<tbody>
    <tr>
        <th>No Id</th>
        <th>Penulis Buku</th>
        <th>Tahun Terbit</th>
        <th>Judul Buku</th>
        <th>Kota Asal</th>
        <th>Penerbit</th>
        <th>Cover</th>
        <th>Sinopsis</th>
        <th>Stok</th>
        <th class="text-center" >Update</th>
    </tr>
</tbody>

    <?php
    
    if(isset($_GET['cari'])){
      $cari = $_GET['cari'];
      $result = mysqli_query($conn,"SELECT * FROM buku WHERE judul LIKE '%".$cari."%'");				
    }else{
      $result = mysqli_query($conn,"SELECT * FROM buku");
    }
    $no =1;
    while($data = mysqli_fetch_array($result)) {         
      ?>
        <tbody>
        <tr>
            <td><?= $no ?></td>
            <td><?= $data['1']?></td>
            <td><?= $data['2']?></td>
            <td><?= $data['3']?></td>
            <td><?= $data['4']?></td>
            <td><?= $data['5']?></td>
            <td>
              <img src="foto/<?= $data['6']?>" width="30px" class="img-thumbnail" alt="">
            </td>
            <td><?= $data['7']?></td>
            <td><?= $data['8']?></td>
            <td colspan="2">
            <a href="pinjam.php?id_buku=<?=$data['id_buku']?>" class="btn btn-outline-success">Pinjam</a>
            |
            <a href="kembalikan.php?id_buku=<?=$data['id_buku']?>" class="btn btn-outline-warning">Kembalikan</a>
            |
            <a href="edit.php?id_buku=<?=$data['id_buku']?>" class="btn btn-outline-primary">Edit</a>
            |
            <a href="delete.php?id_buku=<?=$data['id_buku']?>" class="btn btn-outline-danger">Hapus</a>
            </td>
        </tr>
        </tbody>
    <?php
    $no++;
      }
      ?>
</table>

<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>

</body>
</html>