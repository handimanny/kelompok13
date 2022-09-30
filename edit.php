<?php
include_once("config.php");

session_start();

// if(!isset($_SESSION['nama'])){
//   header("Location: halaman.php");
// }

// akses penguna tertentu
// if($_SESSION['akses']==''){
//   header("Location: halaman.php");
// }

if(isset($_POST['update']))
{	
    $id_buku = $_POST['id_buku'];
    
    $penulis=$_POST['penulis'];
    $tahun=$_POST['tahun'];
    $judul=$_POST['judul'];
    $kota=$_POST['kota'];
    $penerbit=$_POST['penerbit'];
    $sinopsis=$_POST['sinopsis'];
    $stok=$_POST['stok'];
    
    $file = $_FILES['cover']['name'];
    $tmp_name = $_FILES['cover']['tmp_name'];
    $upload = move_uploaded_file($tmp_name, "foto/". $file);

    $result = mysqli_query($conn, "UPDATE buku SET penulis='$penulis',tahun='$tahun',judul='$judul',kota='$kota',cover='$file',penerbit='$penerbit',sinopsiis='$sinopsiis',stok='$stok' WHERE id_buku=$id_buku");
    header("Location: halaman.php");
}
?>

<?php
$id_buku = $_GET['id_buku'];
 
$result = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku=$id_buku");

while($data = mysqli_fetch_array($result))
{
  $id_buku = $_POST['id_buku'];
  $penulis=$_POST['penulis'];
  $tahun=$_POST['tahun'];
  $judul=$_POST['judul'];
  $kota=$_POST['kota'];
  $penerbit=$_POST['penerbit'];
  $sinopsis=$_POST['sinopsis'];
  $stok=$_POST['stok'];

  $file = $data['cover'];
}
?>
<html>
<head>	
    <title>Edit</title>
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


<div class="container p-3 mt-3">
  <form name="update_user" method="post" enctype="multipart/form-data" action="">

    <div class="mb-3">
      <?php echo "<h4>Silahkan buat data, " . $_SESSION['nama'] ."!". "</h4>"; ?>
    </div>
    
    <div class="mb-3">
      <label class="form-lable">Nama Penulis</label>
      <input type="text" class="form-control" name="penulis" placeholder="Nama penuli" value=<?php echo $penulis;?>>
    </div>
    <div class="mb-3">
      <label class="form-lable">Tahun Terbit</label>
      <input type="date" class="form-control" name="tahun" value=<?php echo $tahun;?>>
    </div>
    <div class="mb-3">
      <label class="form-lable">Judul Buku</label>
      <input type="text" class="form-control" name="judul" placeholder="Judul buku" value=<?php echo $judul;?>>
    </div>

    <div class="mb-3">
          <label class="form-lable">Kota Asal</label>
          <input type="number" class="form-control" name="kota" placeholder="Kota asal" value=<?php echo $kota;?>>
    </div>
    <div class="mb-3">
          <label class="form-lable">Penerbit</label>
          <input type="number" class="form-control" name="penerbit" placeholder="Penerbit" value=<?php echo $penerbit;?>>
    </div>

    <div class="mb-3">
      <label class="form-lable">Cover</label>
      <input type="file" class="form-control" name="cover" placeholder="Cover buku" value=<?php echo $file;?>>
    </div>
    <div class="mb-3">
          <label class="form-lable">Sinopsis</label>
          <input type="number" class="form-control" name="sinopsis" placeholder="Sinopsis buku" value=<?php echo $sinopsis;?>>
    </div>
    <div class="mb-3">
          <label class="form-lable">Stok</label>
          <input type="number" class="form-control" name="stok" placeholder="Stok buku" value=<?php echo $stok;?>>
    </div>

    <div class="mb-3">
      <input type="hidden" name="id_buku" value=<?php echo $_GET['id_buku'];?>>
      <input class="btn btn-outline-dark" type="submit" name="update" value="Perbarui Data">
    </div>
    </form>
</div>

    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>

</body>
</html>