<?php 

include '..\main\config.php';
 
// session_start();
 
// if (isset($_SESSION['nis'])) {
//     header("Location: .main.html");
// }

// if (isset($_SESSION['nama'])) {
//     header("Location: index.php");
// }

// error_reporting(0);

if (isset($_POST['submit'])) {
    $nis = $_POST['nis'];
    
    $query = mysqli_query($conn, "SELECT * FROM siswa WHERE nis='$nis'");
    $data = mysqli_fetch_assoc($query);

    if($data){
        $_SESSION['nis']=$data['nis'];
        $_SESSION['level']=$data['level'];

        if($_SESSION['level']=='admin'){
          header('location:..\main\siswa.php');
        } else if($_SESSION['level']==''){
          header('location:..\main\siswa.php');
        }

    } else {
        echo "<script>alert('NIS yang Anda masukan salah. Silahkan coba lagi!')</script>";
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Login Siswa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Sign In</h3>
						<form action="#" class="login-form" method="POST">
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" placeholder="Input NIS" name="nis"  required>
		      		</div>
	            <!-- <div class="form-group d-flex">
	              <input type="password" class="form-control rounded-left" placeholder="Password">
	            </div> -->
	            <div class="form-group">
	            	<button type="submit" name="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
	            </div>
				<div class="form-group">
					Masuk sebagai petugas!<a href="index.php"> Klik sini</a>
				</div>
	            
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>
