<?php

$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "db";

$db = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

if (!$db) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}

?>