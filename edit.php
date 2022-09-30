<?php
include_once("config.php");

session_start();

// if(!isset($_SESSION['username'])){
//   header("Location: halaman.php");
// }

// akses penguna tertentu
// if($_SESSION['akses']==''){
//   header("Location: halaman.php");
// }

if(isset($_POST['update']))
{	
    $id_mahasiswa = $_POST['id_mahasiswa'];    
    $nama=$_POST['nama'];
    $tgl_lahir=$_POST['tgl_lahir'];
    $nim=$_POST['nim'];
    $id_jurusan=$_POST['id_jurusan'];

    $file = $_FILES['foto']['name'];
    $tmp_name = $_FILES['foto']['tmp_name'];
    $upload = move_uploaded_file($tmp_name, "foto/". $file);

    $result = mysqli_query($db, "UPDATE db_sekolah SET nama='$nama',tgl_lahir='$tgl_lahir',nim='$nim',id_jurusan='$id_jurusan',foto='$file' WHERE id_mahasiswa=$id_mahasiswa");
    header("Location: index.php");
}
?>

<?php
$id_mahasiswa = $_GET['id_mahasiswa'];
 
$result = mysqli_query($db, "SELECT * FROM db_sekolah WHERE id_mahasiswa=$id_mahasiswa");

while($data = mysqli_fetch_array($result))
{
    $id_mahasiswa = $data['id_mahasiswa'];
    $nama = $data['nama'];
    $tgl_lahir = $data['tgl_lahir'];
    $nim = $data['nim'];
    $id_jurusan = $data['id_jurusan'];

    $file = $data['foto'];

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


<div class="container p-3 mt-3">
  <form name="update_user" method="post" enctype="multipart/form-data" action="">

    <div class="mb-3">
      <?php echo "<h4>Silahkan buat data, " . $_SESSION['username'] ."!". "</h4>"; ?>
    </div>
    
    <div class="mb-3">
      <label class="form-lable">Nama Penulis</label>
      <input type="text" class="form-control" name="nama" value=<?php echo $nama;?>>
    </div>
    <div class="mb-3">
      <label class="form-lable">Tahun Terbit</label>
      <input type="date" class="form-control" name="tgl_lahir" value=<?php echo $tgl_lahir;?>>
    </div>
    <div class="mb-3">
      <label class="form-lable">Judul Buku</label>
      <input type="text" class="form-control" name="nim" value=<?php echo $nim;?>>
    </div>

    <div class="mb-3">
          <label class="form-lable">Kota Asal *</label>
          <input type="number" class="form-control" placeholder="*">
    </div>
    <div class="mb-3">
          <label class="form-lable">Penerbit *</label>
          <input type="number" class="form-control" placeholder="*">
    </div>

    <div class="mb-3">
      <label class="form-lable">Cover</label>
      <input type="file" class="form-control" name="foto" value=<?php echo $file;?>>
    </div>
    <div class="mb-3">
          <label class="form-lable">Sinopsis *</label>
          <input type="number" class="form-control" placeholder="*">
    </div>
    <div class="mb-3">
          <label class="form-lable">Stok *</label>
          <input type="number" class="form-control" placeholder="*">
    </div>

    <div class="mb-3">
      <label class="form-label">Hapus</label>
      <select class="form-select" name="id_jurusan" value=<?php echo $id_jurusan;?>>
        <?php
          $ambil = mysqli_query($db,"SELECT * FROM db_sekolah JOIN db_jurusan ON db_sekolah.id_jurusan = db_jurusan.id_jurusan WHERE db_sekolah.id_jurusan = db_jurusan.id_jurusan");
          $id_jurusan = mysqli_query($db, "SELECT * FROM db_jurusan");
          $lanjut = mysqli_fetch_array($ambil);
          while($data = mysqli_fetch_array ($id_jurusan)){
        ?>
          <option value="<?=$data['id_jurusan']?>"<?php if($lanjut['nama_jurusan'] == $data ['nama_jurusan']){echo "selected";}?>>
          <?= $data['nama_jurusan']?>
          </option>  
        <?php
        }
        ?>
      </select>
    </div>

    <div class="mb-3">
      <input type="hidden" name="id_mahasiswa" value=<?php echo $_GET['id_mahasiswa'];?>>
      <input class="btn btn-outline-dark" type="submit" name="update" value="Perbarui Data">
    </div>
    </form>
</div>

    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>

</body>
</html>