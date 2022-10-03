<?php
include_once("config.php");

session_start();

if(!isset($_SESSION['nama'])){
  header("Location: ../../login/loginadmin.php");
}

// if(!isset($_SESSION['nama'])){
//   header("Location: halaman.php");
// }

// akses penguna tertentu
// if($_SESSION['akses']==''){
//   header("Location: halaman.php");
// }


$date = new DateTime('now');
$date7 = new DateTime('now');
// echo $date->format('Y-m-d');
$tgl=$date->format('Y-m-d');
$date7->modify('+7 day');
$tgl7=$date7->format('Y-m-d') . "\n";


$kode = $_GET['id_buku'];
$result = mysqli_query($conn, "SELECT * FROM detail_peminjaman JOIN buku JOIN peminjaman join siswa ON detail_peminjaman.id_buku=buku.id_buku AND detail_peminjaman.id_peminjaman=peminjaman.id_peminjaman and peminjaman.id_siswa=siswa.nis WHERE peminjaman.id_peminjaman='$kode';");
while($data = mysqli_fetch_array($result)){
    $kodepinjam=$data['id_peminjaman'];
    $judul = $data['judul'];
    $penulis = $data['penulis'];
    $nis = $data['nis'];
    $total = $data['kuantitas'];
    $kodebuku = $data['id_buku'];
}
$result = mysqli_query($conn, "SELECT * FROM siswa ");


if (isset($_POST['submit'])) {
    // echo "<script>alert('asd')</script>";
    # code...
    // $nis = $_POST['nis'];
    // $total = $_POST['total'];
    // echo $_POST['nis'];
    
    if ($_POST['ada']==null || $_POST['hilang']==null|| $_POST['denda']==null ){
        echo "<script>alert('Tolong isi semua field')</script>";
    }else{
        $nis = $_POST['nis'];
        $total = $_POST['total'];
        $petugas = $_SESSION['nama'];
        $ada = $_POST['ada'];
        $hilang = $_POST['hilang'];
        $denda = $_POST['denda'];
        $tanggal = $_POST['tanggal'];
        $kodepinjam2 = $_POST['kodepinjam2'];
        
        // tambahstock
        $getstock = mysqli_query($conn, "SELECT stok FROM `buku` where id_buku = '$kodebuku'") ;
        $getvaluestock = mysqli_fetch_array($getstock);
        $valstock = $getvaluestock['stok']+$total;
        $miststock = mysqli_query($conn, "UPDATE `buku` SET `stok` = '$valstock' WHERE `buku`.`id_buku` = '$kodebuku';");
        

        
        $sendd = mysqli_query($conn, "INSERT INTO `pengembalian` (`id_pengembalian`, `id_peminjaman`, `tanggal_pengembalian`, `denda`) VALUES (NULL, '$kodepinjam2', '$tanggal', '$denda');");
        $dataid = mysqli_query($conn, "SELECT id_pengembalian FROM pengembalian ORDER BY id_pengembalian DESC limit 1");
        $id_pengembalian = '';
        if ($sendd) {
            # code...
            while($lastid = mysqli_fetch_array($dataid)){
                $id_pengembalian = $lastid['id_pengembalian'];
            }
            echo $id_pengembalian;
            if($sendd) {
                $sendd2 = mysqli_query($conn, "INSERT INTO `detail_pengembalian` (`id_detail_pengembalian`, `id_pengembalian`, `ada`, `hilang`) VALUES (NULL, '$id_pengembalian', '$ada', '$hilang');");
                header('location:pengembalian.php');
            }
        }
        
    }
}

?>

<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Buku</title>

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
      <li>Pinjam</li>
      <li>Buku</li>
    </ul>
  </div>
</section>

<section class="is-hero-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <h1 class="title">
      Pinjam Buku
    </h1>
  </div>
</section>

