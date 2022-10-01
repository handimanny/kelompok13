<?php

include_once("config.php");

session_start();

// if(!isset($_SESSION['nama'])){
//   header("Location: halaman.php");
// }

// if($_SESSION['level']==''){
//   header("Location: halaman.php");
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat</title>
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

<div class="container mt-4">
      <div class="col-xl-0">
          <div class="row g-0">
            
            <div>
              <div class="login-wrap p-md-5 mx-md-1">
                
              <?php echo "<h4>Riwayat peminjaman". "</h4>"; ?>

              <table class="table p-1 mt-4 border container">

<tbody>
    <tr>
        <th>No</th>
        <th>Id Peminjaman</th>
        <th>Id Siswa</th>
        <th>Id Petugas</th>
        <th>Tanggal Peminjaman</th>
        <th>Tanggal Pengembalian</th>
        <th class="text-center">Update</th>
    </tr>
</tbody>

    <?php
    
    if(isset($_GET['cari'])){
      $cari = $_GET['cari'];
      $result = mysqli_query($conn,"SELECT * FROM peminjaman WHERE id_peminjaman LIKE '%".$cari."%'");				
    }else{
      $result = mysqli_query($conn,"SELECT * FROM peminjaman");
    }
    $no =1;
    while($data = mysqli_fetch_array($result)) {         
      ?>
        <tbody>
        <tr>
            <td class="text-center"><?= $no ?></td>
            <td><?= $data['0']?></td>
            <td><?= $data['1']?></td>
            <td><?= $data['2']?></td>
            <td><?= $data['3']?></td>
            <td><?= $data['4']?></td>
            <td class="text-center" colspan="2">
            
            <a href="#?id_peminjaman=<?=$data['id_peminjaman']?>" class="btn btn-outline-primary">Edit</a>
            |
            <a href="#?id_peminjaman=<?=$data['id_peminjaman']?>" class="btn btn-outline-danger">Hapus</a>
            </td>

        </tr>
        </tbody>
    <?php
    $no++;
      }
      ?>

</table>

<table>

<?php echo "<h4>Riwayat pengembalian". "</h4>"; ?>

              <table class="table p-1 mt-4 border container">

<tbody>
    <tr>
        <th>No</th>
        <th>Id Peminjaman</th>
        <th>Id Siswa</th>
        <th>Id Petugas</th>
        <th>Tanggal Peminjaman</th>
        <th>Tanggal Pengembalian</th>
        <th class="text-center">Update</th>
    </tr>
</tbody>

      <?php
    
    if(isset($_GET['cari'])){
      $cari = $_GET['cari'];
      $result = mysqli_query($conn,"SELECT * FROM pengembalian WHERE id_pengembalian LIKE '%".$cari."%'");				
    }else{
      $result = mysqli_query($conn,"SELECT * FROM pengembalian");
    }
    $no =1;
    while($data = mysqli_fetch_array($result)) {         
      ?>
        <tbody>
        <tr>
            <td class="text-center"><?= $no ?></td>
            <td><?= $data['0']?></td>
            <td><?= $data['1']?></td>
            <td><?= $data['2']?></td>
            <td><?= $data['3']?></td>
            <td><?= $data['3']?></td>
            <td class="text-center" colspan="2">
            
            <a href="#?id_peminjaman=<?=$data['id_peminjaman']?>" class="btn btn-outline-primary">Edit</a>
            |
            <a href="#?id_peminjaman=<?=$data['id_peminjaman']?>" class="btn btn-outline-danger">Hapus</a>
            </td>

        </tr>
        </tbody>
    <?php
    $no++;
      }
      ?>
</table>

              </div>
            </div>
          </div>
        </div>
      </div>

<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>

</body>
</html>