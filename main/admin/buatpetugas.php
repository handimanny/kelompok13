<?php

include_once("config.php");
session_start();

if(!isset($_SESSION['username'])){
  header("Location: ../../admin/loginadmin.php");
}

if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "";
}
?>

<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Petugas</title>

  <!-- Tailwind is included -->
  <link rel="stylesheet" href="css/main.css?v=1628755089081">

  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png"/>
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png"/>
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png"/>
  <link rel="mask-icon" href="safari-pinned-tab.svg" color="#00b4b6"/>

  <meta name="description" content="Admin One - free Tailwind dashboard">

  <meta property="og:url" content="https://justboil.github.io/admin-one-tailwind/">
  <meta property="og:site_name" content="JustBoil.me">
  <meta property="og:title" content="Admin One HTML">
  <meta property="og:description" content="Admin One - free Tailwind dashboard">
  <meta property="og:image" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1920">
  <meta property="og:image:height" content="960">

  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:title" content="Admin One HTML">
  <meta property="twitter:description" content="Admin One - free Tailwind dashboard">
  <meta property="twitter:image:src" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
  <meta property="twitter:image:width" content="1920">
  <meta property="twitter:image:height" content="960">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-130795909-1');
  </script>

</head>
<body>

<div id="app">

<nav id="navbar-main" class="navbar is-fixed-top">
  <div class="navbar-brand">
    <a class="navbar-item mobile-aside-button">
      <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
    </a>
    <div class="navbar-item">
      <div class="control"><input placeholder="Search everywhere..." class="input"></div>
    </div>
  </div>
  <div class="navbar-brand is-right">
    <a class="navbar-item --jb-navbar-menu-toggle" data-target="navbar-menu">
      <span class="icon"><i class="mdi mdi-dots-vertical mdi-24px"></i></span>
    </a>
  </div>
  <div class="navbar-menu" id="navbar-menu">
    <div class="navbar-end">
      <a href="" class="navbar-item has-divider desktop-icon-only">
        <span class="icon"><i class="mdi mdi-help-circle-outline"></i></span>
        <span>About</span>
      </a>
      <a href="keluar.php" title="Log out" class="navbar-item desktop-icon-only">
        <span class="icon"><i class="mdi mdi-logout"></i></span>
        <span>Log out</span>
      </a>
    </div>
  </div>
</nav>

<aside class="aside is-placed-left is-expanded">
  <div class="aside-tools">
    <div>
    <b class="font-black">Perpustakaan</b>
    </div>
  </div>
  <div class="menu is-menu-main">
    <p class="menu-label">Umum</p>
    <ul class="menu-list">
      <li class="active">
        <a href="dashboard.php">
          <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
          <span class="menu-item-label">Dashboard</span>
        </a>
      </li>
    </ul>
    <p class="menu-label">Menu</p>
    <ul class="menu-list">
      <li class="--set-active-tables-html">
        <a href="siswa.php">
          <span class="icon"><i class="mdi mdi-account-circle"></i></span>
          <span class="menu-item-label">Siswa</span>
        </a>
      </li>
      <li class="--set-active-forms-html">
        <a href="kelas.php">
          <span class="icon"><i class="mdi mdi-table"></i></span>
          <span class="menu-item-label">Kelas</span>
        </a>
      </li>
      <li class="--set-active-profile-html">
        <a href="buku.php">
          <span class="icon"><i class="mdi mdi-book"></i></span>
          <span class="menu-item-label">Buku</span>
        </a>
      </li>
      <li>
        <a href="petugas.php">
          <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
          <span class="menu-item-label">Petugas</span>
        </a>
      </li>
      <li>
        <a href="peminjaman.php">
          <span class="icon"><i class="mdi mdi-cart-plus"></i></span>
          <span class="menu-item-label">Peminjaman</span>
        </a>
      </li>
      <li>
        <a href="pengembalian.php">
          <span class="icon"><i class="mdi mdi-cart-minus"></i></span>
          <span class="menu-item-label">Pengembalian</span>
        </a>
      </li>
    </ul>
  </div>
</aside>

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Petugas</li>
    </ul>
  </div>
</section>

<section class="is-hero-bar">
  <table>
    <h1>Pendaftaran Petugas</h1>
    <form action="" method="POST">
                  <div class="mb-3">
                    <label class="form-lable">Nama</label>
                    <input type="text" class="input" placeholder="Input nama" name="nama" required>
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
                      <select class="input" name="jenis_kelamin">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                  </div>
                  <div class="mb-3">
                      <label class="form-label">Alamat</label>
                      <input type="text" placeholder="Input Alamat" class="input" name="alamat" required>
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input id="muncul" type="password" placeholder="Input password" class="input" name="password" required>
                  </div>
                  <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" onclick="tampil()">
                      <label class="form-check-label">Lihat Password</label>
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Input Ulang Password</label>
                      <input id="muncul2" type="password" placeholder="Input ulang password" class="input" name="upassword" required>
                  </div>
                  <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" onclick="tampil2()">
                      <label class="form-check-label">Lihat Password</label>
                  </div>
                  <br>
                  <div class="mb-3">
                      <button name="submit" class="button green">Daftar</button>
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
</table>

<br>

<table>
        <tbody>
          <h1>Petugas Terdaftar</h1>
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
            <a href="#?nip=<?=$data['nip']?>" class="button green">Edit</a>
            |
            <a href="hapus/deletenip.php?nip=<?=$data['nip']?>" class="button red">Hapus</a>
            </td>
        </tr>
        </tbody>
    <?php
    $no++;
      }
      ?>
</table>
</section>

<<<<<<< HEAD:main/petugas.php
<br>
=======
<!-- main section -->
<table class="table table-primary p-1 mt-4 border border-primary container">
  <tbody>
      <tr>
          <th>NIP</th>
          <th>Nama</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
          <th class="text-center" >Update</th>
      </tr>
  </tbody>

  <tbody>
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
            <td class="text-center"><?= $no ?></td>
            <td><?= $data['1']?></td>
            <td><?= $data['2']?></td>
            <td><?= $data['3']?></td>

            <td colspan="2">            
            
            <a href="edit.php?id_buku=<?=$data['nip']?>" class="btn btn-outline-primary">Edit</a>
            |
            <a href="delete.php?id_buku=<?=$data['nip']?>" class="btn btn-outline-danger">Hapus</a>
            </td>

        </tr>
        </tbody>
    <?php
    $no++;
      }
      ?>
</table>
<!-- end main section -->

>>>>>>> 59df2f09631dd852552412ea90e519c03da33a2d:main/admin/petugas.php

<footer class="footer">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
    <div class="flex items-center justify-start space-x-3">
      <div>
        © 2022, Kelompok13
      </div>
    </div>
  </div>
</footer>
   
<!-- Scripts below are for demo only -->
<script type="text/javascript" src="js/main.min.js?v=1628755089081"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script type="text/javascript" src="js/chart.sample.min.js"></script>


<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '658339141622648');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=658339141622648&ev=PageView&noscript=1"/></noscript>

<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

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
