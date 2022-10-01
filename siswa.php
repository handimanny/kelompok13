<?php

include_once("config.php");

session_start();

// if (!isset($_SESSION['nis'])) {
//   header("Location: halaman.php");
// }

// if (!isset($_SESSION['nama'])) {
//   header("Location: halaman.php");
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

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="bootstrap/style.css">
 
<body>

<nav class="navbar navbar-expand-lg navbar-primary bg-primary">
  <div class="container">
  <a class="navbar-brand text-white" href="halaman.php"><i class="fa-solid fa-book"></i> Perpustakaan13</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
      </ul>
      <form>
        <a href='keluar.php' class="btn btn-danger rounded">Keluar</a>
      </form>
    </div>
  </div>
</nav>

<div class="text-center mt-4">
<a href="riwayat.php" class="btn btn-outline-dark">Riwayat Pinjam</a>
</div>

<div class="container mt-4">
      <form class="d-flex" role="search" action="siswa.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Cari Data" aria-label="Search" name="cari">
        <button class="btn btn-outline-dark rounded" type="submit">Cari</button>
      </form>
    </div>
  </div>

<table class="table table-primary p-1 mt-4 border border-primary container">

<tbody>
    <tr>
        <th>No Id</th>
        <th>Cover</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Tahun Terbit</th>
        <th>Kota Asal</th>
        <th>Penerbit</th>
        <th>Sinopsis</th>
        <th>Stok</th>
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
            <td>
              <img src="foto/<?= $data['6']?>" width="30px" class="img-thumbnail" alt="">
            </td>
            <td><?= $data['3']?></td>
            <td><?= $data['1']?></td>
            <td><?= $data['2']?></td>
            <td><?= $data['4']?></td>
            <td><?= $data['5']?></td>
            <td><?= $data['7']?></td>
            <td><?= $data['8']?></td>
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