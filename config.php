<?php
<<<<<<< HEAD
$db_servername = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'perpustakaan';

$conn = mysqli_connect ($db_servername,$db_username,$db_password,$db_name);
=======

$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "perpustakaan";

$conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}

>>>>>>> 0f6cccc83f939b5e3dac9797b5b3d4f3c82037ef
?>