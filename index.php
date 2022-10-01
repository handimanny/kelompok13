<?php 

include 'config.php';
 
session_start();
 
// if (isset($_SESSION['nama'])) {
//     header("Location: halaman.php");
// }

// if (isset($_SESSION['nis'])) {
//   header("Location: siswa.php");
// }

error_reporting(0);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    
    $query = mysqli_query($conn, "SELECT * FROM petugas WHERE nama='$nama' AND password='$password'");
    $data = mysqli_fetch_assoc($query);

    if($data){
        $_SESSION['nama']=$data['nama'];
        $_SESSION['level']=$data['level'];

        if($_SESSION['level']=='admin'){
          header('location:halaman.php');
        } else if($_SESSION['level']==''){
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

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="bootstrap/style.css">
<link rel="stylesheet" href="bootstrap/style2.css">

<body>

<div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa-solid fa-xmark"></i></a>
  <a href="">Login Petugas</a>
  <a href="login.php">Login Siswa</a>
  <!-- <a href="#">Clients</a>
  <a href="#">Contact</a> -->
</div>

<nav class="navbar navbar-expand-lg navbar-primary bg-primary">
    <div class="container">
      <a class="navbar-brand text-white" onclick="openNav()" href="#"><i class="fa-solid fa-book"></i> Perpustakaan13</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
</nav>

<div class="row justify-content-center mt-5">
  <div class="col-md-4 col-lg-3">
    <div class="login-wrap p-4 p-md-5">
      
      <div class="icon d-flex align-items-center justify-content-center">
        <span class="fa fa-user-o"></span>
      </div>
      
      <form action="" class="login-form" method="POST">
        <h2 class="text-center mb-4">Masuk Petugas</h2>
        
        <div class="mb-3">
            <!-- <label class="form-label">Username</label> -->
            <input type="text" class="form-control rounded-left" placeholder="Username" name="nama" value="<?php echo $username; ?>" required>
        </div>
        <div class="mb-3">
        <!-- <label for="exampleInputPassword1" class="form-label">Password</label> -->
            <input id="muncul" type="password" class="form-control rounded-left" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" onclick="tampil()">
            <label class="form-check-label">Lihat Password</label>
        </div>
        <div class="input-group mb-3">
            <button name="submit" class="form-control btn btn-primary rounded submit px-3">Masuk</button>
        </div>
        <p class="login-register-text">Masuk sebagai Siswa! <a href="login.php">klik disini</a></p>
    </form>
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