<?php
include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($koneksi,"SELECT * FROM pesanan WHERE id_pesanan='$id'");
$d = mysqli_fetch_assoc($data);

if(isset($_POST['simpan'])){

    $status = $_POST['status'];

    mysqli_query($koneksi,"
    UPDATE pesanan
    SET status='$status'
    WHERE id_pesanan='$id'
    ");

    echo "<script>
    alert('Status berhasil diubah');
    window.location='kelola_pesanan.php';
    </script>";
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Edit Status Pesanan</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial;
}

body{
background:#f4f4f4;
}

.box{

width:450px;

margin:60px auto;

background:white;

padding:30px;

border-radius:20px;

box-shadow:0 5px 20px rgba(0,0,0,.2);

}

h2{

text-align:center;

color:#ff4f87;

margin-bottom:20px;

}

label{

display:block;

margin-top:15px;

font-weight:bold;

}

input,
select{

width:100%;

padding:12px;

margin-top:8px;

border:1px solid #ccc;

border-radius:10px;

}

button{

margin-top:25px;

width:100%;

padding:13px;

border:none;

background:#ff4f87;

color:white;

border-radius:10px;

font-size:17px;

cursor:pointer;

}

button:hover{

background:#ff2f70;

}

</style>

</head>

<body>

<div class="box">

<h2>Edit Status Pesanan</h2>

<form method="POST">

<label>Nama Pembeli</label>

<input
type="text"
value="<?= $d['nama_pembeli']; ?>"
readonly>

<label>Status Pesanan</label>

<select name="status">

<option <?= $d['status']=="Menunggu"?"selected":""; ?>>Menunggu</option>

<option <?= $d['status']=="Diproses"?"selected":""; ?>>Diproses</option>

<option <?= $d['status']=="Selesai"?"selected":""; ?>>Selesai</option>

</select>

<button
type="submit"
name="simpan">

Simpan Perubahan

</button>

</form>

</div>

</body>

</html>