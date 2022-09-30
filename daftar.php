<?php 
 
include 'config.php';
 
session_start();

if(!isset($_SESSION['nama'])){
  header("Location: halaman.php");
}

?>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
</head>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">Kelompok13</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

<div class="login-wrapper d-flex justify-content-center align-items-center" style="height: 90vh;">
    <div class="input-wrapper p-4 w-25 bg-secondary rounded-4 bg-dark text-white">
    <form action="" method="POST">
        <h2>Menu Daftar</h2>
        <div class="mb-3">
          <label class="form-lable">Nama</label>
          <input type="text" class="form-control" placeholder="Input nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
            <select class="form-control" name="jenis_kelamin">
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" placeholder="Input Alamat" class="form-control" name="alamat" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input id="muncul" type="password" placeholder="Input password" class="form-control" name="password" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" onclick="tampil()">
            <label class="form-check-label">Lihat Password</label>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Input Ulang Password</label>
            <input id="muncul2" type="password" placeholder="Input ulang password" class="form-control" name="upassword" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" onclick="tampil2()">
            <label class="form-check-label">Lihat Password</label>
        </div>
        <div class="mb-3">
            <button name="submit" class="btn btn-outline-primary">Daftar</button>
        </div>

<?php
if(isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];
    $upassword = $_POST['upassword'];
    
  if ($password == $upassword) {
        $sql = "SELECT * FROM petugas WHERE nama='$nama'";
        $result = mysqli_query($conn, $sql);
        $data=mysqli_num_rows($result);
    if (!$result->num_rows > 0) {
        $sql = "INSERT INTO petugas (nama, jenis_kelamin, alamat, password ) VALUES ('$nama', '$jenis_kelamin', '$alamat', '$password')";
        $result = mysqli_query($conn, $sql);
            
    if ($result) {
        echo "<script>alert('Selamat, registrasi berhasil!')</script>";
        $nama = "";
        $_POST['password'] = "";
    $_POST['upassword'] = "";
    } else {
        echo "<script>alert('Waduh! Terjadi kesalahan.')</script>";
    }
    } else {
        echo "<script>alert('Waduh! User Sudah Terdaftar.')</script>";
    }
            
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
?>
            <!-- Anda sudah punya akun? <a href="index.php">Masuk</a> -->
        </form>
        
</div>
</div>

<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>

<script>
function tampil() {
  var x = document.getElementById("muncul");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script>
function tampil2() {
  var x = document.getElementById("muncul2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

</body>
</html>