<?php

include_once("config.php");
session_start();

if(!isset($_SESSION['nama'])){
  header("Location: ../index.php");
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
  <title>Siswa</title>

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
      <li>Siswa</li>
    </ul>
  </div>
</section>

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Daftar Siswa
    </h1>
    <a href="buatsiswa.php" class="btn btn-outline-dark button light">Tambah Siswa</a>
  </div>
</section>

<!-- main section -->
<table class="table table-primary p-1 mt-4 border border-primary container">
  <tbody>
      <tr>
          <th>NIS</th>
          <th>Nama</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
          <th>Kelas</th>
          <th class="text-center" >Update</th>
      </tr>
  </tbody>

  <tbody>
  <?php
    
    if(isset($_GET['cari'])){
      $cari = $_GET['cari'];
      $result = mysqli_query($conn,"SELECT * FROM `siswa` WHERE `nama` LIKE '%".$cari."%'");				
    }else{
      $result = mysqli_query($conn,"SELECT * FROM `siswa` join `kelas` where siswa.id_kelas=kelas.id_kelas");
    }
    $no =1;
    while($data = mysqli_fetch_array($result)) {         
      ?>
        <tbody>
        <tr>
            <td class="text-center"><?= $data['0'] ?></td>
            <td><?= $data['1']?></td>
            <td><?= $data['2']?></td>
            <td><?= $data['3']?></td>
            <td> <?php echo $data['nama_kelas'] ?></td>

            <td colspan="2">            
            
            <a href="editsiswa.php?nis=<?=$data['nis']?>" class="btn btn-outline-primary">Edit</a>
            |
            <a href="deletesiswa.php?nis=<?=$data['nis']?>" class="btn btn-outline-danger">Hapus</a>
            </td>
            <?php
    }
    ?>
        </tr>
        </tbody>
</table>
<!-- end main section -->
        <div class="table-pagination">
          <div class="flex items-center justify-between">
            <div class="buttons">
              <button type="button" class="button active">1</button>
              <button type="button" class="button">2</button>
              <button type="button" class="button">3</button>
            </div>
            <small>Page 1 of 3</small>
          </div>
        </div>
      </div>
    </div>
  </section>

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

</body>
</html>
