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
<link rel="stylesheet" href="bootstrap/style2.css">

<body>

<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa-solid fa-xmark"></i></a>
  <a href="">Halaman</a>
  <a href="riwayat.php">Riwayat Pinjam</a>
</div>

<nav class="navbar navbar-expand-lg navbar-primary bg-primary">
  <div class="container">
  <a class="navbar-brand text-white" onclick="openNav()" href="#"><i class="fa-solid fa-book"></i> Perpustakaan13</a>
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
        <th class="text-center">No Id</th>
        <th class="text-center">Cover</th>
        <th class="text-center">Judul</th>
        <th class="text-center">Penulis</th>
        <th class="text-center">Tahun Terbit</th>
        <th class="text-center">Kota Asal</th>
        <th class="text-center">Penerbit</th>
        <th class="text-center">Sinopsis</th>
        <th class="text-center">Stok</th>
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
            <td class="text-center"><?= $no ?></td>
            <td class="text-center">
              <img src="foto/<?= $data['6']?>" width="200px" class="img-thumbnail" alt="">
            </td>
            <td class="text-center"><?= $data['3']?></td>
            <td class="text-center"><?= $data['1']?></td>
            <td class="text-center"><?= $data['2']?></td>
            <td class="text-center"><?= $data['4']?></td>
            <td class="text-center"><?= $data['5']?></td>
            <td><?= $data['7']?></td>
            <td class="text-center"><?= $data['8']?></td>
        </tr>
        </tbody>
    <?php
    $no++;
      }
      ?>
</table>

<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>

<script>
  function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>

</body>
</html>