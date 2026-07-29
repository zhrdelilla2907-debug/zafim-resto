<?php
session_start();
include "koneksi.php";

if(isset($_POST['simpan'])){

    $nama       = $_POST['nama_menu'];
    $kategori   = $_POST['kategori'];
    $harga      = $_POST['harga'];
    $deskripsi  = $_POST['deskripsi'];

    $gambar = $_FILES['gambar']['name'];
    $tmp    = $_FILES['gambar']['tmp_name'];

    move_uploaded_file($tmp,"gambar/".$gambar);

    mysqli_query($koneksi,"INSERT INTO menu
    VALUES(
    '',
    '$nama',
    '$kategori',
    '$harga',
    '$gambar',
    '$deskripsi'
    )");

    echo "<script>
    alert('Menu berhasil ditambahkan');
    window.location='kelola_menu.php';
    </script>";

}
?>

<!DOCTYPE html>
<html>

<head>

<title>Tambah Menu</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial;
}

body{

background:url('gambar/restoran.jpg');

background-size:cover;

background-position:center;

}

body::before{

content:"";

position:fixed;

width:100%;
height:100%;

background:rgba(0,0,0,.45);

z-index:-1;

}

.container{

width:500px;

margin:40px auto;

background:white;

padding:30px;

border-radius:20px;

box-shadow:0 5px 15px rgba(0,0,0,.3);

}

h2{

text-align:center;

color:#ff4f87;

margin-bottom:25px;

}

label{

font-weight:bold;

display:block;

margin-top:15px;

}

input,
textarea,
select{

width:100%;

padding:12px;

margin-top:5px;

border:1px solid #ccc;

border-radius:10px;

font-size:15px;

}

textarea{

height:90px;

resize:none;

}

button{

margin-top:25px;

width:100%;

padding:13px;

background:#ff4f87;

color:white;

border:none;

border-radius:10px;

font-size:17px;

cursor:pointer;

}

button:hover{

background:#ff2f70;

}

.kembali{

display:block;

margin-top:15px;

text-align:center;

text-decoration:none;

color:#ff4f87;

font-weight:bold;

}

</style>

</head>

<body>

<div class="container">

<h2>Tambah Menu</h2>

<form method="POST" enctype="multipart/form-data">

<label>Nama Menu</label>

<input
type="text"
name="nama_menu"
required>

<label>Kategori</label>

<select name="kategori">

<option>Makanan</option>

<option>Minuman</option>

<option>Dessert</option>

</select>

<label>Harga</label>

<input
type="number"
name="harga"
required>

<label>Deskripsi</label>

<textarea
name="deskripsi"></textarea>

<label>Gambar</label>

<input
type="file"
name="gambar"
required>

<button
type="submit"
name="simpan">

Simpan Menu

</button>

</form>

<a
href="kelola_menu.php"
class="kembali">

← Kembali

</a>

</div>

</body>

</html>