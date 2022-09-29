<?php

include_once("config.php");

// session_start();

// if(!isset($_SESSION['username'])){
//   header("Location: halaman.php");
// }

// if($_SESSION['akses']==''){
//   header("Location: halaman.php");
// }

?>

<html>
<head>
    <title>Buat</title>
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
    <form action="buat.php" name="form1" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <h4>Silahkan buat data !</h4>
        </div>
        <div class="mb-3">
          <label class="form-lable">Id Buku</label>
          <input type="text" class="form-control" placeholder="Input Id" name="id_buku">
        </div>
        <div class="mb-3">
          <label class="form-lable">Nama Penulis</label>
          <input type="text" class="form-control" placeholder="Input Nama Penulis" name="nama">
        </div>
        <div class="mb-3">
          <label class="form-lable">Tahun Terbit</label>
          <input type="date" class="form-control" name="tgl">
        </div>
        <div class="mb-3">
          <label class="form-lable">Judul Buku</label>
          <input type="text" class="form-control" placeholder="Input Judul" name="judul">
        </div>
        <div class="mb-3">
          <label class="form-lable">Kota Asal</label>
          <input type="text" class="form-control" placeholder="Kota Asal" name="kota">
        </div>
        <div class="mb-3">
          <label class="form-lable">Penerbit</label>
          <input type="text" class="form-control" placeholder="Nama Penerbit" name="penerbit">
        </div>
        <div class="mb-3">
          <label class="form-lable">Cover</label>
          <input type="file" class="form-control" name="foto">
        </div>
        <div class="mb-3">
          <label class="form-lable">Sinopsis</label>
          <input type="text" class="form-control" placeholder="Sinopsis" name="sinopsis">
        </div>
        <div class="mb-3">
          <label class="form-lable">Stok</label>
          <input type="text" class="form-control" placeholder="Jumlah Stok" name="stok">
        </div>
            <input class="btn btn-outline-dark" type="submit" name="submit" value="Tambah Data">
    </form>
</div>




    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>

</body>
</html>

<?php

if(isset($_POST['submit'])) {
    $id_buku = $_POST['id_buku'];
    $nama = $_POST['nama'];
    $tgl = $_POST['tgl'];
    $judul = $_POST['judul'];
    $kota = $_POST['kota'];
    $penerbit = $_POST['penerbit'];
    $sinopsis = $_POST['sinopsis'];
    $stok = $_POST['stok'];

    $file = $_FILES['foto']['name'];
    $tmp_name = $_FILES['foto']['tmp_name'];
    $upload = move_uploaded_file($tmp_name, "foto/". $file);

    $sql = "INSERT INTO `buku` (`id_buku`, `penulis`, `tahun`, `judul`, `kota`, `penerbit`, `cover`, `sinopsis`, `stok`) VALUES ('', '$nama', '$tgl', '$judul', '$kota', '$penerbit', '$file', '$sinopsis', '$stok')";
    $result = mysqli_query($perpustakaan, $sql);
    echo "Data berasil ditambah. <a href='index.php'>Lihat Data</a>";
}
?>