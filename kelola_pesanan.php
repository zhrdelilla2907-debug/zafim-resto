<?php
include "koneksi.php";

$data = mysqli_query($koneksi,"SELECT * FROM pesanan ORDER BY id_pesanan DESC");
?>

<!DOCTYPE html>
<html>

<head>

<title>Kelola Pesanan | Admin</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:#f4f4f4;
}

.header{

background:#ff4f87;
padding:20px;
display:flex;
justify-content:space-between;
align-items:center;
color:white;

}

.header h2{

font-size:28px;

}

.kembali{

text-decoration:none;
background:white;
color:#ff4f87;
padding:10px 20px;
border-radius:10px;
font-weight:bold;

}

.container{

width:95%;
margin:30px auto;

}

table{

width:100%;
border-collapse:collapse;
background:white;
box-shadow:0 5px 20px rgba(0,0,0,.2);

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

.edit{

background:#4CAF50;
color:white;
padding:8px 15px;
border-radius:8px;
text-decoration:none;

}

.hapus{

background:red;
color:white;
padding:8px 15px;
border-radius:8px;
text-decoration:none;

}

.status{

font-weight:bold;

}

</style>

</head>

<body>

<div class="header">

<h2>Kelola Pesanan</h2>

<a href="dashboard_admin.php" class="kembali">

← Dashboard

</a>

</div>

<div class="container">

<table>

<tr>

<th>No</th>

<th>Nama Pembeli</th>

<th>Menu</th>

<th>Jumlah</th>

<th>Total</th>

<th>Pembayaran</th>

<th>Status</th>

<th>Tanggal</th>

<th>Aksi</th>

</tr>

<?php

$no=1;

while($d=mysqli_fetch_array($data)){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $d['nama_pembeli']; ?></td>

<td><?= $d['menu']; ?></td>

<td><?= $d['jumlah']; ?></td>

<td>Rp <?= number_format($d['total']); ?></td>

<td><?= $d['metode_pembayaran']; ?></td>

<td class="status">

<?= $d['status']; ?>

</td>

<td><?= $d['tanggal']; ?></td>

<td>

<a
class="edit"
href="edit_status.php?id=<?= $d['id_pesanan']; ?>">

Edit

</a>

<a
class="hapus"
href="hapus_pesanan.php?id=<?= $d['id_pesanan']; ?>"
onclick="return confirm('Yakin ingin menghapus pesanan ini?')">

Hapus

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>