<?php
session_start();

$riwayat = $_SESSION['riwayat'] ?? [];
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Riwayat Pesanan</title>

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
background-attachment:fixed;

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

.container{

width:900px;
margin:40px auto;
background:white;
padding:30px;
border-radius:20px;

}

h1{

text-align:center;
color:#ff4f87;
margin-bottom:30px;

}

table{

width:100%;
border-collapse:collapse;

}

th{

background:#ff4f87;
color:white;
padding:15px;
font-size:18px;

}

td{

padding:15px;
border:1px solid #ddd;
text-align:center;

}

.total{

margin-top:20px;
font-size:22px;
font-weight:bold;
text-align:right;
color:#ff4f87;

}

.btn{

display:inline-block;
margin-top:25px;
padding:12px 30px;
background:#ff4f87;
color:white;
text-decoration:none;
border-radius:10px;
font-size:18px;

}

.btn:hover{

background:#ff2f70;

}

.kosong{

text-align:center;
font-size:22px;
padding:30px;
color:#777;

}

</style>

</head>

<body>

<div class="container">

<h1>📋 Riwayat Pesanan</h1>

<?php

if(empty($riwayat)){

echo "<div class='kosong'>Belum ada riwayat pesanan.</div>";

}else{

?>

<table>

<tr>

<th>No</th>

<th>Nama Pesanan</th>

<th>Status</th>

<th>Total</th>

</tr>

<?php

$no=1;

$grand=0;

foreach($riwayat as $pesanan){

$grand += $pesanan['total'];

?>

<tr>

<td><?= $no++; ?></td>

<td>

<?php

foreach($pesanan['menu'] as $item){

echo $item['nama']." x".$item['jumlah']."<br>";

}

?>

</td>

<td>

<?= $pesanan['status']=="tempat" ? "Makan di Tempat" : "Bawa Pulang"; ?>

</td>

<td>

Rp <?= number_format($pesanan['total'],0,",","."); ?>

</td>

</tr>

<?php

}

?>

</table>

<div class="total">

Total Pesanan :
Rp <?= number_format($grand,0,",","."); ?>

</div>

<?php

}

?>

<center>

<a href="profil.php" class="btn">

⬅ Kembali

</a>

</center>

</div>

</body>

</html>