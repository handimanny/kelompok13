<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>

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
            <h2 class="text-center">Masuk</h2>
            <div class="my-4">
                <label for="" class="form-label">Nama</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="username">
            </div>
            <div class="my-4">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputEmail1" name="password">
            </div>
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary">Masuk</button>
            </div>
        </form>
        <p class="my-4">Belum punya akun? <a href="daftar.php">Daftar Disini</a></p>
    </div>
</div>


<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>