<section class="is-hero-bar">
  <!-- <div> -->
  <form name="update_user" method="post" enctype="multipart/form-data" action="">
  <label>Kode Peminjaman</label>
    <div class="mb-3">
        <input readonly type="text" value="<?php echo $kodepinjam;?>" name="kodepinjam2" class="input" placeholder="NIP" aria-label="Email" aria-describedby="email-addon">
    </div>
    <label>Judul</label>
    <div class="mb-3">
        <input readonly type="text" name="judul" value="<?php echo $judul."--".$penulis;?>" class="input" placeholder="Judul" aria-label="Email" aria-describedby="email-addon">
    </div>
    <label>NIS</label>
    <div class="mb-3">
        <input readonly type="text" name="nis" value="<?php echo $nis;?>" class="input" placeholder="Judul" aria-label="Email" aria-describedby="email-addon">
    </div>
    <label>Petugas</label>
    <div class="mb-3">
        <input readonly type="text" value="<?php echo $_SESSION['nip']."--".$_SESSION['nama'];?>" name="nama" class="input" placeholder="NIP" aria-label="Email" aria-describedby="email-addon">
    </div>
    <label>Total</label>
    <div class="mb-3">
        <input readonly type="number" value="<?php echo $total;?>"  name="total" class="input" placeholder="Total" aria-label="Email" aria-describedby="email-addon">
    </div>
    <label>Tanggal Pengembalian</label>
    <div class="mb-3">
        <input readonly value="<?php echo $tgl ?>" name="tanggal" class="input" placeholder="Tanggal" aria-label="Email" aria-describedby="email-addon">
    </div>
    <label>Ada</label>
    <div class="mb-3">
        <input name="ada" class="input" placeholder="Ada" aria-label="Email" aria-describedby="email-addon">
    </div>
    <label>Hilang</label>
    <div class="mb-3">
        <input name="hilang" class="input" placeholder="Hilang" aria-label="Email" aria-describedby="email-addon">
    </div>
    <label>Denda</label>
    <div class="mb-3">
        <input name="denda" class="input" placeholder="Denda" aria-label="Email" aria-describedby="email-addon">
    </div>

    <div class="text-center">
    <button type="submit" name="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Submit</button>
    </div>
</form>

<!-- <div class="mb-3">
<label class="form-lable">Kode Buku</label>
<input type="text" class="input" name="kodebuku" value="<?php echo $kodebuku; ?>">
</div>
<div class="mb-3">
<label class="form-lable">Tahun Terbit</label>
<input type="number" class="input" name="tahun" value=<?php echo $tahun;?>>
</div>
<div class="mb-3">
<label class="form-lable">Judul Buku</label>
<input type="text" class="input" name="judul" value=<?php echo $judul;?>>
</div>

<div class="mb-3">
<label class="form-lable">Kota Asal</label>
<input type="text" class="input" name="kota" value=<?php echo $kota;?>>
</div>
<div class="mb-3">
<label class="form-lable">Penerbit</label>
<input type="text" class="input" name="penerbit" value=<?php echo $penerbit;?>>
</div>

<div class="mb-3">
<label class="form-lable">Cover</label>
<input type="file" class="input" name="cover" value=<?php echo $file;?>>
</div>
<div class="mb-3">
<label class="form-lable">Sinopsis</label>
<input type="text" class="input" name="sinopsis" value=<?php echo $sinopsis;?>>
</div>
<div class="mb-3">
<label class="form-lable">Stok</label>
<input type="number" class="input" name="stok" value=<?php echo $stok;?>>
</div>
<br>
<div class="mb-3">
<input type="hidden" name="id_buku" value=<?php echo $_GET['id_buku'];?>>
<input class="button green" type="submit" name="update" value="Perbarui Data">
</div>
</form> -->

  <!-- </div> -->
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

<div id="sample-modal" class="modal">
  <div class="modal-background --jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Sample modal</p>
    </header>
    <section class="modal-card-body">
      <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
      <p>This is sample modal</p>
    </section>
    <footer class="modal-card-foot">
      <button class="button --jb-modal-close">Cancel</button>
      <button class="button red --jb-modal-close">Confirm</button>
    </footer>
  </div>
</div>

<div id="sample-modal-2" class="modal">
  <div class="modal-background --jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Sample modal</p>
    </header>
    <section class="modal-card-body">
      <p>Lorem ipsum dolor sit amet <b>adipiscing elit</b></p>
      <p>This is sample modal</p>
    </section>
    <footer class="modal-card-foot">
      <button class="button --jb-modal-close">Cancel</button>
      <button class="button blue --jb-modal-close">Confirm</button>
    </footer>
  </div>
</div>

</div>

<script type="text/javascript" src="js/main.min.js?v=1628755089081"></script>


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

<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

</body>
</html>
