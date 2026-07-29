<?php
session_start();

if(!isset($_SESSION['pesanan'])){
    header("Location: beranda.php");
    exit;
}

$data = $_SESSION['pesanan'];
?>

<!DOCTYPE html>
<html>

<head>

<title>Status Pesanan</title>

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

.container{
width:550px;
margin:40px auto;
background:white;
padding:30px;
border-radius:20px;
box-shadow:0 5px 20px rgba(0,0,0,.3);
}

h1{
text-align:center;
color:#ff4f87;
margin-bottom:20px;
}

.status{
background:#ffeaf2;
padding:18px;
border-radius:12px;
text-align:center;
font-size:24px;
font-weight:bold;
color:#ff4f87;
margin-bottom:25px;
}

.info{
font-size:20px;
line-height:42px;
}

.btn{
margin-top:30px;
display:block;
text-align:center;
text-decoration:none;
background:#ff4f87;
color:white;
padding:15px;
border-radius:12px;
font-size:20px;
font-weight:bold;
}
.btn:hover{
background:#ff2f70;
}

.btn-profil{

margin-top:15px;

display:block;

text-align:center;

text-decoration:none;

background:white;

color:#ff4f87;

padding:15px;

border-radius:12px;

font-size:20px;

font-weight:bold;

border:2px solid #ff4f87;

transition:.3s;

}

.btn-profil:hover{

background:#ffe4ef;

}

</style>

</head>

<body>

<div class="container">

<h1>📦 Status Pesanan</h1>

<div class="status">

<?php echo $data['status_pesanan']; ?>

</div>

<div class="info">

<p>

<b>👤 Nama Pemesan :</b>

<?php echo $data['nama']; ?>

</p>

<p>

<b>🍽 Status :</b>

<?php
if($data['status']=="tempat"){
    echo "Makan di Tempat";
}else{
    echo "Dibawa Pulang";
}
?>

<br>

&nbsp;&nbsp;&nbsp;&nbsp;:

<?php

if($data['status']=="tempat"){

    echo !empty($data['meja']) ? $data['meja'] : "-";

}else{

    echo !empty($data['alamat']) ? $data['alamat'] : "-";

}

?>

</p>

<p>

<b>💳 Metode Pembayaran :</b>

<?php echo $data['metode']; ?>

</p>

<p>

<b>💰 Total Pembayaran :</b>

Rp <?php echo number_format($data['total'],0,",","."); ?>

</p>

</div>

<a href="beranda.php" class="btn">

🏠 Kembali ke Beranda

</a>

<a href="profil.php" class="btn-profil">

👤 Lihat Profil

</a>

</div>

</body>
</html>