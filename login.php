<?php 

include 'config.php';
 
session_start();
 
if (isset($_SESSION['nis'])) {
    header("Location: siswa.php");
}

if (isset($_SESSION['nama'])) {
    header("Location: index.php");
}

error_reporting(0);

if (isset($_POST['submit'])) {
    $nis = $_POST['nis'];
    
    $query = mysqli_query($perpustakaan, "SELECT * FROM siswa WHERE nis='$nis'");
    $data = mysqli_fetch_assoc($query);

    if($data){
        $_SESSION['nis']=$data['nis'];
        $_SESSION['akses']=$data['akses'];

        if($_SESSION['akses']=='admin'){
          header('location:siswa.php');
        } else if($_SESSION['akses']==''){
          header('location:siswa.php');
        }

    } else {
        echo "<script>alert('NIS yang Anda masukan salah. Silahkan coba lagi!')</script>";
    }
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
    <a class="navbar-brand" href="#">Kelompok13</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>

<div class="login-wrapper d-flex justify-content-center align-items-center" style="height: 70vh;">
    <div class="input-wrapper p-4 w-25 bg-secondary rounded-4 bg-dark text-white">
    <form action="" method="POST">
        <h2>Menu Masuk Siswa</h2>
        <div class="mb-3">
            <label class="form-label">NIS</label>
            <input type="text" class="form-control" placeholder="Input NIS" name="nis" value="<?php echo $nis; ?>" required>
        </div>
        <!-- <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="text" class="form-control" placeholder="Password" name="id_kelas" value="<?php echo $_POST['id_kelas']; ?>" required>
        </div> -->
        <div class="input-group mb-3">
            <button name="submit" class="btn btn-outline-primary">Masuk</button>
        </div>
        <p class="login-register-text">Masuk sebagai Petugas! <a href="index.php">klik disini</a></p>
    </form>
</div>
</div>

<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>

</body>
</html>