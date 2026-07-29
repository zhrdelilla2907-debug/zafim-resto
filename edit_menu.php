<?php
include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($koneksi,"SELECT * FROM menu WHERE id='$id'");
$menu = mysqli_fetch_assoc($data);

if(isset($_POST['simpan'])){

    $nama = $_POST['nama_menu'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];

    if($_FILES['gambar']['name']!=""){

        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];

        move_uploaded_file($tmp,"gambar/".$gambar);

        mysqli_query($koneksi,"
        UPDATE menu SET
        nama_menu='$nama',
        harga='$harga',
        kategori='$kategori',
        gambar='$gambar',
        deskripsi='$deskripsi'
        WHERE id='$id'
        ");

    }else{

        mysqli_query($koneksi,"
        UPDATE menu SET
        nama_menu='$nama',
        harga='$harga',
        kategori='$kategori',
        deskripsi='$deskripsi'
        WHERE id='$id'
        ");

    }

    echo "<script>
    alert('Menu berhasil diubah');
    window.location='kelola_menu.php';
    </script>";

}
?>

<!DOCTYPE html>
<html>

<head>

<title>Edit Menu</title>

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

.container{

width:500px;
margin:40px auto;
background:white;
padding:30px;
border-radius:20px;
box-shadow:0 5px 20px rgba(0,0,0,.2);

}

h2{

text-align:center;
margin-bottom:20px;
color:#ff4f87;

}

label{

display:block;
margin-top:15px;
font-weight:bold;

}

input,
textarea,
select{

width:100%;
padding:10px;
margin-top:5px;
border:1px solid #ccc;
border-radius:10px;

}

img{

width:120px;
margin-top:10px;
border-radius:10px;

}

button{

margin-top:25px;
width:100%;
padding:12px;
background:#ff4f87;
color:white;
border:none;
border-radius:10px;
cursor:pointer;

}

button:hover{

background:#ff2f70;

}

</style>

</head>

<body>

<div class="container">

<h2>Edit Menu</h2>

<form method="POST" enctype="multipart/form-data">

<label>Nama Menu</label>

<input
type="text"
name="nama_menu"
value="<?= $menu['nama_menu']; ?>"
required>

<label>Harga</label>

<input
type="number"
name="harga"
value="<?= $menu['harga']; ?>"
required>

<label>Kategori</label>

<select name="kategori">

<option <?= $menu['kategori']=="Makanan"?"selected":""; ?>>Makanan</option>

<option <?= $menu['kategori']=="Minuman"?"selected":""; ?>>Minuman</option>

<option <?= $menu['kategori']=="Dessert"?"selected":""; ?>>Dessert</option>

</select>

<label>Deskripsi</label>

<textarea name="deskripsi"><?= $menu['deskripsi']; ?></textarea>

<label>Gambar Sekarang</label>

<img src="gambar/<?= $menu['gambar']; ?>">

<label>Ganti Gambar (Opsional)</label>

<input type="file" name="gambar">

<button type="submit" name="simpan">

Simpan Perubahan

</button>

</form>

</div>

</body>

</html>