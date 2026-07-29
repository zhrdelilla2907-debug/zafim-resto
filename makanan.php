<?php
include "koneksi.php";

$data = mysqli_query($koneksi,"SELECT * FROM menu WHERE kategori='makanan'");
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Menu Makanan | ZAFIM RESTO</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:#f5f5f5;
}

/* HEADER */

.header{

background:#ff4f87;

color:white;

padding:18px;

text-align:center;

font-size:28px;

font-weight:bold;

box-shadow:0 3px 10px rgba(0,0,0,.2);

}

/* JUDUL */

.judul{

text-align:center;

margin:30px 0;

font-size:30px;

color:#ff4f87;

}

/* GRID MENU */

.menu{

width:92%;

margin:auto;

display:grid;

grid-template-columns:repeat(auto-fit,minmax(250px,1fr));

gap:25px;

padding-bottom:40px;

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

.card img{

width:100%;

height:190px;

object-fit:cover;

}

.card h3{

text-align:center;

margin-top:15px;

color:#ff4f87;

}

.card p{

text-align:center;

font-size:20px;

font-weight:bold;

margin:15px;

}

.button{

text-align:center;

margin-bottom:20px;

}

.button a{

text-decoration:none;

}

.button button{

background:#ff4f87;

color:white;

border:none;

padding:12px 25px;

border-radius:10px;

cursor:pointer;

font-size:15px;

transition:.3s;

}

.button button:hover{

background:#ff2f70;

}

</style>

</head>

<body>

<div class="header">

🍛 MENU MAKANAN

</div>

<h2 class="judul">

Pilih Menu Makanan

</h2>

<div class="menu">

<?php
while($row = mysqli_fetch_assoc($data)){
?>

<div class="card">

<img src="gambar/<?php echo $row['gambar']; ?>">

<h3>

<?php echo $row['nama_menu']; ?>

</h3>

<p>

Rp <?php echo number_format($row['harga'],0,',','.'); ?>

</p>

<div class="button">

<a href="detail_menu.php?id=<?php echo $row['id']; ?>">

<button>

Lihat Detail

</button>

</a>

</div>

</div>

<?php
}
?>

</div>

<div style="text-align:center; margin:30px;">

<a href="beranda.php">

<button style="padding:12px 25px;
background:#ff4f87;
color:white;
border:none;
border-radius:10px;
cursor:pointer;
font-size:16px;">

⬅ Kembali ke Beranda

</button>

</a>

</div>

</body>

</html>