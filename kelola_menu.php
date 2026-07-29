<?php
session_start();
include "koneksi.php";

$data=mysqli_query($koneksi,"SELECT * FROM menu");
?>

<!DOCTYPE html>
<html>

<head>

<title>Kelola Menu</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial;
}

body{
background:#f5f5f5;
}

.header{

background:#ff4f87;

color:white;

padding:20px;

display:flex;

justify-content:space-between;

align-items:center;

}

.container{

width:1100px;

margin:30px auto;

}

.tambah{

display:inline-block;

padding:12px 25px;

background:#ff4f87;

color:white;

text-decoration:none;

border-radius:10px;

margin-bottom:20px;

}

.tambah:hover{

background:#ff2f70;

}

table{

width:100%;

border-collapse:collapse;

background:white;

box-shadow:0 5px 15px rgba(0,0,0,.2);

}

th{

background:#ff4f87;

color:white;

padding:15px;

}

td{

padding:12px;

text-align:center;

border-bottom:1px solid #ddd;

}

img{

width:80px;

height:80px;

object-fit:cover;

border-radius:10px;

}

.edit{

background:#3498db;

padding:8px 15px;

color:white;

text-decoration:none;

border-radius:8px;

}

.hapus{

background:red;

padding:8px 15px;

color:white;

text-decoration:none;

border-radius:8px;

}

.kembali{

margin-left:20px;

color:white;

text-decoration:none;

}

</style>

</head>

<body>

<div class="header">

<h2>Kelola Menu</h2>

<a href="dashboard_admin.php" class="kembali">

← Dashboard

</a>

</div>

<div class="container">

<a href="tambah_menu.php" class="tambah">

+ Tambah Menu

</a>

<table>

<tr>

<th>No</th>

<th>Gambar</th>

<th>Nama</th>

<th>Kategori</th>

<th>Harga</th>

<th>Aksi</th>

</tr>

<?php

$no=1;

while($d=mysqli_fetch_array($data)){

?>

<tr>

<td><?= $no++; ?></td>

<td>

<img src="gambar/<?= $d['gambar']; ?>">

</td>

<td><?= $d['nama_menu']; ?></td>

<td><?= $d['kategori']; ?></td>

<td>Rp <?= number_format($d['harga']); ?></td>

<td>

<a href="edit_menu.php?id=<?= $d['id']; ?>" class="edit">
    Edit
</a>

<a href="hapus_menu.php?id=<?= $d['id']; ?>" class="hapus"
onclick="return confirm('Yakin?')">
    Hapus
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>