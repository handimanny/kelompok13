<?php 
 
include 'config.php';
 
session_start();

// if(!isset($_SESSION['nama'])){
//   header("Location: halaman.php");
// }

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

    <div class="row d-flex justify-content-center align-items-center mt-3">
      <div class="col-xl-10">
          <div class="row g-0">
            
            <div class="col-lg-5">
              <div class="login-wrap card-body p-md-5 mx-md-4">

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
              </form>

              </div>
            </div>

            <div class="col-lg-5">
              <div class="login-wrap card-body p-md-5 mx-md-4">
<table>
        <tbody>
        <h2>Petugas</h2>
          <tr>
              <th class="text-center">No</th>
              <th class="text-center">Nama</th>
              <th class="text-center">Jenis_kelamin</th>
              <th class="text-center">Alamat</th>
              <th class="text-center">Update</th>
          </tr>
        </tbody>

        <?php
    
    if(isset($_GET['cari'])){
      $cari = $_GET['cari'];
      $result = mysqli_query($conn,"SELECT * FROM petugas WHERE nama LIKE '%".$cari."%'");				
    }else{
      $result = mysqli_query($conn,"SELECT * FROM petugas");
    }
    $no =1;
    while($data = mysqli_fetch_array($result)) {         
      ?>
        <tbody>
        <tr>
            <td><?= $no ?></td>
            <td><?= $data['1']?></td>
            <td class="text-center"><?= $data['2']?></td>
            <td><?= $data['3']?></td>
            <td colspan="2">
            <a href="#?nip=<?=$data['nip']?>" class="btn btn-outline-primary">Edit</a>
            |
            <a href="#?nip=<?=$data['nip']?>" class="btn btn-outline-danger">Hapus</a>
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