<?php 

include 'config.php';
 
// session_start();
 
// if (isset($_SESSION['nama'])) {
//     header("Location: halaman.php");
// }
// error_reporting(0);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    
    $query = mysqli_query($perpustakaan, "SELECT * FROM petugas WHERE nama='$nama' AND password='$password'");
    $data = mysqli_fetch_assoc($query);

    if($data){
        $_SESSION['nama']=$data['nama'];
        $_SESSION['akses']=$data['akses'];

        if($_SESSION['akses']=='admin'){
          header('location:halaman.php');
        } else if($_SESSION['akses']==''){
          header('location:halaman.php');
        }

    } else {
        echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
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
        <h2>Menu Masuk</h2>
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="username" class="form-control" placeholder="nama" name="nama" value="<?php echo $username; ?>" required>
        </div>
        <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
            <input id="muncul" type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" onclick="tampil()">
            <label class="form-check-label">Lihat Password</label>
        </div>
        <div class="input-group mb-3">
            <button name="submit" class="btn btn-outline-primary">Masuk</button>
        </div>
        <!-- <p class="login-register-text">Anda belum punya akun? <a href="daftar.php">Daftar</a></p> dalam proses revisi -->
        <p class="login-register-text">Masuk sebagai Siswa! <a href="daftar.php">klik disini</a></p>
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

</body>
</html>