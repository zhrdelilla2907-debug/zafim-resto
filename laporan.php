<?php
include "koneksi.php";

// Total Penjualan
$q1=mysqli_query($koneksi,"SELECT SUM(total) as total FROM pesanan");
$d1=mysqli_fetch_assoc($q1);
$total_penjualan=$d1['total'];

// Total Pesanan
$q2=mysqli_query($koneksi,"SELECT COUNT(*) as jumlah FROM pesanan");
$d2=mysqli_fetch_assoc($q2);
$total_pesanan=$d2['jumlah'];

// Rata-rata Order
$rata=0;
if($total_pesanan!=0){
$rata=$total_penjualan/$total_pesanan;
}

// Pendapatan Bersih
$bersih=$total_penjualan*0.9;

// Menu Terlaris
$menu=mysqli_query($koneksi,"
SELECT
menu,
COUNT(menu) as total,
SUM(total) as pendapatan
FROM pesanan
GROUP BY menu
ORDER BY total DESC
LIMIT 5
");
?>

<!DOCTYPE html>
<html>

<head>

<title>Laporan Penjualan</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial;
}

body{
    margin:0;
    padding:25px;
    background:url("gambar/restoran.jpg") center;
    background-size:cover;
    background-attachment:fixed;
    font-family:Arial,sans-serif;
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
    width:95%;
    max-width:1250px;
    margin:auto;
}


.judul{
    width:450px;
    margin:25px auto;
    background:#ff4f87;
    color:white;
    text-align:center;
    padding:15px;
    font-size:42px;
    border-radius:8px;
    font-weight:bold;
}


.atas{
    display:flex;
    gap:25px;
    align-items:flex-start;
}

.grafik{
    width:72%;
}

.menu-terlaris{
    width:28%;
}


.grafik{

width:75%;

background:white;

padding:20px;

border-radius:12px;

box-shadow:0 5px 15px rgba(0,0,0,.2);

}

.grafik img{

width:100%;

}

.kanan{

width:25%;

background:white;

border-radius:12px;

overflow:hidden;

box-shadow:0 5px 15px rgba(0,0,0,.2);

}

.kanan h2{

padding:15px;

text-align:center;

background:#eee;

}

table{

width:100%;

border-collapse:collapse;

}

th,td{

border:2px solid black;

padding:10px;

text-align:center;

}

.bawah{
    display:flex;
    justify-content:space-between;
    gap:20px;
    margin-top:30px;
}

.card{
    width:21%;
    background:white;
    padding:18px;
    min-height:120px;
}

.card h2{
    font-size:15px;
}

.card h1,
.card p{
    font-size:34px;
}

.kembali{

display:block;

width:220px;

margin:40px auto;

background:#ff2f7f;

color:white;

text-decoration:none;

padding:15px;

border-radius:10px;

text-align:center;

font-size:20px;

}

.kembali:hover{

background:#ff0066;

}

</style>

</head>

<body>

<div class="container">

<div class="judul">

Laporan Penjualan

</div>

<div class="atas">

<div class="grafik">

<img src="gambar/grafik.jpg">

</div>

<div class="kanan">

<h2>Menu Terlaris</h2>

<table>

<tr>

<th>No</th>

<th>Nama</th>

<th>Total</th>

<th>Pendapatan</th>

</tr>

<?php

$no=1;

while($d=mysqli_fetch_array($menu)){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $d['menu']; ?></td>

<td><?= $d['total']; ?></td>

<td><?= number_format($d['pendapatan']); ?></td>

</tr>

<?php } ?>

</table>

</div>

</div>

<div class="bawah">

<div class="card">

<h3>Total Penjualan</h3>

<h1>Rp <?= number_format($total_penjualan); ?></h1>

</div>

<div class="card">

<h3>Total Pesanan</h3>

<h1><?= $total_pesanan; ?></h1>

</div>

<div class="card">

<h3>Rata-rata Order</h3>

<h1>Rp <?= number_format($rata); ?></h1>

</div>

<div class="card">

<h3>Pendapatan Bersih</h3>

<h1>Rp <?= number_format($bersih); ?></h1>

</div>

</div>

<a href="dashboard_admin.php" class="kembali">

← Kembali ke Dashboard

</a>

</div>

</body>

</html>