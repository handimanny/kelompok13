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

    $result = mysqli_query($conn, "UPDATE buku SET id_buku='$id_buku',penulis='$penulis',tahun='$tahun',judul='$judul',kota='$kota',penerbit='$penerbit',sinopsis='$sinopsis',stok='$stok',cover='$file' WHERE id_buku=$id_buku");
    header("Location: halaman.php");
}
?>

<?php
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

<html>
<head>	
    <title>Edit</title>
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
  <a href="halaman.php">Halaman</a>
  <a href="buat.php">Tambah Buku</a>

<?php if($_SESSION['level'] == 'admin')
{
?>

  <a href="daftar.php">Tambah Petugas</a>

<?php
}
?>

  <a href="daftarsiswa.php">Tambah Siswa</a>
  <a href="riwayat.php">Riwayat Pinjam</a>
  <a href="pinjam.php">Peminjaman</a>
  <a href="kembalikan.php">Pengembalian</a>

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
      <div class="col-xl-0">
          <div class="row g-0">
            
            <div>
              <div class="login-wrap p-md-5 mx-md-1">
                
              <?php echo "<h4>Silahkan edit buku, " . $_SESSION['nama'] ."!". "</h4>"; ?>

              <form name="update_user" method="post" enctype="multipart/form-data" action="">
    
    <div class="mb-3">
      <!-- <label class="form-lable">Nama Penulis</label> -->
      <input type="text" class="form-control" name="penulis" value=<?php echo $penulis;?>>
    </div>
    <div class="mb-3">
      <!-- <label class="form-lable">Tahun Terbit</label> -->
      <input type="date" class="form-control" name="tahun" value=<?php echo $tahun;?>>
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
      <input type="file" class="form-control" name="cover" value=<?php echo $file;?>>
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
      <input class="btn btn-outline-dark" type="submit" name="update" value="Perbarui Data">
    </div>
    </form>

              </div>
            </div>
          </div>
        </div>
      </div>

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