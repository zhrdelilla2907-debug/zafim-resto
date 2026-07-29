<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Beranda | ZAFIM RESTO</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:#f5f5f5;
padding-bottom:90px;
}

/* HEADER */

.header{

background:#ff4f87;

color:white;

padding:18px;

font-size:28px;

font-weight:bold;

text-align:center;

box-shadow:0 3px 10px rgba(0,0,0,.15);

}

/* BANNER */

.banner{

width:95%;

height:270px;

margin:20px auto;

border-radius:20px;

overflow:hidden;

background-image:url("gambar/restoran.jpg");

background-size:cover;

background-position:center;

position:relative;

display:flex;

justify-content:center;

align-items:center;

}

.banner::before{

content:"";

position:absolute;

top:0;

left:0;

width:100%;

height:100%;

background:rgba(0,0,0,.45);

}

.banner-text{

position:relative;

z-index:2;

text-align:center;

color:white;

padding:20px;

}

.banner-text h1{

font-size:40px;

margin-bottom:10px;

}

.banner-text p{

font-size:18px;

}

/* JUDUL */

.judul{

text-align:center;

color:#ff4f87;

font-size:30px;

margin-top:25px;

margin-bottom:25px;

}

/* GRID */

.kategori{

width:92%;

margin:auto;

display:grid;

grid-template-columns:repeat(2,1fr);

gap:20px;

}

/* CARD */

.card{

background:white;

border-radius:20px;

overflow:hidden;

box-shadow:0 5px 15px rgba(0,0,0,.15);

transition:.3s;

}

.card:hover{

transform:translateY(-6px);

}

.card a{

text-decoration:none;

color:#ff4f87;

}

.card img{

width:100%;

height:170px;

object-fit:cover;

display:block;

}

.nama{

padding:18px;

text-align:center;

font-size:23px;

font-weight:bold;

}

</style>

</head>

<body>

<div class="header">

🍽 ZAFIM RESTO

</div>

<div class="banner">

<div class="banner-text">

<h1>Selamat Datang</h1>

<p>Nikmati Hidangan Favoritmu di ZAFIM RESTO</p>

</div>

</div>

<h2 class="judul">

Pilih Kategori Menu

</h2>

<div class="kategori">

<!-- MAKANAN -->

<div class="card">

<a href="makanan.php">

<img src="gambar/nasi_goreng.jpg" alt="Makanan">

<div class="nama">

🍛 Makanan

</div>

</a>

</div>

<!-- MINUMAN -->

<div class="card">

<a href="minuman.php">

<img src="gambar/es_teh.jpg" alt="Minuman">

<div class="nama">

🥤 Minuman

</div>

</a>

</div>

<!-- DESSERT -->

<div class="card">

<a href="dessert.php">

<img src="gambar/red_velvet.jpg" alt="Dessert">

<div class="nama">

🍰 Dessert

</div>

</a>

</div>

<!-- SNACK -->

<div class="card">

<a href="snack.php">

<img src="gambar/kentang.jpg" alt="Snack">

<div class="nama">

🍟 Snack

</div>

</a>

</div>

</a>

</div>

</div>

<!-- NAVBAR -->

<div class="navbar">

<a href="beranda.php">

🏠<br>
Home

</a>

<a href="status_pesanan.php">

📦<br>
Pesanan

</a>

<a href="profil.php">

👤<br>
Profil

</a>

</div>

<style>

/* NAVBAR */

.navbar{

position:fixed;

bottom:0;

left:0;

width:100%;

background:white;

display:flex;

justify-content:space-around;

align-items:center;

padding:12px 0;

box-shadow:0 -3px 12px rgba(0,0,0,.15);

z-index:999;

}

.navbar a{

text-decoration:none;

color:#ff4f87;

font-size:15px;

font-weight:bold;

text-align:center;

transition:.3s;

}

.navbar a:hover{

color:#ff2f70;

transform:translateY(-3px);

}

</style>

</body>

</html>