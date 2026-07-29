<?php
session_start();

if(!isset($_SESSION['keranjang'])){
    $_SESSION['keranjang']=[];
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Keranjang | ZAFIM RESTO</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{

background:url("gambar/restoran.jpg");

background-size:cover;

background-position:center;

}

body::before{

content:"";

position:fixed;

top:0;
left:0;

width:100%;
height:100%;

background:rgba(0,0,0,.45);

z-index:-1;

}

.header{

background:linear-gradient(90deg,#ff4f87,#ff7398);

padding:20px;

color:white;

text-align:center;

font-size:32px;

font-weight:bold;

}

.container{

width:700px;

margin:30px auto;

background:white;

padding:25px;

border-radius:20px;

box-shadow:0 5px 15px rgba(0,0,0,.3);

}

table{

width:100%;

border-collapse:collapse;

}

th{

background:#ff4f87;

color:white;

padding:15px;

}

td{

padding:15px;

text-align:center;

border-bottom:1px solid #ddd;

}

.total{

margin-top:20px;

font-size:24px;

font-weight:bold;

text-align:right;

color:#ff4f87;

}

.btn{

margin-top:20px;

display:block;

width:100%;

padding:15px;

background:#ff4f87;

color:white;

text-align:center;

text-decoration:none;

border-radius:10px;

font-size:20px;

}

.btn:hover{

background:#ff2f70;

}

.btn-tambah{

margin-top:15px;

display:block;

width:100%;

padding:15px;

background:white;

color:#ff4f87;

text-align:center;

text-decoration:none;

border:2px solid #ff4f87;

border-radius:10px;

font-size:20px;

font-weight:bold;

transition:.3s;

}

.btn-tambah:hover{

background:#ffe4ef;

}

</style>

</head>

<body>

<div class="header">

🛒 Keranjang

</div>

<div class="container">

<table>

<tr>

<th>Menu</th>

<th>Harga</th>

<th>Jumlah</th>

<th>Subtotal</th>

</tr>

<?php

$total=0;

foreach($_SESSION['keranjang'] as $item){

$subtotal=$item['harga']*$item['jumlah'];

$total+=$subtotal;

?>

<tr>

<td><?= $item['nama']; ?></td>

<td>Rp <?= number_format($item['harga']); ?></td>

<td><?= $item['jumlah']; ?></td>

<td>Rp <?= number_format($subtotal); ?></td>

</tr>

<?php } ?>

</table>

<div class="total">

Total : Rp <?= number_format($total); ?>

</div>

<a href="pembayaran.php" class="btn">

Lanjut Pembayaran

</a>

<a href="beranda.php" class="btn-tambah">

+ Tambah Menu

</a>

</body>

</html>