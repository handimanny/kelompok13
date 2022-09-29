<?php

$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "perpustakaan";

$perpustakaan = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

if (!$perpustakaan) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}

?>