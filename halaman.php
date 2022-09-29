<?php

include_once("config.php");

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

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

  <div class="container p-1 mt-4">
      <form class="d-flex" role="search" action="halaman.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Cari Data" aria-label="Search" name="cari">
        <button class="btn btn-outline-dark" type="submit">Cari</button>
      </form>
    </div>
  </div>

  <div class="container">
        <form action="" method="POST" class="login-email">
            <?php echo "<h4>Selamat Datang, " . $_SESSION['username'] ."!". "</h4>"; ?>
        </form>
    </div>

<?php if($_SESSION['akses'] == 'admin'){
  ?>

<div class="text-center">
<a href="buat.php" class="btn btn-outline-dark">Tambah Data</a>
</div>

<?php
}
?>

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
  
  <?php if($_SESSION['akses'] == 'admin')
  {
  ?>
  
        <th>Update</th>
  
  <?php
  }
  ?>

    </tr>
</tbody>

    <?php
    
    if(isset($_GET['cari'])){
      $cari = $_GET['cari'];
      $result = mysqli_query($db,"SELECT * FROM db_sekolah JOIN db_jurusan ON db_sekolah.id_jurusan = db_jurusan.id_jurusan WHERE nama LIKE '%".$cari."%'");				
    }else{
      $result = mysqli_query($db,"SELECT * FROM db_sekolah JOIN db_jurusan ON db_sekolah.id_jurusan = db_jurusan.id_jurusan WHERE db_sekolah.id_jurusan = db_jurusan.id_jurusan");
    }
    $no =1;
    while($data = mysqli_fetch_array($result)) {         
      
      ?>

        <tbody>
        <tr>
            <td><?= $no;?></td>
            <td><?= $data['1']?></td>
            <td><?= $data['2']?></td>
            <td><?= $data['3']?></td>
            <td><?= $data['nama_jurusan']?></td>
            <td>
              <img src="foto/<?= $data['5']?>" width="30px" class="img-thumbnail" alt="">
            </td>
            <?php if($_SESSION['akses'] == 'admin'){?>
            <td colspan="2">
            <a href="edit.php?id_mahasiswa=<?=$data['id_mahasiswa']?>" class="btn btn-outline-primary">Edit</a>
            |
            <a href="delete.php?id_mahasiswa=<?=$data['id_mahasiswa']?>" class="btn btn-outline-warning">Hapus</a>
            </td>
            <?php
          }
          ?>
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