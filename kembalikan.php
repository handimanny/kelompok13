<?php
include_once("config.php");

session_start();

$id_buku = $_GET['id_buku'];
 
$result = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku=$id_buku");

while($data = mysqli_fetch_array($result))
{
  $id_buku = $data['id_buku'];
  $penulis = $data['penulis'];
  $tahun = $data['tahun'];
  $judul = $data['judul'];
  $kota = $data['kota'];
  $penerbit = $data['penerbit'];
  $sinopsis = $data['sinopsis'];
  $stok = $data['stok'];

  $file = $data['cover'];

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kembalikan</title>
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
                
              <?php echo "<h4>Input pengembalian, " . $_SESSION['nama'] ."!". "</h4>"; ?>

              <form name="update_user" method="post" enctype="multipart/form-data" action="">
    
    <div class="mb-3">
      <!-- <label class="form-lable">Nama Penulis</label> -->
      <input type="text" class="form-control" name="penulis" value=<?php echo $penulis;?>>
    </div>
    <div class="mb-3">
      <!-- <label class="form-lable">Tahun Terbit</label> -->
      <input type="text" class="form-control" name="tahun" value=<?php echo $tahun;?>>
    </div>
    <div class="mb-3">
      <!-- <label class="form-lable">Judul Buku</label> -->
      <input type="text" class="form-control" name="judul" value=<?php echo $judul;?>>
    </div>

    <div class="mb-3">
          <!-- <label class="form-lable">Kota Asal</label> -->
          <input type="text" class="form-control" name="kota" value=<?php echo $kota;?>>
    </div>
    <div class="mb-3">
          <!-- <label class="form-lable">Penerbit</label> -->
          <input type="text" class="form-control" name="penerbit" value=<?php echo $penerbit;?>>
    </div>

    <div class="mb-3">
      <!-- <label class="form-lable">Cover</label> -->
      <input type="text" class="form-control" name="cover" value=<?php echo $file;?>>
    </div>
    <div class="mb-3">
          <!-- <label class="form-lable">Sinopsis</label> -->
          <input type="text" class="form-control" name="sinopsis" value=<?php echo $sinopsis;?>>
    </div>
    <div class="mb-3">
          <!-- <label class="form-lable">Stok</label> -->
          <input type="number" class="form-control" name="stok" value=<?php echo $stok;?>>
    </div>

    <div class="mb-3">
      <input type="hidden" name="id_buku" value=<?php echo $_GET['id_buku'];?>>
      <input class="btn btn-outline-dark" type="submit" name="update" value="Proses">
    </div>
    </form>

              </div>
            </div>
          </div>
        </div>
      </div>

<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>

</body>
</html>