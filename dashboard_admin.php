<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role']!="admin"){
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Admin</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:url("gambar/restoran.jpg") no-repeat center center/cover;
min-height:100vh;
}

body::before{
content:"";
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,.55);
z-index:-1;
}

.header{
display:flex;
justify-content:space-between;
align-items:center;
padding:20px 40px;
color:white;
}

.header h1{
font-size:35px;
}

.logout{
background:#ff4f87;
color:white;
padding:10px 20px;
border-radius:10px;
text-decoration:none;
font-weight:bold;
}

.logout:hover{
background:#ff2f70;
}

.judul{
text-align:center;
color:white;
margin-top:20px;
margin-bottom:40px;
}

.judul h2{
font-size:38px;
}

.judul p{
margin-top:10px;
font-size:18px;
}

.menu{
width:900px;
margin:auto;

display:grid;
grid-template-columns:repeat(2,1fr);
gap:35px;
}

.card{

background:rgba(255,255,255,.95);

border-radius:20px;

padding:35px;

text-align:center;

text-decoration:none;

color:#333;

transition:.3s;

box-shadow:0 10px 20px rgba(0,0,0,.3);

}

.card:hover{

transform:translateY(-8px);

background:#fff0f5;

}

.icon{

font-size:60px;

margin-bottom:20px;

}

.nama{

font-size:25px;

font-weight:bold;

color:#ff4f87;

}

.ket{

margin-top:10px;

font-size:16px;

color:#666;

}

@media(max-width:950px){

.menu{

width:90%;

grid-template-columns:1fr;

}

}

</style>

</head>

<body>

<div class="judul">

<h2>Dashboard Admin</h2>

<p>Selamat Datang, <?= $_SESSION['username']; ?></p>

</div>

<div class="menu">

<a href="kelola_menu.php" class="card">

<div class="icon">🍔</div>

<div class="nama">Kelola Menu</div>

<div class="ket">Tambah, edit dan hapus menu.</div>

</a>

<a href="kelola_pesanan.php" class="card">

<div class="icon">📦</div>

<div class="nama">Kelola Pesanan</div>

<div class="ket">Melihat semua pesanan pelanggan.</div>

</a>

<a href="laporan.php" class="card">

<div class="icon">📊</div>

<div class="nama">Laporan Penjualan</div>

<div class="ket">Lihat laporan dan grafik penjualan.</div>

</a>

<a href="profil_admin.php" class="card">

<div class="icon">👤</div>

<div class="nama">Profil Admin</div>

<div class="ket">Lihat dan ubah profil admin.</div>

</a>

</div>

</body>
</html>