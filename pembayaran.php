<?php
session_start();

if(!isset($_SESSION['keranjang'])){
    header("Location: beranda.php");
    exit;
}

$total = 0;

foreach($_SESSION['keranjang'] as $item){

    $total += $item['harga'] * $item['jumlah'];

}
?>

<!DOCTYPE html>

<html>

<head>

<title>Pembayaran</title>

<style>

*{

margin:0;

padding:0;

box-sizing:border-box;

font-family:Arial;

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

width:500px;

margin:40px auto;

background:white;

padding:30px;

border-radius:20px;

box-shadow:0 5px 20px rgba(0,0,0,.3);

}

h1{

text-align:center;

color:#ff4f87;

margin-bottom:30px;

}

label{

font-weight:bold;

display:block;

margin-top:15px;

}

input,select{

width:100%;

padding:12px;

margin-top:8px;

border:1px solid #ccc;

border-radius:10px;

}

.total{

margin-top:25px;

font-size:24px;

font-weight:bold;

text-align:center;

color:#ff4f87;

}

button{

width:100%;

margin-top:30px;

padding:15px;

background:#ff4f87;

color:white;

border:none;

border-radius:10px;

font-size:18px;

cursor:pointer;

}

button:hover{

background:#ff2f70;

}

input,
select,
textarea{

width:100%;

padding:15px;

margin-top:10px;

margin-bottom:20px;

border:1px solid #ddd;

border-radius:10px;

font-size:18px;

}

</style>

</head>

<body>

<div class="container">

<h1>💳 Pembayaran</h1>

<form action="proses_pembayaran.php" method="POST">

<label>👤 Nama Pemesan</label>

<input
type="text"
name="nama"
placeholder="Masukkan Nama Anda"
required>

<label>🍽 Status</label>

<select name="status" id="status" onchange="ubahStatus()" required>

<option value="">-- Pilih Status --</option>

<option value="tempat">Makan di Tempat</option>

<option value="bungkus">Dibawa Pulang</option>

</select>

<div id="mejaBox" style="display:none; margin-top:15px;">

<label>📍 Nomor Meja</label>

<input
type="number"
name="meja"
placeholder="Contoh : 5">

</div>

<div id="alamatBox" style="display:none; margin-top:15px;">

<label>🏠 Alamat</label>

<textarea
name="alamat"
placeholder="Masukkan alamat lengkap"
rows="4"></textarea>

</div>

<label>💰 Metode Pembayaran</label>

<select name="metode" required>

<option value="">-- Pilih Pembayaran --</option>

<option>Cash</option>

<option>QRIS</option>

<option>Transfer Bank</option>

<option>E-Wallet</option>

</select>

<div class="total">

Total Bayar

<br><br>

Rp <?php echo number_format($total,0,",","."); ?>

</div>

<button type="submit">

💳 Bayar Sekarang

</button>

</form>

</div>

<script>

function ubahStatus(){

    let status = document.getElementById("status").value;

    let meja = document.getElementById("mejaBox");

    let alamat = document.getElementById("alamatBox");

    if(status == "tempat"){

        meja.style.display = "block";

        alamat.style.display = "none";

    }

    else if(status == "bungkus"){

        meja.style.display = "none";

        alamat.style.display = "block";

    }

    else{

        meja.style.display = "none";

        alamat.style.display = "none";

    }

}

</script>

</body>

</html>