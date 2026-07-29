<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "zafim_resto";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if(mysqli_connect_errno()){
    die("Koneksi Database Gagal : " . mysqli_connect_error());
}

?>