<?php

include_once("config.php");

session_start();

if(!isset($_SESSION['username'])){
  header("Location: admin.php");
}

// akses penguna tertentu
if($_SESSION['akses']==''){
  header("Location: admin.php");
}

?>

<html>
<head>
    <title>Buat</title>
</head>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
 
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="admin.php">Kelompok13</a>
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
          <?php echo "<h4>Silahkan buat data, " . $_SESSION['username'] ."!". "</h4>"; ?>
        </div>
        <div class="mb-3">
          <label class="form-lable">Id Mahasiswa</label>
          <input type="number" class="form-control" placeholder="Input Id" name="id_mahasiswa">
        </div>
        <div class="mb-3">
          <label class="form-lable">Nama Mahasiswa</label>
          <input type="text" class="form-control" placeholder="Input Nama Mahasiswa" name="nama">
        </div>
        <div class="mb-3">
          <label class="form-lable">Tanggal Lahir</label>
          <input type="date" class="form-control" name="tgl_lahir">
        </div>
        <div class="mb-3">
          <label class="form-lable">NIM</label>
          <input type="number" class="form-control" placeholder="Input NIM" name="nim">
        </div>
        <div class="mb-3">
          <label class="form-label">Jurusan</label>
          <select class="form-select" name="id_jurusan">
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
          <label class="form-lable">Foto</label>
          <input type="file" class="form-control" name="foto">
        </div>
            <input class="btn btn-outline-dark" type="submit" name="Submit" value="Tambah Data">
    </form>
</div>

<div class="container">
    <?php

    if(isset($_POST['Submit'])) {
        $id_mahasiswa = $_POST['id_mahasiswa'];
        $nama = $_POST['nama'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $nim = $_POST['nim'];
        $id_jurusan = $_POST['id_jurusan'];

        $file = $_FILES['foto']['name'];
        $tmp_name = $_FILES['foto']['tmp_name'];
        $upload = move_uploaded_file($tmp_name, "foto/". $file);

        $result = mysqli_query($db, "INSERT INTO db_sekolah(id_mahasiswa,nama,tgl_lahir,nim,id_jurusan,foto) VALUES('$id_mahasiswa','$nama','$tgl_lahir','$nim','$id_jurusan','$file')");
        echo "Data berasil ditambah. <a href='index.php'>Lihat Data</a>";
    }
    ?>
</div>

    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>

</body>
</html>